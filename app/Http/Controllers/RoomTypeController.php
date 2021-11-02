<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\RoomTypeStoreRequest;

class RoomTypeController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('room-type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['id'] = $request->id;
        $data['hotel'] = [
            '1' => 'Hotel 1',
            '2' => 'Hotel 2',
            '3' => 'Hotel 3'
        ];
        return view('room-type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeStoreRequest $request, $id)
    {
        ini_set('max_execution_time', 2180);
        $files = $request->file('image');

        $path = [];
        $filename = [];

        foreach ($files as $file) {
            array_push($path, $file->getPathName());
            array_push($filename, $file->getClientOriginalName());
        };

        $res = $this->client->request('POST', env('API_HOST') . '/hotel/' . $id . '/roomtype', [
            'multipart' => [
                [
                    'name'     => 'image[]',
                    'contents' => fopen($path[0], 'r'),
                    'filename' => $filename[0]
                ],
                [
                    'name'     => 'image[]',
                    'contents' => fopen($path[1], 'r'),
                    'filename' => $filename[1]
                ],
                [
                    'name'     => 'image[]',
                    'contents' => fopen($path[2], 'r'),
                    'filename' => $filename[2]
                ],
                [
                    'name'     => 'name',
                    'contents' => $request->name,
                ],
                [
                    'name'     => 'price',
                    'contents' => $request->price,
                ],
                [
                    'name'     => 'description',
                    'contents' => $request->description,
                ],
                [
                    'name'     => 'hotel_id',
                    'contents' => $request->hotel_id,
                ],
            ],
        ]);

        $result = json_decode($res->getBody()->getContents(), true);
        $roomType = $result['data'];

        if ($res->getStatusCode() == 201) {
            return redirect()->to('hotel/' . $roomType['hotel_id'] . '/roomType')->with('message', 'Tipe ruangan berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRoom($id)
    {
        return view('room-type.show-room', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idHotel, $idRoom)
    {
        $res = $this->client->get(env('API_HOST') . '/hotel/' . $idHotel . '/roomtype/' . $idRoom);

        $result = json_decode($res->getBody()->getContents(), true);
        $roomType = $result['data'];
        $data['roomType'] = $roomType;

        return view('room-type.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idHotel, $idRoom)
    {
        $res = $this->client->get(env('API_HOST') . '/hotel/' . $idHotel . '/roomtype/' . $idRoom);

        $result = json_decode($res->getBody()->getContents(), true);
        $roomType = $result['data'];
        $data['roomType'] = $roomType;
        $data['hotel'] = [
            '1' => 'Hotel 1',
            '2' => 'Hotel 2',
            '3' => 'Hotel 3'
        ];

        return view('room-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeStoreRequest $request, $idHotel, $idRoom)
    {
        $res = $this->client->put(env('API_HOST') . '/hotel/' . $idHotel . '/roomtype/' . $idRoom, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'hotel_id'    => $request->hotel_id,
                'name'        => $request->name,
                'price'       => $request->price,
                'description' => $request->description,
                'images'      => $request->images
            ]
        ]);

        $result = json_decode($res->getBody()->getContents(), true);
        $roomType = $result['data'];

        if ($res->getStatusCode() == 200) {
            return redirect()->to('hotel/' . $roomType['hotel_id'] . '/roomType')->with('message', 'Data berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idHotel, $idRoom)
    {
        $res = $this->client->delete(env('API_HOST') . '/hotel/' . $idHotel . '/roomtype/' . $idRoom);
        if ($res->getStatusCode() == 200) {
            return back()->with('message', 'Data berhasil dihapus.');
        }
    }
}

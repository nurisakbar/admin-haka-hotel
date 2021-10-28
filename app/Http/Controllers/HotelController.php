<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\HotelStoreRequest;

class HotelController extends Controller
{
    protected $client;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->client = new Client();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('hotel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelStoreRequest $request)
    {
        ini_set('max_execution_time', 2180);
        $files = $request->file('photos');

        $path = [];
        $filename = [];

        foreach ($files as $file) {
            array_push($path, $file->getPathName());
            array_push($filename, $file->getClientOriginalName());
        };

        $res = $this->client->request('POST', env('API_HOST') . '/hotel', [
            'multipart' => [
                [
                    'name'     => 'photos[]',
                    'contents' => fopen($path[0], 'r'),
                    'filename' => $filename[0]
                ],
                [
                    'name'     => 'photos[]',
                    'contents' => fopen($path[1], 'r'),
                    'filename' => $filename[1]
                ],
                [
                    'name'     => 'photos[]',
                    'contents' => fopen($path[2], 'r'),
                    'filename' => $filename[2]
                ],
                [
                    'name'     => 'name',
                    'contents' => $request->name,
                ],
                [
                    'name'     => 'address',
                    'contents' => $request->address,
                ],
                [
                    'name'     => 'address_tag',
                    'contents' => $request->address_tag,
                ],
                [
                    'name'     => 'regency_id',
                    'contents' => $request->regency_id,
                ],
            ],
        ]);

        if ($res->getStatusCode() == 201) {
            return redirect()->to('hotel')->with('message', 'Hotel berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = $this->client->get(env('API_HOST') . '/hotel/' . $id);

        $result = json_decode($res->getBody()->getContents(), true);
        $hotel = $result['data'];
        $hotel['address_tag'] = implode(',', $hotel['address_tag']);
        $data['hotel'] = $hotel;

        return view('hotel.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = $this->client->get(env('API_HOST') . '/hotel/' . $id);
        $result = json_decode($res->getBody()->getContents(), true);
        $hotel = $result['data'];
        $hotel['address_tag'] = implode(',', $hotel['address_tag']);
        $data['hotel'] = $hotel;

        return view('hotel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelStoreRequest $request, $id)
    {
        $res = $this->client->put(env('API_HOST') . '/hotel/' . $id, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => $request->all()
        ]);
        if ($res->getStatusCode() == 200) {
            return redirect()->to('hotel')->with('message', 'Data berhasil diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->client->delete(env('API_HOST') . '/hotel/' . $id);
        if ($res->getStatusCode() == 200) {
            return back()->with('message', 'Hotel berhasil dihapus.');
        }
    }
}

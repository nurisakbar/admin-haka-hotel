<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Requests\FacilityStoreRequest;

use function GuzzleHttp\Promise\all;

class facilityController extends Controller
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
        return view('facility.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityStoreRequest $request)
    {
        $path = $request->file('images')->getPathname();
        $filename = $request->file('images')->getClientOriginalName();

        $res = $this->client->request('POST', env('API_HOST') . '/facilities', [
            'multipart' => [
                [
                    'name'     => 'images',
                    'contents' => fopen($path, 'r'),
                    'filename' => $filename
                ],
                [
                    'name'     => 'name',
                    'contents' => $request->name,
                ]
            ],
        ]);

        $response = (string) $res->getBody();
        $response = json_decode($response);

        if ($res->getStatusCode() == 201) {
            return redirect()->to('facilities')->with('message', ucfirst($response->message));
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
        $res = $this->client->get(env('API_HOST') . '/facilities/' . $id);

        $result = json_decode($res->getBody()->getContents(), true);
        $facility = $result['data'];
        $data['facility'] = $facility;

        return view('facility.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = $this->client->get(env('API_HOST') . '/facilities/' . $id);
        $result = json_decode($res->getBody()->getContents(), true);
        $facility = $result['data'];
        $data['facility'] = $facility;

        return view('facility.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityStoreRequest $request, $id)
    {
        $res = $this->client->put(env('API_HOST') . '/facilities/' . $id, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => $request->all()
        ]);
        if ($res->getStatusCode() == 200) {
            return redirect()->to('facilities')->with('message', 'Data berhasil diupdate.');
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
        $res = $this->client->delete(env('API_HOST') . '/facilities/' . $id);
        if ($res->getStatusCode() == 200) {
            return back()->with('message', 'Fasilitas berhasil dihapus.');
        }
    }
}

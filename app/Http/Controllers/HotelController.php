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
        $res = $this->client->post('http://127.0.0.1:8001/api/hotel', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => $request->all()
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = $this->client->get('http://127.0.0.1:8001/api/hotel/' . $id);
        $result = json_decode($res->getBody()->getContents(), true);
        $data = $result['data'];

        return view('hotel.edit', compact('data'));
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
        $request['address_tag'] = implode(',', $request->address_tag);
        $res = $this->client->put('http://127.0.0.1:8001/api/hotel/' . $id, [
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
        $res = $this->client->delete('http://127.0.0.1:8001/api/hotel/' . $id);
        if ($res->getStatusCode() == 200) {
            return back()->with('message', 'Hotel berhasil dihapus.');
        }
    }
}

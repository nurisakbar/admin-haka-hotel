<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    public function select2regency(Request $request)
    {
        $res = $this->client->get("http://haka-api.nurisakbar.com/api/regency?name=$request->q");
        $result = json_decode($res->getBody()->getContents(), true);
        $regency = $result['data'];

        $data = [];
        foreach ($regency as $r) {
            $result = [
                'id' => $r['province_id'],
                'name' => $r['regency']
            ];
            array_push($data, $result);
        }

        return response()->json($data);
    }
}

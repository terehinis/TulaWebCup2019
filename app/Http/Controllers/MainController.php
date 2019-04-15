<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $requestQuery)
    {
        $limit = $requestQuery->get('limit', 10);
        $page = (is_numeric($limit)) ? $requestQuery->get('page', 1) : 1;
        $client = new \GuzzleHttp\Client();
        $pagination = ($limit !== 'all' && $page > 0) ?
            '&limit=' . $limit . '&offset=' . ($page - 1) * $limit : '&limit=1000';

        $request = $client->get('https://cloud-api.yandex.net/v1/disk/resources?path=app:/&preview_size=M' . $pagination ,[
            'headers' => [
                'Authorization' => 'OAuth ' . env('YANDEX_TOKEN'),
                'Content-Type'  => 'application/json',
            ]
        ]);
        $response = $request->getBody();

        $total = json_decode($response)->_embedded->total;
        $totalPage = (is_numeric($limit)) ? ceil($total / $limit) : 1;
        $photos = json_decode($response)->_embedded->items;

        return view('welcome', ['photos' => $photos, 'total' => $totalPage, 'page' => $page, 'limit' => $limit]);
    }
}

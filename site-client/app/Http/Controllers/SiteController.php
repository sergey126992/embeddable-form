<?php


namespace App\Http\Controllers;


use App\Services\JsonRpcClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteController extends Controller
{
    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    public function show(Request $request)
    {
        $data = $this->client->send('getPageById', ['page_uid' => $request->get('page_uid')]);

        if (empty($data['result'])) {
            abort(404);
        }

        return view('page', ['data' => $data['result']]);
    }

    public function create()
    {
        return view('create-form');
    }

    public function store(Request $request)
    {
        $data = $this->client->send('create', $request->all());

        if (isset($data['error'])) {
            return Redirect::back()->withErrors($data['error']);
        }

        return view('page', ['data' => $data['result']]);
    }

}
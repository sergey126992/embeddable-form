<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Services\DataCreate;

class DataController extends Controller
{
    public function getPageById(array $params)
    {
        $data = Data::where('page_uid',$params['page_uid'])->first();

        return $data;
    }

    public function create(array $params)
    {
        $data = DataCreate::create($params);

        return $data;
    }
}

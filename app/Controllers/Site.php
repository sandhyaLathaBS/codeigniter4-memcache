<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Site extends BaseController
{
    public function index()
    {
        // $cache = service("cache");
        // print_r($cache->getCacheInfo());
        $this->cachePage(60); // 60 seconds
		return view("xml-parser");
    }
    public function Json_parser()
    {
        json-parser
    }
}
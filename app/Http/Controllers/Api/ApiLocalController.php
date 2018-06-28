<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiLocalController extends Controller
{
    public function getInfo($filename){
        $path = storage_path() . "/json/".$filename.".json";
        $json = json_decode(file_get_contents($path), true); 
        return $json;
    }
}

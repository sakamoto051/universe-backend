<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function getData()
    {
        return [
            'name' => 'takeshi',
            'email' => 'sakamoto051eng@gmail.com',
            'address' => 'Fukuoka',
        ];
    }
}

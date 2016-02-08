<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SetupValue;

class home extends Controller
{


    public function index()
    {
        return  View('home');
    }

}

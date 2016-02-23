<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SetupValue;
use App\User;
use Illuminate\Pagination\Paginator;

class home extends Controller
{


    public function index()
    {
    	$members = new User;
    	$classes = SetupValue::where('slug','like','CLASS-TEACHER-%');
        return  View('home')
        		->with(compact('members'))
        		->with(compact('classes'))
        		;
    }

    public function checkstu($classPar,$roomPar){

    	$lists = User::where('class',$classPar)
					->where('room',$roomPar)
					->where('CRNo','!=','00')
					->where(function($qq){
						$qq->where('picture','picture/yearbook/ubr.jpg')
						->orwhere('yearbook',false);
					})
					->orderBy('CRNo')				
					->get()
					;
    	
    	return view('home.checkstu')
    				->with(compact('classPar'))
    				->with(compact('roomPar'))
    				->with(compact('lists'))
    	;
    }

}

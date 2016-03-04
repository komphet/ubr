<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SetupValue;
use App\User;
use App\Question;
use Illuminate\Pagination\Paginator;
use Validator;
use Auth;
use App\Log;

class home extends Controller
{


    public function index()
    {
    	$members = new User;
    	$classes = SetupValue::where('slug','like','CLASS-TEACHER-%');
        $questions = Question::where('subId','')->orderBy('id')->get();
        return  View('home')
        		->with(compact('members'))
        		->with(compact('classes'))
                ->with(compact('questions'))
        		;
    }

    public function checkstu($classPar,$roomPar)
    {

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

    public function question(Request $request)
    {
        $massages = [
            'required' => ':attribute กรุณาระบุข้อมูลให้ครบถ้วน!'
        ];

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'detail' => 'required',
        ],$massages);

        if ($validator->fails()) {
            return redirect(route('home'))
                               ->withInput()
                               ->withErrors($validator->errors());
                            ;
        }


        $questionSave = new Question;
        $questionSave->memberId = Auth::user()->id;
        $questionSave->subId = $request->get('subId');
        $questionSave->title = trim($request->get('title'));
        $questionSave->detail = trim($request->get('detail'));
        $questionSave->save();
        $log = new Log;
        $log->memberId = Auth::user()->id;
        $log->detail = 'Post,'.$questionSave;
        $log->save();

        return redirect(route('home'));
    }

    public function questionDel(Request $request){
        Question::find($request->get('id'))->delete();
        Question::where('subId',$request->get('id'))->delete();
        $log = new Log;
        $log->memberId = Auth::user()->id;
        $log->detail = 'Delete Post,'.$request->get('id');
        $log->save();
        return redirect(route('home'));
    }

}

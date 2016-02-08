<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Hash;
use App\User;
use App;
use App\SetupValue;


class Member extends Controller
{
    protected $agreement = null;

    public function __construct(){
        //$agreement = SetupValue::where('slug','AGREEMENT')->first()->value;
        //$this->agreement = $agreement;
    }




    public function register(Request $request) 
    {
        //dd($request->get('step'));
        switch ($request->get('step')) {
            case '2':
                $number = preg_replace('/( )||(-)/', '', trim($request->get('number')));
                $detail = User::where('studenNo',$number)->orwhere('idCardNo',$number);
                if($detail->count() == 1){
                    $memberDetail = $detail->first();
                    //dd($memberDetail );
                    if(
                        $memberDetail->username == '' || 
                        $memberDetail->password == '' || 
                        $memberDetail->email == ''
                    ){
                        return View('users.regisStep.step2')
                            ->with('agreement',$this->agreement)
                            ->with('request',$request->all())
                            ->with('memberDetail',$memberDetail);
                    }else{
                        return redirect(route('register'))
                                ->with('agreement',$this->agreement)
                                ->withInput()
                                ->withErrors('คุณได้ลงทะเบียนแล้ว! หากพบปัญหาการใช้งานกรุณาติดต่อผู้ดูแลระบบ')
                                ;
                    }                    
                }else{
                    return redirect(route('register'))
                                ->with('agreement',$this->agreement)
                                ->withInput()
                                ->withErrors('ข้อมูลไม่ถูกต้อง! กรุณาติดต่อผู้ดูแลระบบ')
                                ;
                }
                
                break;
            case '3':
                $validator = Validator::make($request->all(),[
                    'titleName' => 'required',
                    'name' => 'required',
                    'lastname' => 'required',
                    'address' => 'required',
                    //'contact' => 'required',
                    'email' => 'required|email|unique:member,email',
                    'username' => 'required|alpha_num|min:4|max:200|unique:member,username',
                    'password' => 'required|min:4|max:200|confirmed',
                    'password_confirmation' => 'required|min:4|max:200',

                ]);
                if ($validator->fails()) {
                    return redirect(route('register',['step' =>'2','number'=>$request->get('number')]))
                                    ->withInput()
                                    ->withErrors('ข้อมูลไม่ถูกต้อง! หรือ Username/Email มีผู้ใช้งานแล้ว!');
                                    ;
                }else{
                    $updateMember = User::find(trim($request->get('id')));
                    $updateMember->titleName = trim($request->get('titleName'));
                    $updateMember->name = trim($request->get('name'));
                    $updateMember->lastname = trim($request->get('lastname'));
                    $updateMember->address = trim($request->get('address'));
                    $updateMember->tel = trim($request->get('tel'));
                    $updateMember->contact = trim($request->get('contact'));
                    $updateMember->email = trim($request->get('email'));
                    $updateMember->username = trim($request->get('username'));
                    $updateMember->password = Hash::make(trim($request->get('password')));
                    $updateMember->save();
                    return redirect('home');
                }
                break;
            default:
                return View('users.register')->with('agreement',$this->agreement);
                break;
        }
        
    }

   
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        return View('users.login'); 
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|alpha_num|min:3|max:32',
            'password' => 'required|min:3'
        ]);

        if($validator->fails()){
            return Redirect::to('login')->withErrors($validator->errors())->withInput();
        }

        if(Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')], $request->get('remember'))){
            if($request->get('redirect') != ''){
                return Redirect::to($request->get('redirect'));
            }else{
                return Redirect::to('home');
            }
        }else{
            $errors['username'] =  'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด';
            $errors['password'] =  ' ';

            return Redirect::to('login')->withErrors($errors)->withInput(); 
        }
    }

    public function insertStuden(){
        $classTeacher = SetupValue::where('slug','like','CLASS-TEACHER-%')->orderby('list')->get();
        $titleName = SetupValue::where('slug','like','TITLE-NAME-%')->orderby('list')->get();
        return view('admin.insertstuden')
                    ->with('classTeachers',$classTeacher)
                    ->with('titleNames',$titleName)
        ;
    }

}

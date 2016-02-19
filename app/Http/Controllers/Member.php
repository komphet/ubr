<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;
use DB;
use Hash;
use App\User;
use App;
use App\SetupValue;
use App\Log;


class Member extends Controller
{
    protected $agreement = null;
    protected $classTeacher = null;
    protected $titleName = null;
    protected $studenListLimit = null;

    public function __construct(){
        //$agreement = SetupValue::where('slug','AGREEMENT')->first()->value;
        //$this->agreement = $agreement;
        $this->classTeacher = SetupValue::where('slug','like','CLASS-TEACHER-%')->orderby('list')->get();
        $this->titleName = SetupValue::where('slug','like','TITLE-NAME-%')->orderby('list')->get();
        $this->studenListLimit = SetupValue::where('slug','STUDEN-LIST-LIMIT')->first()->value;

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
                    $updateMember->active = true;
                    $updateMember->save();
                    $log = new Log;
                    $log->memberId = Auth::user()->id;
                    $log->detail = 'Register,'.$updateMember;
                    $log->save();
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

    
    public function studenList(){
       
        
        
        return view('admin.studenList')
                    ->with('classTeachers',$this->classTeacher)
                    ->with('titleNames',$this->titleName)
                    ->with('studenListLimit',$this->studenListLimit)
        ;
    }

    public function studenListView(Request $request){
        $key = $request->get('key');
        $column = $request->get('column');
        $limit = ($request->get('limit') != '')?$request->get('limit'):$this->studenListLimit;
 
        if($key != ''){
            if(preg_match('/[0-9]\/[0-9]/',$key)){
                $classRoomExplode = explode('/',$key);
                $studenLists = User::where('class',$classRoomExplode[0])
                            ->where('room',$classRoomExplode[1])
                            ->orderby('class')
                            ->orderby('room')
                            ->orderby('CRNo')
                            ->paginate($limit);
            }else{
                $studenLists = User::where($column,$key)
                                ->orderby('class')
                                ->orderby('room')
                                ->orderby('CRNo')
                                ->paginate($limit);
            }

        }else{
         $studenLists = User::orderby('class')->orderby('room')->orderby('CRNo')->paginate($limit);
        }
        //dd($studenLists);
        $page = $studenLists->currentPage();
        $totalPage = $studenLists->lastPage();
        if($request->get('page') > $totalPage){
            return redirect()->route('studenView',['page'=>$totalPage,'limit'=>$limit,'column'=>$column,'key'=>$key]);
        }

        return view('admin.studenListView',compact('studenLists','limit','key','page','totalPage','column'));

    }


    public function yearbook(){
        return view('users.yearbook');
    }

    public function studenUpdate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'classRoom'     => 'required',
            'CRNo'          => 'required',
            'studenNo'      => 'required',
            'idCardNo'      => 'required|min:13|max:13',
            'titleName'     => 'required',
            'name'          => 'required',
            'lastname'      => 'required',
        ]);

        if($validator->fails()){
            return 'false';
        }


        if($request->get('id') != ''){
            $updateMember = User::find($request->get('id'));
        }else{
            $updateMember = new User;
        }

        if($request->get('admin')){
            $admin = 1;
        }else{
            $admin = 0;
        }

        $classRoom = explode(',', $request->get('classRoom'));
        $updateMember->class = trim($classRoom[0]);
        $updateMember->room = trim($classRoom[1]);
        $updateMember->CRNo = trim($request->get('CRNo'));
        $updateMember->gradYear = trim($request->get('gradYear'));
        $updateMember->studenNo = trim($request->get('studenNo'));
        $updateMember->idCardNo = trim($request->get('idCardNo'));
        $updateMember->titleName = trim($request->get('titleName'));
        $updateMember->name = trim($request->get('name'));
        $updateMember->lastname = trim($request->get('lastname'));
        $updateMember->admin = trim($admin);
        $updateMember->save();


        $log = new Log;
        $log->memberId = Auth::user()->id;
        if($request->get('id') != ''){
            $log->detail = 'Update Member,'.$updateMember;
        }else{
            $log->detail = 'Insert Member,'.$updateMember;
        }
        
        $log->save();

        return 'true';
        
    }


    public function index(){
        return view('users.index')
                ->with('classTeachers',$this->classTeacher)
                ->with('titleNames',$this->titleName)
                ;
    }

    public function studenDel(Request $request){
        $id = $request->get('id');
        if($id != ''){
            $idArray = explode(',', $id);
            User::destroy($idArray);
            $log = new Log;
            $log->memberId = Auth::user()->id;
            $log->detail = 'Delete Member id = '.$id;
            $log->save();
            return 'true';
        }
        return 'false';
    }



}

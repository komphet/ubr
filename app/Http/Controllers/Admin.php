<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SetupCate;
use App\SetupKind;
use App\SetupValue;
use Validator;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $SetupCate = SetupCate::orderBy('list')->get();
        $SetupKind = new SetupKind;
        $SetupValue = new SetupValue;
        $cateArray = array();
        foreach ($SetupCate as $key => $cate) {
            $cateArray[$cate->id] = $cate->title;
        }
        return View('admin.index')
                ->with('SetupCate',$SetupCate)
                ->with('SetupKind',$SetupKind)
                ->with('SetupValue',$SetupValue)
                ->with('cateArray',$cateArray);
    }

    protected function checkSlug($table,$slug,$action,$cateId,$kindId,$valueId){
        if($slug == ''){
            return true;
        }
        $slug = strtoupper($slug);
        $update = false;
        switch (strtolower($table)) {
            case 'cate':
                $slugNum1 = SetupKind::where('slug',$slug);
                $slugNum2 = SetupValue::where('slug',$slug);
                $slugSelfNum = SetupCate::where('slug',$slug);
                if($action == 'update'){
                    if(count($slugSelfNum->first()) != 0){
                        if($slugSelfNum->first()->id == $cateId){
                            $update = true;
                        }
                    }elseif(count($slugNum1->first()) != 0){
                        
                    }elseif(count($slugNum2->first()) != 0){
                        
                    }else{
                       $update = true; 
                    }
                }
                
                break;
            case 'kind':
                $slugNum1 = SetupValue::where('slug',$slug);
                $slugNum2 = SetupCate::where('slug',$slug);
                $slugSelfNum = SetupKind::where('slug',$slug);
                if($action == 'update'){
                    if(count($slugSelfNum->first()) != 0){
                        if($slugSelfNum->first()->id == $kindId){
                            $update = true;
                        }
                    }elseif(count($slugNum1->first()) != 0){
                        
                    }elseif(count($slugNum2->first()) != 0){
                        if($slugNum2->first()->id == $cateId){
                            $update = true;
                        }
                    }else{
                       $update = true; 
                    }
                }
                break;
            case 'value':
                $slugNum1 = SetupCate::where('slug',$slug);
                $slugNum2 = SetupKind::where('slug',$slug);
                $slugSelfNum = SetupValue::where('slug',$slug);
                if($action == 'update'){
                    if(count($slugSelfNum->first()) != 0){
                        if($slugSelfNum->first()->id == $valueId){
                            $update = true;
                        }
                    }elseif(count($slugNum1->first()) != 0){
                        if($slugNum1->first()->id == $cateId){
                            $update = true;
                        }
                    }elseif(count($slugNum2->first()) != 0){
                        if($slugNum2->first()->id == $kindId){
                            $update = true;
                        }
                    }else{
                       $update = true; 
                    }
                }
                break;
        }

        //dd(count($slugSelfNum));

        if(count($slugNum1->first()) == 0 && count($slugNum2->first()) == 0 && count($slugSelfNum->first()) == 0){
                return true;
        }else{
            if($update){
                return true;
            }else{
               return false; 
            }
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setupUpdate(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
                    'list' =>  'required',
                    'title' =>  'required', 
                ]);
                if ($validator->fails()) {
                    return 'false';
                }elseif(!$this->checkSlug($request->get('table'),$request->get('slug'),'update',$request->get('cateId'),$request->get('kindId'),$request->get('valueId'))){
                    return 'false';
                }else{
                    if($request->get('active') == null){
                        $active = 0;
                    }else{
                        $active = 1;
                    }
                    switch (strtolower($request->get('table'))) {
                        case 'cate':
                            $update = SetupCate::find($request->get('id'));
                            $update->list = trim($request->get('list'));
                            $update->title = trim($request->get('title'));
                            $update->detail = trim($request->get('detail'));
                            $update->slug = trim(strtoupper($request->get('slug')));
                            $update->active = trim($active);
                            $update->save();
                            if($active == 0){
                                SetupKind::where('idCate',$request->get('cateId'))->update(['active'=>0]);
                                SetupValue::where('idCate',$request->get('cateId'))->update(['active'=>0]);                 
                            }
                            break;
                        case 'kind':
                            $update = SetupKind::find($request->get('id'));
                            $update->list = trim($request->get('list'));
                            $update->title = trim($request->get('title'));
                            $update->detail = trim($request->get('detail'));
                            $update->slug = trim(strtoupper($request->get('slug')));
                            $update->active = trim($active);
                            $update->save();
                            if($active == 1){
                                $update = SetupCate::find($request->get('cateId'));
                                $update->active = 1;
                                $update->save();
                            }elseif($active == 0){
                                SetupValue::where('idKind',$request->get('kindId'))->update(['active'=>0]);                 
                            }
                            break;
                        case 'value':
                            $update = SetupValue::find($request->get('id'));
                            $update->list = trim($request->get('list'));
                            $update->title = trim($request->get('title'));
                            $update->value = trim($request->get('value'));
                            $update->detail = trim($request->get('detail'));
                            $update->slug = trim(strtoupper($request->get('slug')));
                            $update->active = trim($active);
                            $update->save();
                            if($active == 1){
                                $update = SetupKind::find($request->get('kindId'));
                                $update->active = 1;
                                $update->save();

                                $update = SetupCate::find($request->get('cateId'));
                                $update->active = 1;
                                $update->save();
                            }
                            break;
                    }
                    return 'true';
                }
    }

    public function setupInsert(Request $request)
    {
        switch (strtolower($request->get('table'))) {
            case 'value':
                $valueInsActive = $request->get('valueInsActive');
                $validator = Validator::make($request->all(), [
                    'list' =>  'required',
                    'title' =>  'required',
                    'idCate' =>  'required',
                    'idKind' =>  'required',
                    $valueInsActive => 'required',  
                ]);
                if ($validator->fails()) {
                    return 'false';
                }elseif(!$this->checkSlug($request->get('table'),$request->get('slug'),'insert',$request->get('cateId'),$request->get('kindId'),$request->get('valueId'))){
                    return 'false';
                }else{

                    $input = ($valueInsActive == 'valueIns1')?'text':'textarea';
                    $insertValue = new SetupValue;
                    $insertValue->idCate = trim($request->get('idCate'));
                    $insertValue->idKind = trim($request->get('idKind'));
                    $insertValue->list = trim($request->get('list'));
                    $insertValue->title = trim($request->get('title'));
                    $insertValue->value = trim($request->get($valueInsActive));
                    $insertValue->detail = trim($request->get('detail'));
                    $insertValue->slug = trim(strtoupper($request->get('slug')));
                    $insertValue->active = trim($request->get('active'));
                    $insertValue->input = trim($input);
                    $insertValue->save();
                    if($insertValue != ''){
                        return 'true';
                    }else{
                        return 'false';
                    }
                    
                }
                break;
            case 'kind':
                $validator = Validator::make($request->all(), [
                    'list' =>  'required',
                    'title' =>  'required',
                    'idCate' =>  'required',  
                ]);
                if ($validator->fails()) {
                    return 'false';
                }elseif(!$this->checkSlug($request->get('table'),$request->get('slug'),'insert',$request->get('cateId'),$request->get('kindId'),$request->get('valueId'))){
                    return 'false';
                }else{
                    $insertValue = new SetupKind;
                    $insertValue->idCate = trim($request->get('idCate'));
                    $insertValue->list = trim($request->get('list'));
                    $insertValue->title = trim($request->get('title'));
                    $insertValue->detail = trim($request->get('detail'));
                    $insertValue->slug = trim(strtoupper($request->get('slug')));
                    $insertValue->active = trim($request->get('active'));
                    $insertValue->save();
                    if($insertValue != ''){
                        return 'true';
                    }else{
                        return 'false';
                    }
                    
                }

                break;
            case 'cate':
                $validator = Validator::make($request->all(), [
                    'list' =>  'required',
                    'title' =>  'required',  
                ]);
                if ($validator->fails()) {
                    return 'false';
                }elseif(!$this->checkSlug($request->get('table'),$request->get('slug'),'insert',$request->get('cateId'),$request->get('kindId'),$request->get('valueId'))){
                    return 'false';
                }else{
                    $insertValue = new SetupCate;
                    $insertValue->list = trim($request->get('list'));
                    $insertValue->title = trim($request->get('title'));
                    $insertValue->detail = trim($request->get('detail'));
                    $insertValue->slug = trim(strtoupper($request->get('slug')));
                    $insertValue->active = trim($request->get('active'));
                    $insertValue->save();
                    if($insertValue != ''){
                        return 'true';
                    }else{
                        return 'false';
                    }
                    
                }

                break;
        }
        
    }

    public function setupDel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'table' =>  'required',
            'id' =>  'required', 
        ]);
        if ($validator->fails()) {
            return 'false';
        }else{
            switch (strtolower($request->get('table'))) {
                case 'cate':
                    SetupCate::find($request->get('id'))->delete();
                    SetupKind::where('idCate',$request->get('id'))->delete();
                    SetupValue::where('idCate',$request->get('id'))->delete();
                    break;
                case 'kind':
                    SetupKind::find($request->get('id'))->delete();
                    SetupValue::where('idKind',$request->get('id'))->delete();
                    break;
                case 'value':
                    SetupValue::find($request->get('id'))->delete();
                    break;
            }
            
            return $request->get('id');
        }
    }

   
}

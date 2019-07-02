<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;
use DB;

class ManufactureController extends Controller
{
    public function createManufacture(){
        return view('admin.manufacture.createManufacture');
    }
    public function storeManufacture(Request $request){
        
        $this->validate($request,[ 
              'manufactureName'=>'required',
             'manufactureDiscription'=>'required',
               'publicationstatus'=>'required' ,
                 ]);
        
        //return $request->all();
        //
        
        
//         $manufacture =new Manufacture();
//       $manufacture->manufactureName=$request->manufactureName;
//       $manufacture->manufactureDiscription=$request->manufactureDiscription;
//       $manufacture->publicationstatus=$request->publicationstatus;
//       $manufacture->save();
//       return "manufacture save success";
        
           DB::table('manufactures')->insert([
            'manufactureName'=>$request->manufactureName,
             'manufactureDiscription'=>$request->manufactureDiscription,
             'publicationstatus'=>$request->publicationstatus,
             
         ]);
         return redirect('/manufacture/add')->with('massage', 'manufacture info save success');
    }
     public function manageManufacture(){
        $manufacture=  Manufacture::all();
        return view('admin.manufacture.manageManufacture',['manufactures'=>$manufacture]);
        
        
    }
    public function editManufacture($id){
        $manufactureById= Manufacture::where('id',$id)->first();
          return view('admin.manufacture.editManufacture',['manufactureById'=>$manufactureById]);
    }
    public function updateManufacture(Request $request){
        //dd($request->all());
        $manufacture= Manufacture::find($request->manufacturId);
         $manufacture->manufactureName=$request->manufactureName;
          $manufacture->manufactureDiscription=$request->manufactureDiscription;
           $manufacture->publicationstatus=$request->publicationstatus;
           $manufacture->save();
           return redirect('/manufacture/manage')->with('message', 'manufacture info update successfully');
    }
    public function deleteManufacture($id){
        $manufacture= Manufacture::find($id);
        $manufacture->delete();
        return redirect('/manufacture/manage')->with('message', 'manufacture info delete successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use DB;
use Session;
class sliderController extends Controller
{
    public function index(){
		return view('admin.slider.add_slider');
	}
	 public function save_slider(Request $request){
       $slider_image = $request->file('slider_image');
//        echo '<pre>';
//        print_r($productImage);
        $name = $slider_image->getClientOriginalName();
        //echo $imageName;
        $uploadPathImage = 'public/sliderImage/';
        $slider_image->move($uploadPathImage, $name);
        $imageUrl = $uploadPathImage.$name;
		 DB::table('slider')->insert([
            'publication_status'=>$request->publication_status,
            'slider_image'=>$imageUrl,
			]);
			Session::put('message','slider added success');
	
        return redirect('/add_slider');
    }
	public function all_slider(){
	$slider=  DB::table('slider')->get();
        return view('admin.slider.all_slider',['slider'=>$slider]);
        
	}
	//-----this is a unactive slider----------------
	public function unactive_slider($slider_id){
		DB::table('slider')
		->where('slider_id',$slider_id)
		->update(['publication_status'=>0]);
		Session::put('message','slider unative success !!');
	
        return redirect('/all_slider');
		
	}
	//-----this is a active slider----------------
	public function active_slider($slider_id){
		DB::table('slider')
		->where('slider_id',$slider_id)
		->update(['publication_status'=>1]);
		Session::put('message','slider ative success !!');
	
        return redirect('/all_slider');
	}
	
	public function delete_slider($slider_id){
		
		 DB::table('slider')
		 ->where('slider_id',$slider_id)
        ->delete();
        return redirect('/all_slider')->with('message', 'delete slider delete successfully');
	}

   
	
}

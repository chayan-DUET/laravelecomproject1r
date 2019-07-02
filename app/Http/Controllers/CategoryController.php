<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoryController extends Controller
{
//     public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function createCategory(){
        return view('admin.category.createCategory');
    }
     public function storeCategory(Request $request){
         
         $this->validate($request,[ 
              'categoryName'=>'required',
             'CategoryDiscription'=>'required',
               'publicationstatus'=>'required' ,
                 ]);
        // return $request->all();
         //
//        $category =new Category();
//        $category->categoryName=$request->categoryName;
//        $category->CategoryDiscription=$request->CategoryDiscription;
//        $category->publicationstatus=$request->publicationstatus;
//        $category->save();
//        return "category info save successfull";
         
         
         //when data through many table it is not ok
//        Category::create($request->all());
//        return " save success";
         
         //query bilder
         DB::table('categories')->insert([
            'categoryName'=>$request->categoryName,
             'CategoryDiscription'=>$request->CategoryDiscription,
             'publicationstatus'=>$request->publicationstatus,
             
         ]);
        // return " save success with query bilder";
        return redirect('/category/add')->with('message', 'category info save successfully');
    }
    public function manageCategory(){
        $categories=  Category::all();
        return view('admin.category.manageCategory',['categories'=>$categories]);
        
        
    }
    public function editCategory($id){
        $categoryById=  Category::where('id',$id)->first();
          return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }
    public function updateCategory(Request $request){
        //dd($request->all());
        $category=  Category::find($request->categoryId);
         $category->categoryName=$request->categoryName;
          $category->CategoryDiscription=$request->CategoryDiscription;
           $category->publicationstatus=$request->publicationstatus;
           $category->save();
           return redirect('/category/manage')->with('message', 'category info update successfully');
    }
    public function deleteCategory($id){
        $category=  Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message', 'category info delete successfully');
    }
}

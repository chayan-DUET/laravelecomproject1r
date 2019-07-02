<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use App\slider;
use DB;
class WelcomeController extends Controller
{
    public function index(){
       // return "hi";category
      // return view('demo');
        
         $publishedCategoryProducts= Product::where('categoryId',3)
                ->orderBy('id', 'DESC')
//                ->take(2)
                ->get();
     $publishedProducts= Product::where('publicationstatus',1)
              ->orderBy('id', 'DESC')
             ->get();
			 $publishedSlider=DB::table('slider')->where('publication_status',1)
              ->orderBy('slider_id', 'DESC')
             ->get();
          return view('frontEnd.home.homeContent',['publishedProducts'=>$publishedProducts,'publishedCategoryProducts'=>$publishedCategoryProducts,'publishedSlider'=>$publishedSlider]);
    }
     public function category($id){
     
//         $products = DB::table('Products')     m
//            ->join('categories', 'Products.categoryId', '=', 'categories.id')
//            ->join('manufactures', 'Products.manufacturerId', '=', 'manufactures.id')
//            ->select('Products.id','Products.productName','Products.productImage','Products.productPrice','Products.productQuantity','Products.publicationstatus','categories.categoryName', 'manufactures.manufactureName')
//                
//            ->get(); 
//         
//         
//          return view('frontEnd.category.categoryContent',['products'=>$products]);
        $publishedCategoryProducts= Product::where('categoryId',$id)
                ->where('publicationstatus',1)
                ->orderBy('id', 'DESC')
//                ->take(2)
                ->get();
           return view('frontEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }
  /*  for api==========
   *      public function api(){
     publicationstatus
         $products = DB::table('Products')
            ->join('categories', 'Products.categoryId', '=', 'categories.id')
            ->join('manufactures', 'Products.manufacturerId', '=', 'manufactures.id')
            ->select('Products.id','Products.productName','Products.productImage','Products.productPrice','Products.productQuantity','Products.publicationstatus','categories.categoryName', 'manufactures.manufactureName')
                
            ->get(); 
          return view('frontEnd.category.api',['products'=>$products]);
   
          
    } end=======it is call categoryContent.blade.php*/
     public function contuct(){
     
          return view('frontEnd.contact.contactContent');
    }
     public function productDetails($id){
     $productsById= Product::where('id',$id)->first();   
     
          return view('frontEnd.product.productContent',['productsByIds'=>$productsById]);
    }
    public function viewCart(){
        return view('frontEnd.cart.viewCart');
    }
}
 
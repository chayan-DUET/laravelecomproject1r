<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use DB;

class ProductController extends Controller {

    //protected $imageUrl;
    //protected $products;
    public function createProduct() {
        $categories = Category::where('publicationstatus', 1)->get();
        $manufacturers = Manufacture::where('publicationstatus', 1)->get();
        return view('admin.product.createProduct', ['categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    public function storeProduct(Request $request) {
        //return $request->all();
        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productImage' => 'required',
            'publicationstatus' => 'required',
        ]);
        $productImage = $request->file('productImage');
//        echo '<pre>';
//        print_r($productImage);
        $name = $productImage->getClientOriginalName();
        //echo $imageName;
        $uploadPathImage = 'public/productImage/';
        $productImage->move($uploadPathImage, $name);
        //
        $imageUrl = $uploadPathImage . $name;
        $this->saveProductInfo($request, $imageUrl);

        return redirect('/product/add')->with('message', 'product info save successfully');
    }

    protected function saveProductInfo($request, $imageUrl) {
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDiscription = $request->productShortDiscription;
        $product->productLongDiscription = $request->productLongDiscription;
        // $product->productImage=$this->imageUrl;
        $product->productImage = $imageUrl;
        $product->publicationstatus = $request->publicationstatus;
        $product->save();
    }

    public function manageProduct() {
//        $product=  Product::all();
//        echo '<pre>';
//        print_r($product);
//        exit();
//        return view('admin.product.manageProduct');

        $products = DB::table('Products')
                ->join('categories', 'Products.categoryId', '=', 'categories.id')
                ->join('manufactures', 'Products.manufacturerId', '=', 'manufactures.id')
                ->select('Products.id', 'Products.productName', 'Products.productPrice', 'Products.productQuantity', 'Products.publicationstatus', 'categories.categoryName', 'manufactures.manufactureName')
                ->get();
//       print_r($products);
//        exit();
//        return view('admin.product.manageProduct');
        return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function viewProduct($id) {
        $productById = DB::table('Products')
                ->join('categories', 'Products.categoryId', '=', 'categories.id')
                ->join('manufactures', 'Products.manufacturerId', '=', 'manufactures.id')
                ->select('Products.*', 'categories.categoryName', 'manufactures.manufactureName')
                ->where('Products.id', $id)
                ->first();
//         print_r($products);
//         exit();
        return view('admin.product.viewProduct', ['product' => $productById]);
    }

    public function editProduct($id) {
        $categories = Category::where('publicationstatus', 1)->get();
        $manufacturers = Manufacture::where('publicationstatus', 1)->get();
        $ProductById = Product::where('id', $id)->first();
        return view('admin.product.editProduct', ['ProductById' => $ProductById, 'categories' => $categories, 'manufacturers' => $manufacturers]);
    }

    public function updateProduct(Request $request) {
       $imageUrl= $this->imageExitStatus($request);
        
        //echo '<pre>';
//         print_r($productImage);
       // echo $imageUrl;
        // exit();
    }

    public function imageExitStatus($request) {
        $productById = Product::where('id', $request->productId)->first();
        $productImage=$request->file('productImage');
        if ($productImage) {
            unlink($productById->productImage);
            $name = $productImage->getClientOriginalName();
            $uploadPathImage = 'public/productImage/';
            $productImage->move($uploadPathImage, $name);
            $imageUrl = $uploadPathImage . $name;
        } else {
            
            $imageUrl = $productById->productImage;
        }

        return $imageUrl;
    }

}

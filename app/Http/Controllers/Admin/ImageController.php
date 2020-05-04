<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller {
    public function index($id){
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured','desc')->get();
    	return view('admin.products.images.index')->with(compact('product','images'));
    }
    public function store(Request $request, $id){
    	//save img in proyect
    	$file = $request->file('photo');
    	$path = public_path() .'/images/products';
    	$fileName = uniqid() .$file->getClientOriginalName();
    	$moved = $file->move($path,$fileName);

    	//create 1 register en table product_images
    	if ($moved) {
	    	$productImage = new ProductImage();
	    	$productImage->image = $fileName;
	    	$productImage->product_id = $id;
	    	$productImage->save();
    	}
    	return back();
    }
    public function destroy(Request $request, $id){
    	//deletare file
    	$productImage = ProductImage::find($request->image_id);
    	if (substr($productImage->image,0 ,4) === "http"){
    		$deleted = true;
    	}else{
    		$fullPath = public_path() .'images/products/' . $productImage->image;
    		$deleted = 	File::delete($fullPath);
    	}
    	//deletar el register img to db
    	if ($deleted) {
    		$productImage->delete();
    	}
    	return back();
    }
    public function select($id, $image){
        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);

        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();
        return back();
    }
}
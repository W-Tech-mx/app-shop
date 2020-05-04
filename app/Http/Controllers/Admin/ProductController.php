<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function index(){
    	$products = Product::paginate(10);
    return view('admin.products.index')->with(compact('products')); //list
    }
    public function create(){
    	return view('admin.products.create'); //form
    }
    public function store(Request $request){
        //validar
        $messages =[
            'name.requiered' => 'Ingrese name',
            'name.min' => 'debe tener mas de 3 char',
            'description.requiered' => 'es oblogatorio',
            'description.max' => 'hasta 200 char',
            'price.requiered' => 'es obligatorio',
            'price.numeric' => 'preco valido',
            'price.min' => 'valores netativos no'
        ];
        $rules = [
            'name' => 'requiered|min:3',
            'description' => 'requiered|max:200',
            'price' => 'requiered|numeric|min:0'
        ];
        $this->validate($request, $rules,$messages);
        //registrar el producto
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
    	$product->save();
    	return redirect('/admin/products');
    }

    //editar
    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //form
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();
        return redirect('/admin/products');
    }

    //destroy
    public function destroy($id){
        $product = Product::find($id);
        $product->delete(); //delete

        return back();
    }
}

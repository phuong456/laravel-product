<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function login()
    {
        return view('login');
        }
    // public function viewProduct(){
    //     $products = DB::table('tbproducts')->get();
    //     return view('users.viewProduct', ['products' => $products]);
    // }
    public function adminProducts(){
        $products = DB::table('tbproducts')->get();
        return view('admin.adminProducts', ['products' => $products]);
    }
    public function editProduct($code){
        $product = DB::table('tbproducts')->where('code', $code)->first();
        return view('admin.editProduct', ['product' => $product]);
    }
    public function deleteProduct($code){
        DB::table('tbproducts')->where('code', $code)->delete();
        return redirect('admin/adminProducts')->with('message', 'Product deleted successfully.');
    }
    public function checkLogin(Request $request)
    {
        $Username = $request->Username;
        $pwd = $request->pwd;
        $user = DB::table('tbusers')->where('Username', $Username)->first();
        if($user){
            if($user->password == $pwd){
                $request->session()->put('user', $user);
                if($user->role == '1'){
                    return redirect('users/viewProduct');
                }else if($user->role == '2'){
                    return redirect('admin/adminProducts');
                }
            }
        }
        return redirect('login')->with('message', 'Login Failed.');
    }

    public function displayAddProduct(){
        return view('admin.addProduct');
    }

    public function addProduct(Request $request){
        $name = $request->name;
        $price = $request->price;
        $descriptions = $request->descriptions;
        DB::table('tbproducts')->insert([
            'name' => $name,
            'price' => $price,
            'descriptions' => $descriptions
        ]);

        return redirect('admin/adminProducts')->with('message', 'Product added successfully.');
    }
    
    public function edit(Request $request, $code){
        $name = $request->name;
        $price = $request->price;
        $descriptions = $request->descriptions;
        DB::table('tbproducts')->where('code', $code)->update([
            'name' => $name,
            'price' => $price,
            'descriptions' => $descriptions
        ]);
        return redirect('admin/adminProducts');
    }

    public function viewProduct(Request $request){
        $products = DB::table('tbproducts');
    
        if ($request->has('fromPrice') && $request->has('toPrice')) {
                $fromPrice = $request->input('fromPrice');
                $toPrice = $request->input('toPrice');
    
                if (is_numeric($fromPrice) && is_numeric($toPrice)) {
                    $products->whereBetween('price', [$fromPrice, $toPrice]);
                }
        }
        $products = $products->get();
    
        if ($products->isEmpty() && $request->has('fromPrice') && $request->has('toPrice')) {
            return redirect('users/viewProduct')->with(['error' =>'The product you are looking for is not found !!!', 'products' => $products]);
        }
    
        return view('users.viewProduct', compact('products'));
    }
}

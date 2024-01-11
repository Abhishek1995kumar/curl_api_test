<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use DB;
use App\Http\Resources\OrderCollectionResource;

class AdminController extends Controller {
    public function getData(Request $request) {
        // $data = DB::connection("mysql1")->table("products")->get(); // by using raw query
        $data = Product::on("mysql1")->get()->toArray(); // by using raw query 
        $data = collect($data)->groupby('category')->toArray();
        // $val = $data->map(function($datas){
            //     return strtoupper($datas);
            // });
            // prints($val);
            // prints(collect($data)->count());
            
            
            // Product::on("mysql1")->chunk(1, function ($product) {
            //     foreach ($product as $product) {
            //         if($product->previous_price == 1085){
            //             prints($product);
            //         }
            //     }
            // });


            // $names = User::all()->reject(function (User $user) {
            //     return $user->active === false;
            // })->map(function (User $user) {
            //     return $user->name;
            // });

            // $data = Product::on("mysql1")->get()->reject(function(Product $product){
            //     return $product->active === false;
            // })->map(function (Product $product){
            //     if($product->owner=="vendor"){
            //         $p = $product->owner;
            //         return $p;
            //     }else{
            //         return null;
            //     }
            // });

            // $data = DB::connection("mysql1")->scaler("select count(case when previous_price = 1085 then 1 end) as burgers from products");

            // [$options, $notifications] = DB::selectResultSets("email(?)", $request->user()->id);
            // [$results, $notifications] = DB::connection("mysql1")->selectResultSets("call get_detail(email)", $request->id);
            // Using Named Bindings
            // $results = DB::connection("mysql1")->select('select * from products where id = :id', ['id' => 15]);

            // $results = DB::connection("mysql1")->table('products')->where('previous_price', false)->chunkById(20, function (Collection $products) {
            //     foreach ($products as $product) {
            //         DB::table('products')->where('id', $product->id)->update(['active' => true]);
            //     }
            // });

            // $flight = Product::on("mysql1")->where('previous_price', '1085')->first();
            // $freshFlight = $flight->fresh();
            // $freshFlight = $flight->refresh();
            // $pro = Product::on("mysql1")->where('previous_price', true)->chunkById(200, function (Collection $product) {
            //     $product->each->update(['previous_price' => false]);
            // }, $previous_price = 'id');

            // $users = Product::on("mysql1")->cursor()->filter(function (Product $product) {
            //     return $product->id > 500;
            // })->get();
            // echo"Run Fresh Method"; prints($users);
    }


    public function getOneToOne(Request $request) {
        // $order = Order::with("product")->first();
        // return response()->json([
        //     'status' => true,
        //     'data' => $order,
        // ]);
        $order = Product::with("product_attr_gallery", "product_attrs")->where('id',2005)->get();
        $a = $order; 
        foreach($a as $k=>$v){
            return $v;
        }
        // $order_product = OrderProduct::find($request->id);
        // $order_product = $order_product->product;
        // return response()->json([
        //     'status' => true,
        //     'data' => $order,
        // ]);


        // $order = Order::find($request->productid);
        // $order->product;
        // return response()->json([
        //     'status' => true,
        //     'data' => $order,
        // ]);
    }

    public function show(string $id) {
        //
    }

    public function edit(string $id) {
        //
    }

    public function update(Request $request, string $id) {
        //
    }

    public function destroy(string $id) {
        //
    }
}

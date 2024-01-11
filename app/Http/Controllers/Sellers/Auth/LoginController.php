<?php

namespace App\Http\Controllers\Sellers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Str;

class LoginController extends Controller {
    public function __construct(){
        // try{
        //     $this->middleware("guest")->except("logout");
        //     $this->middleware("guest:seller")->except("logout");
        // }catch(\Exception $e){
        //     return resource([
        //         "error" => true, 
        //         "message" => $e->getMessage()
        //     ]);
        // }
    }
    public function login(Request $request) {
        return "abhishek";
    }
}

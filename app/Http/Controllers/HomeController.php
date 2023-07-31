<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $userType = Auth::user()->user_type;

        if($userType == 1) {
            return view('admin.index');
        } else {
            return view('user.index');
        }
    }

    public function index() {
        $products = Product::orderBy('id','desc')->paginate(6);
        return view('user.index', compact('products'));
        // return "Some test text here";
    }
}

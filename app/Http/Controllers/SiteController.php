<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function gethome(){
        $data =[
            'cars' => Product::where('status', 'active')->get()
        ];
        
        return view('site.home', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class authcontroller extends Controller
{
   public function logIn()
   { 
        $categoryList=Category::where('DeleteStatuse','=',0)->get();
        return view('Auth.login' ,[
            'categoryList' =>$categoryList
        ]);
   }
}

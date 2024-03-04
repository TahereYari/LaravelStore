<?php

namespace App\Http\Controllers;

use App\Models\basket;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function mordad()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('created_at', '=', $year)
                   ->whereMonth('created_at', '=', 05)
                   ->get();
      $monthfive=0;
      foreach($baskets as $basket)
      {
         $monthfive += $basket->price;
      }
     
      $monthfivePrice=  $monthfive;
      return $monthfivePrice;


    }
}

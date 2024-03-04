<?php
namespace App\Helpers;

use App\Models\basket;
use Hekmatinasser\Verta\Facades\Verta;
class Helper
{
    public function farvardin()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 01)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
                   
      // $v= dd( Verta($baskets->updated_at));        
      $monthone=0;
      foreach($baskets as $basket)
      {
        $monthone += $basket->price;
      }
     
      $monthonePrice=   $monthone;
      return $monthonePrice;


    }
    public function ordibehesht()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 02)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthTwo=0;
      foreach($baskets as $basket)
      {
         $monthTwo += $basket->price;
      }
     
      $monthTwoPrice=  $monthTwo;
      return $monthTwoPrice;


    }
    public function Khordad()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 03)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthThree=0;
      foreach($baskets as $basket)
      {
         $monthThree += $basket->price;
      }
     
      $monthThreePrice=  $monthThree;
      return $monthThreePrice;


    }
    public function Tir()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 04)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthfour=0;
      foreach($baskets as $basket)
      {
         $monthfour += $basket->price;
      }
     
      $monthfourPrice=  $monthfour;
      return $monthfourPrice;


    }
    public function mordad()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 05)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthfive=0;
      foreach($baskets as $basket)
      {
         $monthfive += $basket->price;
      }
     
      $monthfivePrice=  $monthfive;
      return $monthfivePrice;


    }

    public function shahrivar()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 06)
                   ->where('is_pay' ,'=' ,1)
                     ->get();
         $monthsix=0;
         foreach($baskets as $basket)
         {
            $monthsix += $basket->price;
         }
      
         $monthsixPrice=  $monthsix;
         return $monthsixPrice;


    }

    public function mehr()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 07)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthseven=0;
      foreach($baskets as $basket)
      {
         $monthseven += $basket->price;
      }
     
      $monthsevenPrice=  $monthseven;
      return $monthsevenPrice;


    }

    public function aban()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 8)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthseight=0;
      foreach($baskets as $basket)
      {
         $monthseight += $basket->price;
      }
     
      $monthseightPrice=  $monthseight;
      return $monthseightPrice;


    }

    public function azar()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 9)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthsnine=0;
      foreach($baskets as $basket)
      {
         $monthsnine += $basket->price;
      }
     
      $monthsninePrice=  $monthsnine;
      return $monthsninePrice;


    }

    public function dayMah()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 10)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthsten=0;
      foreach($baskets as $basket)
      {
         $monthsten += $basket->price;
      }
     
      $monthstenPrice=  $monthsten;
      return $monthstenPrice;


    }

    public function bahman()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 11)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $montheleven=0;
      foreach($baskets as $basket)
      {
         $montheleven += $basket->price;
      }
     
      $monthelevenPrice=  $montheleven;
      return $monthelevenPrice;


    }

    public function esfand()
    {
        $year=now()->year;
        $baskets  = basket::whereYear('updated_at', '=', $year)
                   ->whereMonth('updated_at', '=', 12)
                   ->where('is_pay' ,'=' ,1)
                   ->get();
      $monthtewelve=0;
      foreach($baskets as $basket)
      {
         $monthtewelve += $basket->price;
      }
     
      $monthtewelvePrice=  $monthtewelve;
      return $monthtewelvePrice;


    }

}



?>
<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Comment;
use App\Models\store;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentList()
    {
        $store = store::orderByDesc('created_at')->first();
        
        $monthone = new Helper();
        $monthonePrice =$monthone->farvardin();
  
        $monthtwo = new Helper();
        $monthtwoPrice =$monthtwo->ordibehesht();
  
        $monththree = new Helper();
        $monththreePrice =$monththree->Khordad();
  
        $monthtir = new Helper();
        $monthtirPrice =$monthtir->Tir();
  
        $monthfive = new Helper();
        $monthfivePrice =$monthfive->mordad();
  
        $monthsix = new Helper();
        $monthsixPrice =$monthsix->shahrivar();
  
        $monthseven = new Helper();
        $monthsevenPrice =$monthseven->mehr();
  
        $montheight = new Helper();
        $montheightPrice =$montheight->aban();
  
        $monthnine = new Helper();
        $monthtninePrice =$monthnine->azar();
  
        $monthten = new Helper();
        $monthtenPrice =$monthten->dayMah();
  
        $montheleven = new Helper();
        $monthelevenPrice =$montheleven->bahman();
  
        $monthtewelve = new Helper();
        $monthtewelvePrice =$monthtewelve->esfand();

        $comments=Comment::paginate(10);
        return view('admin.inbox',[
         'comments'=>$comments , 
        'store' => $store,

        'monthonePrice' => $monthonePrice,
        'monthtwoPrice' => $monthtwoPrice,
        'monththreePrice' => $monththreePrice,
        'monthtirPrice' => $monthtirPrice,
        'monthfivePrice' => $monthfivePrice,
        'monthsixPrice' => $monthsixPrice,
  
        'monthsevenPrice' => $monthsevenPrice,
        'montheightPrice' => $montheightPrice,
        'monthtninePrice' => $monthtninePrice,
        'monthtenPrice' => $monthtenPrice,
        'monthelevenPrice' => $monthelevenPrice,
        'monthtewelvePrice' => $monthtewelvePrice
    ]);
    }

public function commentActivity($id)
{
    $comment=Comment::find($id);
    if( $comment->preview==1)
    { 
        $comment->preview=0;
    }
    else
    {
        $comment->preview=1;
    }
  $comment->save();
  return redirect(route('comment_list'));
}

public function commentDelete($id)
{
    Comment::findorfail($id)->delete();
 
    return redirect(route('comment_list'));

}
}

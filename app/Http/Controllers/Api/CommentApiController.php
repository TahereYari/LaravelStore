<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentApiController extends Controller
{
    public function commentList()
    {
        
        $comments=Comment::all();
        
        return response(['comments'=>$comments]);
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
            return response(['comment'=>$comment]);
    
       
    }

    public function commentDelete($id)
    {
        Comment::findorfail($id)->delete();
        return response(['message'=>'.دیدگاه انتخاب شده حذف شد ']);

    }

    public function CommentInsert(Request $request,$product_id)
    {
     
        $comment=new Comment();
        $comment->title = $request->title;
        $comment->posetive = $request->posetive;
        $comment->negative = $request->negative;
        $comment->emteaz = $request->emteaz;
        $comment->comment = $request->comment;
        $comment->product_id = $request->product_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return response(['comment'=>$comment]);
    }

   
   
}

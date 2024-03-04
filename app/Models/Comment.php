<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable=['comment','posetive','negative','title','emteaz','product_id','user_id'];

    public function product()
    {
        return $this->belongsTo(product::class)->first();
    }

    public function user()
    {
        return $this->belongsTo(user::class)->first();
    }

}

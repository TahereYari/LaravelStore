<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offcode extends Model
{
    use HasFactory;
    protected $fillable=['code','price','satartdate','enddate'];

    public function baskets()
    {
        return $this->belongsToMany(basket::class)->first();
    }
}

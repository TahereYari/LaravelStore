<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =  ['name' , 'description','image'];
   

    public  function products()
    {
        return $this->hasMany(Product::class)->get();
    }

    public  function discounts()
    {
        return $this->hasMany(discount::class)->get();
    }
}

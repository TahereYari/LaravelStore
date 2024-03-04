<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    protected $fillable=  ['basket_id' , 'product_id','count' ,'price' ,'pricefull','offprice'];
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

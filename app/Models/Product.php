<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable =  ['name' , 'price', 'propertise', 'category_id' ,'image','number'];
   

    public  function category()
    {
        return $this->belongsTo(category::class)->first();
    }

    public  function pictures()
    {
        return $this->hasmany(picture::class)->get();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->get();
    }

    public function favorites()
    {
        return $this->belongsToMany(favorite::class)->get();
    }

    // public function discounts()
    // {
    //     return $this->belongsToMany(discount::class)->orderByDesc('created_at')->first();
    // }

    public function discount()
    {
        return $this->belongsTo(discount::class)->first();
    }

    public  function images()
    {
        return $this->hasMany(picture::class)->get();
    }
}




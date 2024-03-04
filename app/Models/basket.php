<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basket extends Model
{
    protected $fillable=  ['price' , 'is_pay','user_id','address_id','send' ,'offcode'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(user::class)->first();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function Address()
    {
        return $this->belongsTo(AddressUser::class)->first();
    }
    public function offcode()
    {
        return $this->belongsTo(offcode::class)->first();
    }
}

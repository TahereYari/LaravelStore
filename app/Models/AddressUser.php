<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;

    protected $fillable=  ['name','ostan','shahr','code' ,'tel','address'];
    public function user()
    {
        return $this->belongsTo(user::class)->first();
    }
}

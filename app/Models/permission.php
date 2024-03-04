<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    protected $fillable=['create','read','edit	','delete'];
    public function role()
    {
       return $this->belongsTo(role::class)->first();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'tel1', 'email', 'instagram', 'telegram', 'address', 'describe', 'image'];
}

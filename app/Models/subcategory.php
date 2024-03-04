<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable =['subname', 'subdescription', 'category_id'];
    use HasFactory;

    public function category()
    {
       return $this->belongsTo(category::class)->first();
    }
}

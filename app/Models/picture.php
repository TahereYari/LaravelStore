<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    use HasFactory;
    public  function product()
    {

        return $this->belongsTo(product::class)->first();
    }

    protected $fillable =['image1', 'product_id'];

}

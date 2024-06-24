<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
//khóa ngoại
    public function ProductDetail(){
        return $this->belongsTo(ProductDetail::class);
    }
}

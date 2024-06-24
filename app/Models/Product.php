<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
//khóa ngoại
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function Promotion(){
        return $this->belongsTo(Promotion::class);
    }
//làm khóa ngoại
    public function productdetils(){
        return $this->hasMany(ProductDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
//khóa ngoại
    public function Size(){
        return $this->belongsTo(Size::class);
    }
    public function ProductDetail(){
        return $this->belongsTo(ProductDetail::class);
    }
//làm khóa ngoại
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}

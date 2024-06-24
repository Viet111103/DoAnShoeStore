<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function ProductDetail(){
        return $this->belongsTo(ProductDetail::class);
    }
    public function Comment(){
        return $this->belongsTo(Comment::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
//khóa ngoại
    public function Invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public function ProductDetail(){
        return $this->belongsTo(ProductDetail::class);
    }
}

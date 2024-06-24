<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
//khóa ngoại
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Payment(){
        return $this->belongsTo(Payment::class);
    }
//làm khóa ngoại
    public function invoicedetails(){
        return $this->hasMany(InvoiceDetail::class);
    }
}

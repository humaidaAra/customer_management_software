<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function latestInvoice() {
        return $this->hasOne(Invoice::class)->latestOfMany();
    }
}

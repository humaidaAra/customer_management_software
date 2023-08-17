<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contract_id',
        'customer_name',
        'invoice_date',
        'total',
        'status'
    ];
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function owner()
    {
        return $this->hasOneThrough(Customer::class, Contract::class);
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}

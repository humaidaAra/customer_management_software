<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_id',
        'item_name',
        'price',
        'discount',
        'quantity',
        'subtotal',
        'note',
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
    public function contract() {
        return $this->invoice->contract;
    }
}

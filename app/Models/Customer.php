<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
    'name',
    'phone',
    'address',
    'free_trial',
    'start_date',
    'note',
    'created_by'
    ];


    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function invoices()
    {
        //return all invoices from all contracts
        return $this->hasManyThrough(Invoice::class, Contract::class);
    }
    public function invoiceItems() {
        return $this->hasManyThrough(InvoiceItem::class, Invoice::class);
    }

    public function dueInvoices()
    {
        // return customer invoices where status is either unpaid (0) or, if there is a due (2)
        return $this->hasManyThrough(Invoice::class, Contract::class)->whereIn('status', [0, 2]);
    }

    public function latestContract()
    {
        //return latest contract made
        return $this->hasOne(Contract::class)->latestOfMany();
    }
}

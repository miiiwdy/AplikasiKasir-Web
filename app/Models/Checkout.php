<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    public $timestamps = false;
    use HasFactory;

    protected $table = 'checkout';

    protected $fillable = [
        'kode_barang',
        'quantity',
        'price',
        'metode_pembayaran'
    ];

    protected $guarded = [];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


 class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [   //isi nama field nya
        'travel_packages_id', 'users_id', 'additional_visa', 
        'transaction_total', 'transaction_status' 
    ];

    protected $hidden = [

    ];

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }
        
    public function travel_package(){   #ambil relasi dari gallery.php 
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

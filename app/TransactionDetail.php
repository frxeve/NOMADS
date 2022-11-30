<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [   //isi nama field nya sesuaikan sama di localhost
       'transactions_id', 'username', 'nationality', 
       'is_visa', 'doe_passport' 
    ];

    protected $hidden = [

    ];

        
    public function transaction(){   
        return $this->belongsTo(TravelPackage::class, 'transactions_id', 'id');  #sesuaikan sama fillable
    }

    
}

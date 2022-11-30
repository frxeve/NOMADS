<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [   //isi nama field nya
        'travel_package_id', 'images', 
    ];

    protected $hidden = [

    ];

    public function travel_package(){    #ambil travel_package dari TravelPackage.php
        return $this->belongsTo(TravelPackage::class, 'travel_package_id', 'id');
    }
        
}

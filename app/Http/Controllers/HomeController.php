<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = TravelPackage::with(['galleries'])->get()->take(4); 
        //dd($items);

        return view('pages.home', [
            'items' => $items
        ]);

    }
}

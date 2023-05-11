<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    //
    function index_mitra(){
        return view('dashboard.pages.marketplace.mitra');
    }
}

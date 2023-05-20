<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObligasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
}

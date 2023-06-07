<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Funding;
use App\Models\FundTransaction;
use Illuminate\Http\Request;

class FundingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $fundings = Funding::where('user_id', auth()->user()->id)->get();
        
        return view('dashboard.pages.portofolio.index', ['fundings' => $fundings]);
    }
    public function show_sell($id){
        $funding = Funding::find($id);
        $funding['min_price'] = $funding->fund_nominal - ($funding->fund_nominal * 0.05);
        $funding['max_price'] = $funding->fund_nominal + ($funding->fund_nominal * 0.05);
        return view('dashboard.pages.portofolio.sell', ['funding' => $funding]);
    }
    public function sell(Request $request,$id){
        $transaction = $request->validate([
            'price' => 'required',
        ]);
        $funding = Funding::find($id);
        $transaction['max_price'] = $funding->fund_nominal + ($funding->fund_nominal * 0.05);
        $transaction['min_price'] = $funding->fund_nominal - ($funding->fund_nominal * 0.05);
        if ($transaction['price'] > $transaction['max_price'] || $transaction['price'] < $transaction['min_price']) {
            return redirect()->route('portofolio.sell',['id' => $id])->with('error', 'Mohon masukkan nominal harga yang sesuai dengan batas minimal dan maksimal');
        }
        if ($funding->status == 'on_sell') {
            return redirect()->route('portofolio.index',['id' => $id])->with('error', 'Funding already on sell');
        }

        $funding->update([
            'status' => 'on_sell',
            'price' => $transaction['price'],
        ]);

        return redirect()->route('portofolio.sell',['id' => $id])->with('success', 'Funding has been put on sell');
    }
    
}

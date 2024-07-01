<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Order;
use App\Models\WebEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1 - return Order::get();

        // ------------------------------------------------------

        // 2a - $events = WebEvent::all('occurred_at','account_id','channel');
        // return $events->take(15);

        //-------------------------------------------------------

        // 2b - return WebEvent::select(['occurred_at','account_id','channel'])->limit(15)->get();

        //------------------------------------------------------------

        // 2c - return DB::table('web_events')->select('occurred_at','account_id','channel')->limit(15)->get();

        //-------------------------------------------------------------

        // 3 - $orders = Order::early()->limit(10)->get();
        // $orders = $orders->map(function($orders){
        //     return $orders->only(['id','occurred_at','totalUSD']);
        // });
        // return $orders;

        //---------------------------------------------------------------

        // 4 - $orders = Order::all();
        // $orders = $orders->sortBy(function ($orders){
        //     return $orders->totalUSD;
        // },SORT_REGULAR,true);
        // return $orders->select('occurred_at','account_id','totalUSD')->take(5);

        //------------------------------------------------------------------

        
        // 5 - $orders = Order::all();
        //   $orders = $orders->sortBy(function($orders){
        //     return $orders->account_id;
        // })->sortByDesc(function($orders){
        //     return $orders->totalUSD;
        // });
        // return $orders->select(['id','account_id','totalUSD']);

        //-------------------------------------------------------------------

        // 6 - $orders = Order::all();
        //  $orders = $orders->sortByDesc(function($orders){
        //     return $orders->totalUSD;
        // })->sortBy(function($orders){
        //     return $orders->account_id;
        // });
        // return $orders->select(['id','account_id','totalUSD']);

        //---------------------------------------------------------------------
        // 7 - $orders = Order::where('gloss_amt_usd',">=",1000)->limit(5)->get();
        //-------------------------------------------------------------------------
        //  8 - $orders= Order::all();
        // $orders = $orders->filter(function ($orders){
        //     return $orders->totalUSD <500 ;
        // });
        // return $orders->take(10);
        //-----------------------------------------------------------------
        // 9 - $account = Account::where('name','Exxon Mobil')->select('name', 'website', 'primary_poc')->get();
        // return $account;
        //------------------------------------------------------------------
        //     10 - $orders = Order::where('standard_qty','<>',0)->get();
        //     return $orders->select('id','account_id','unitPriceStandard')->all();
        //-----------------------------------------------------------------------
        // 11a - $account = Account::where('name','like','C%')->get();
        // return $account;
        //-----------------------------------------------------------
        // 11b - $account = Account::all();
        // $account = $account->filter(function($account){
        //     return Str::startsWith($account->name, 'C');
        // });
        // return $account;
        //--------------------------------------------
        // 12a - $accounts = Account::where('name','like','%one%')->get();
        // return $accounts;
        //---------------------------------------------
        // 12b - $accounts = Account::all();
        // $accounts = $accounts->filter(function ($accounts){
        //     return Str::contains($accounts->name ,'one',true);
        // });
        // return $accounts;
        //-------------------------------------------------
        // 13a - $accounts = Account::where('name','like','%s')->get();
        // return $accounts;
        //-------------------------------------------------
        // 13b - $accounts = Account::all();
        // $accounts = $accounts->filter(function ($accounts){
        //     return Str::endsWith($accounts->name ,'s',false);
        // });
        // return $accounts;
        //-----------------------------------------------------
        // 14a - $accounts = Account::whereIn('name',['Walmart', 'Target', 'Nordstrom'])->get();
        // return $accounts;
        //-------------------------------------------------------
        // 14b - $accounts = Account::all();
        // $accounts = $accounts->filter(function($accounts){
        //     return in_array($accounts->name , ['Walmart', 'Target', 'Nordstrom']);
        // });
        // return $accounts;
        //------------------------------------------------------
        //15a - $events = WebEvent::whereIn('channel',['organic','adwords'])->get();
        // return $events;
        //------------------------------------------------------
        //15b - $events = WebEvent::all();
        // $events = $events ->filter(function($events){
        //     return in_array($events->channel , ['organic','adwords']);
        // });
        // return $events;
        //--------------------------------------------------------
        // 16a - $accounts = Account::whereNotIn('name',['Walmart', 'Target', 'Nordstrom'])
        // ->select('name', 'primary_poc', 'sales_rep_id')->get();
        // return $accounts;
        //----------------------------------------------------------------
        // 16b - $accounts = Account::all();
        // $accounts = $accounts->filter(function($accounts){
        //     return !(in_array($accounts->name , ['Walmart', 'Target', 'Nordstrom']));
        // })->select('name', 'primary_poc', 'sales_rep_id');
        // return $accounts;
        //------------------------------------------------------------
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

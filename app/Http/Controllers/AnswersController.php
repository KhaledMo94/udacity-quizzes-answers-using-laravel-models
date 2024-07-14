<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Order;
use App\Models\Region;
use App\Models\SalesRep;
use App\Models\WebEvent;
use Carbon\Carbon;
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
        //--------------------------(( Chapter 1 ))---------------------------------
        //--------------------------(( Chapter 1 ))---------------------------------
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
        // 9 - $accounts = Account::where('name','Exxon Mobil')->select('name', 'website', 'primary_poc')->get();
        // return $accounts;
        // 9 - $accounts = Account::where('name','Exxon Mobil')->select('name', 'website', 'primary_poc')->get();
        // return $accounts;
        //------------------------------------------------------------------
        //     10 - $orders = Order::where('standard_qty','<>',0)->get();
        //     return $orders->select('id','account_id','unitPriceStandard')->all();
        //-----------------------------------------------------------------------
        // 11a - $accounts = Account::where('name','like','C%')->get();
        // return $accounts;
        // 11a - $accounts = Account::where('name','like','C%')->get();
        // return $accounts;
        //-----------------------------------------------------------
        // 11b - $accounts = Account::all();
        // $accounts = $accounts->filter(function($accounts){
        //     return Str::startsWith($accounts->name, 'C');
        // 11b - $accounts = Account::all();
        // $accounts = $accounts->filter(function($accounts){
        //     return Str::startsWith($accounts->name, 'C');
        // });
        // return $accounts;
        // return $accounts;
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
        // 17a - $events = WebEvent::whereNotIn('channel',['organic','adwords'])
        // ->get();
        // return $events;
        //------------------------------------------------------------
        // 17b - $events = WebEvent::all();
        // $events = $events ->filter(function($events){
        //     return !in_array($events->channel , ['organic','adwords']);
        // });
        // return $events;
        //-------------------------------------------------------------
        // 18a - $accounts = Account::where('name','not like','%C')->select('name')->get();
        // return $accounts;
        //-------------------------------------------------------------
        // 18b - $accounts = Account::all();
        // $accounts = $accounts->filter(function($accounts){
        //     return $accounts->name[-1] !== "C" && $accounts->name[-1] !== "C";
        // })->select('name');
        // return $accounts;
        //-------------------------------------------------------------
        // 19a - $accounts = Account::where('name','not like','%one%')->select('name')->get();
        // return $accounts;
        //-------------------------------------------------------------
        // 19b - $accounts = Account::all('name');
        // $accounts = $accounts->filter(function($accounts){
        //     return !Str::contains($accounts->name , 'one');
        // });
        // return $accounts;
        //--------------------------------------------------------------
        // 20a - $accounts = Account::where('name','not like','%s')
        // ->Where('name','not like','%S')->select('name')->get();
        // return $accounts;
        //-------------------------------------------------------------
        // 21a - $orders = Order::where('standard_qty','>',1000)
        // ->where('poster_qty',0)->where('gloss_qty',0)->get();
        // return $orders;
        //--------------------------------------------------------------
        // 21b - $orders = Order::all();
        // $orders = $orders->filter(function($orders){
        //     return $orders->standard_qty > 1000 && $orders->poster_qty == 0 && $orders->gloss_qty == 0; 
        // });
        // return $orders;
        //---------------------------------------------------------------
        // 22a - $accounts = Account::where('name','not like','C%')
        // ->where('name','like','%s')->get();
        // return $accounts;
        //--------------------------------------------------------------------
        // 22b - $accounts = Account::all();
        // $accounts = $accounts->filter(function($accounts){
        //     return !(Str::startsWith($accounts->name, 'C')) && Str::endsWith($accounts->name,'s');
        // });
        // return $accounts;
        //---------------------------------------------------------------------
        // 23a - $orders = Order::whereBetween('gloss_qty',[24 , 29])
        //         ->select('gloss_qty','occurred_at')->get();
        // return $orders;
        //---------------------------------------------------------------------
        // 23b - $orders = Order::select('gloss_qty','occurred_at')->get();
        // $orders = $orders->filter(function($orders){
        //     return ($orders->gloss_qty >= 24 ) && ($orders->gloss_qty <= 29);
        // });
        // return $orders;
        //-----------------------------------------------------------------------
        // 24a - $events = WebEvent::where('channel','adword')->orWhere('channel','organic')
        // ->whereYear('occurred_at','=',2016)->orderBy('occurred_at')->get();
        // return $events;
        //-------------------------------------------------------------------------
        // 24b - $events = WebEvent::all();
        // $events = $events->filter(function($events){
        //     return Carbon::parse($events->occurred_at)->year == '2016';
        // })->whereIn('channel',['adword','organic']);
        // $events = $events->sortBy(function($events){
        //     return Carbon::parse($events->occurred_at);
        // });
        // return $events;
        //-------------------------------------------------------------------------
        // 25a - $orders = Order::where('gloss_qty','>',4000)->orWhere('poster_qty','>',4000)
        // ->select('id')->get();
        // return $orders;
        //-------------------------------------------------------------------------
        // 25b - $orders = Order::all()->filter(function($orders){
        //     return $orders->gloss_qty > 4000  || $orders->poster_qty > 4000;
        // })->select('id');
        // return $orders;
        //---------------------------------------------------------------------------
        // 26a - $orders = Order::where('standard_qty',0)
        // ->where(function($orders){
        //     return $orders->where('gloss_qty',">",1000)->orWhere('poster_qty',">",1000);
        // })->select('id')->get();
        // return $orders;
        //--------------------------------------------------------------------------
        // 26b - $orders = Order::all('id','poster_qty','gloss_qty','standard_qty')
        // ->filter(function($orders){
        //     return $orders->standard_qty == 0 && ($orders->gloss_qty > 1000  || $orders->poster_qty >1000) ;
        // })->select('id');
        // return $orders;
        //---------------------------------------------------------------------------
        // 27a - $accounts = Account::where(function($accounts){
        //     return $accounts->where('name','like','C%') || $accounts->where('name','like','W%');
        // })->where(function($accounts){
        //     return $accounts->where('primary_poc','like','%ana%') || $accounts->where('primary_poc','like','%Ana%');
        // })->where('primary_poc','not like','%eana%')->get();
        // return $accounts;
        //------------------------------------------------------------------------------
        // 27b - $accounts = Account::all()->filter(function($accounts){
        //     return Str::startsWith($accounts->name,'C') || Str::startsWith($accounts->name,'W');
        // })->filter(function($accounts){
        //     return Str::contains($accounts->primary_poc,'ana') || Str::contains($accounts->primary_poc,'Ana');
        // })->reject(function($accounts){
        //     return Str::contains($accounts->primary_poc ,'eana'); 
        // });
        // return $accounts;
        //----------------------------------------------------------------------------------
        //------------------------End of Chapter 1 -----------------------------------------

        //------------------------- Chapter 2 ---------------------------------------------
        //-----------------------------------------------------------------------------------
        // 28a - $events = WebEvent::with('account')->whereHas('account',function($query){
        //     $query->where('name','Walmart');
        // })->get()->map(function($events){
        //     return [
        //         'channel'           =>$events->channel,
        //         'occurred_at'       =>$events->occurred_at,
        //         'primary_poc'       =>$events->account->primary_poc,
        //         'name'              =>$events->account->name
        //     ];
        // });
        // return $events;
        //------------------------------------------------------------------------
        // 28b - $events = WebEvent::select('web_events.channel','web_events.occurred_at','accounts.primary_poc','accounts.name')
        // ->join('accounts','web_events.account_id','=','accounts.id')
        // ->where('accounts.name','Walmart')->get();
        // return $events;
        //------------------------------------------------------------------------------
        // 29a - $query = SalesRep::select(
        //     'sales_reps.name as sales_name' , 
        //     'region.name as region_name' ,
        //     'accounts.name as acc_name')
        //     ->join('region','sales_reps.region_id','=','region.id')
        //     ->join('accounts','sales_reps.id','=','accounts.sales_rep_id')
        //     ->orderBy('acc_name')->get();
        // return $query;
        //-------------------------------------------------------------------------------
        // 29b - $query = SalesRep::with(['accounts','region'])->get();
        // $result = collect([]);
        // foreach($query as $row){
        //     foreach($row->accounts as $account){
        //         $section = [
        //             'account_name'                  =>$account->name,
        //             'Region_name'                   =>$row->region->name,
        //             'Sales_Rep_name'                =>$row->name,
        //         ];
        //         $result = $result->push($section);
        //     }
        // }
        // $result = $result->sortBy('account_name');
        // return $result->values();
        //--------------------------------------------------------------------------------------
        // 30 - $query = SalesRep::with('accounts.orders','region')->get();
        // $result = collect([]);
        // foreach( $query as $row){
        //     foreach($row->accounts as $account){
        //         foreach($account->orders as $order){
        //             $section = [
        //                 'account'                   =>$account->name,
        //                 'region'                    =>$row->region->name,
        //                 'unit_price'                =>$order->totalUSD / ($order->totalAmount+0.01), 
        //             ];
        //             $result = $result->push($section);
        //         }
        //     }
        // }
        // return $result;
        //-----------------------------------------------------------------------------------------
        // 31a - $query = SalesRep::join('accounts','accounts.sales_rep_id','=','sales_reps.id')
        // ->join('region','sales_reps.region_id','=','region.id')
        // ->select(
        //     'sales_reps.name as sales_name',
        //     'accounts.name as account_name',
        //     'region.name as region_name')
        // ->where('region.name','Midwest')
        // ->orderBy('accounts.name')->get();
        // // dd($query->toSql());
        // return $query;
        //---------------------------------------------------------------------------------------------
        // 31b - $query =SalesRep::with(['accounts','region'])->get();
        // $query = $query->filter(function($query){
        //     return $query->region->name == "Midwest" ;
        // });
        // // return $query;
        // $result = collect([]);
        // foreach($query as $row){
        //     foreach($row->accounts as $account){
        //         $section = [
        //             'sales_rep'                 =>$row->name,
        //             'Acc name'                  =>$account->name,
        //             'region'                    =>$row->region->name,
        //         ];
        //         $result = $result->push($section);
        //     };
        // };
        // return $result->sortBy('Acc name')->values();
        //----------------------------------------------------------------------
        //32a - $query = SalesRep::join('accounts','accounts.sales_rep_id','=','sales_reps.id')
        //     ->join('region','sales_reps.region_id','=','region.id')
        //     ->select(
        //         'sales_reps.name as sales_name',
        //         'accounts.name as account_name',
        //         'region.name as region_name')
        //     ->where('region.name','Midwest')
        //     ->where('sales_reps.name','like','S%')
        //     ->orderBy('accounts.name')->get();
        // return $query;
        //--------------------------------------------------------------------------------
        // 32b - $query = SalesRep::with(['accounts','region'])->get();
        // $result = collect();
        // foreach($query as $row){
        //     foreach ($row->accounts as $account){
        //         if(Str::startsWith($row->name , 'S') && $row->region->name == "Midwest" ){
        //             $section = [
        //             'sales_rep'                 =>$row->name,
        //             'Acc name'                  =>$account->name,
        //             'region'                    =>$row->region->name,
        //             ];
        //             $result = $result->push($section);
        //         };
        //     };
        // };
        // return $result->sortBy('Acc name')->values();
        //-----------------------------------------------------------------------------------
        // 33a - $query = SalesRep::join('accounts','accounts.sales_rep_id','=','sales_reps.id')
        //     ->join('region','sales_reps.region_id','=','region.id')
        //     ->select(
        //         'sales_reps.name as sales_name',
        //         'accounts.name as account_name',
        //         'region.name as region_name')
        //     ->where('region.name','Midwest')
        //     ->where('sales_reps.name','like','% k%')
        //     ->orderBy('accounts.name')->get();
        // return $query;
        //-----------------------------------------------------------------------------------
        // 33b - $query = SalesRep::with(['accounts','region'])->get();
        // $result = collect();
        // foreach($query as $row){
        //     foreach ($row->accounts as $account){
        //         if(preg_match('/\sK/',$row->name) && $row->region->name == "Midwest" ){
        //             $section = [
        //             'sales_rep'                 =>$row->name,
        //             'Acc name'                  =>$account->name,
        //             'region'                    =>$row->region->name,
        //             ];
        //             $result = $result->push($section);
        //         };
        //     };
        // };
        // return $result->sortBy('Acc name')->values();
        //------------------------------------------------------------------------------------
        // 34a - $query = Region::with('salesReps.accounts.orders')->get();
        // $collection = collect();
        // foreach ($query as $region){
        //     foreach ( $region->salesReps as $rep){
        //         foreach ($rep->accounts as $account){
        //             foreach ($account->orders as $order){
        //                 if($order->standard_qty >100){
        //                     $section = [
        //                         'region'                =>$region->name,
        //                         'account'               =>$account->name,
        //                         'unit-price'            =>$order->totalUSD/($order->totalAmount + 0.01),
        //                     ];
        //                     $collection = $collection->push($section);
        //                 };
        //             };
        //         };
        //     };
        // };
        // return $collection;
        //-------------------------------------------------------------------------
        // 34b - $query = Order::join('accounts as a','orders.account_id','=','a.id')
        // ->join('sales_reps as s','a.sales_rep_id','=','s.id')
        // ->join('region as r','r.id','=','s.region_id')
        // ->select('r.name as region_name','a.name as account_name','orders.*')
        // ->where('orders.standard_qty','>',100)->get();
        // $result= $query->map(function($query){
        //     return [
        //         'region_name'                       =>$query->region_name,
        //         'account_name'                      =>$query->account_name,
        //         'unit-price'                        =>$query->totalUSD/($query->totalAmount+ 0.01),
        //     ];
        // });
        // return $result;
        //-----------------------------------------------------------------------
        // 35a - $query = Region::with('salesReps.accounts.orders')->get();
        // $collection = collect();
        // foreach ($query as $region){
        //     foreach ( $region->salesReps as $rep){
        //         foreach ($rep->accounts as $account){
        //             foreach ($account->orders as $order){
        //                 if($order->standard_qty >100 && $order->poster_qty >50 ){
        //                     $section = [
        //                         'region'                =>$region->name,
        //                         'account'               =>$account->name,
        //                         'unit-price'            =>$order->totalUSD/($order->totalAmount + 0.01),
        //                     ];
        //                     $collection = $collection->push($section);
        //                 };
        //             };
        //         };
        //     };
        // };
        // return $collection->sortBy('unit-price')->values();
        //--------------------------------------------------------------------------------
        // 35b - $query = Order::join('accounts as a','orders.account_id','=','a.id')
        // ->join('sales_reps as s','a.sales_rep_id','=','s.id')
        // ->join('region as r','r.id','=','s.region_id')
        // ->select('r.name as region_name','a.name as account_name','orders.*')
        // ->where('orders.standard_qty','>',100)
        // ->where('orders.poster_qty','>',50)
        // ->get();
        // $result= $query->map(function($query){
        //     return [
        //         'region_name'                       =>$query->region_name,
        //         'account_name'                      =>$query->account_name,
        //         'unit-price'                        =>$query->totalUSD/($query->totalAmount + 0.01),
        //     ];
        // })->sortBy('unit-price')->values();
        // return $result;
        //----------------------------------------------------------------
        // 36a - $query = Region::with('salesReps.accounts.orders')->get();
        // $collection = collect();
        // foreach ($query as $region){
        //     foreach ( $region->salesReps as $rep){
        //         foreach ($rep->accounts as $account){
        //             foreach ($account->orders as $order){
        //                 if($order->standard_qty >100 && $order->poster_qty >50 ){
        //                     $section = [
        //                         'region'                =>$region->name,
        //                         'account'               =>$account->name,
        //                         'unit-price'            =>$order->totalUSD/($order->totalAmount + 0.01),
        //                     ];
        //                     $collection = $collection->push($section);
        //                 };
        //             };
        //         };
        //     };
        // };
        // return $collection->sortBy('unit-price',SORT_REGULAR,true)->values();
        //------------------------------------------------------------------------------
        // 36b - $query = Order::join('accounts as a','orders.account_id','=','a.id')
        // ->join('sales_reps as s','a.sales_rep_id','=','s.id')
        // ->join('region as r','r.id','=','s.region_id')
        // ->select('r.name as region_name','a.name as account_name','orders.*')
        // ->where('orders.standard_qty','>',100)
        // ->where('orders.poster_qty','>',50)
        // ->get();
        // $result= $query->map(function($query){
        //     return [
        //         'region_name'                       =>$query->region_name,
        //         'account_name'                      =>$query->account_name,
        //         'unit-price'                        =>$query->totalUSD/($query->totalAmount + 0.01),
        //     ];
        // })->sortBy('unit-price',SORT_REGULAR,true)->values();
        // return $result;
        //-----------------------------------------------------------------------------
        // 37a - $query = Account::join('web_events as w','w.account_id','=','accounts.id')
        // ->select('accounts.name','w.channel')
        // ->distinct()
        // ->where('accounts.id',1001)
        // ->get();
        // return $query;
        //-----------------------------------------------------------------------------
        $query = Order::with('account')->get();
        $query = $query->filter(function($query){
            return Carbon::parse($query->occurred_at)->year =='2015';
        })->map(function($query){
            return [
                'occurred_at'           =>$query->occurred_at,
                'total amount'          =>$query->totalAmount,
                'total USD'             =>$query->totalUSD,
                'account'               =>$query->account->name
            ];
        });
        return $query;
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

<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Order;
use App\Models\Region;
use App\Models\SalesRep;
use App\Models\WebEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        // 37b -$query = Order::with('account')->get();
        // $query = $query->filter(function($query){
        //     return Carbon::parse($query->occurred_at)->year =='2015';
        // })->map(function($query){
        //     return [
        //         'occurred_at'           =>$query->occurred_at,
        //         'total amount'          =>$query->totalAmount,
        //         'total USD'             =>$query->totalUSD,
        //         'account'               =>$query->account->name
        //     ];
        // });
        // return $query;
        //================================================================================
        //==========================  End of Chapter 2  ==================================
        //==========================  Chapter 3 ==========================================

        // 38a - $total_poster=Order::sum('poster_qty');
        // return $total_poster;
        //-------------------------------------------------------------
        // 38b - $total_poster = DB::table('orders')->sum('poster_qty');
        // return $total_poster;
        //---------------------------------------------------------
        // 38c - $query = Order::select('poster_qty')->get();
        // return $query->sum('poster_qty');
        //-----------------------------------------------------------
        // 39a - $total_standard=Order::sum('standard_qty');
        // return $total_standard;
        //-------------------------------------------------------------
        // 39b - $total_standard = DB::table('orders')->sum('standard_qty');
        // return $total_standard;
        //---------------------------------------------------------
        // 39c - $query = Order::select('standard_qty')->get();
        // return $query->sum('standard_qty');
        //-----------------------------------------------------------
        // 40a - $usd = Order::all();
        // return $usd->sum('totalUSD');
        //------------------------------------------------------------
        // 41a - $total = Order::all('id','standard_amt_usd','gloss_amt_usd');
        // return $total->map(function($total){
        //     return [
        //         'total'             =>$total->standard_amt_usd + $total->gloss_amt_usd,
        //         'id'                =>$total->id
        //     ];
        // });
        //------------------------------------------------------------------------
        // 41b - $total = Order::selectRaw('standard_amt_usd + gloss_amt_usd as total')->get();
        // return $total;
        //-------------------------------------------------------------------------
        // 41c - $total = DB::table('orders')->selectRaw('standard_amt_usd + gloss_amt_usd as total')->get();
        // return $total;
        //-------------------------------------------------------------------------
        // 42a - $result = Order::selectRaw('avg(standard_amt_usd) / avg(standard_qty)')->get();
        // return $result;
        //-------------------------------------------------------------------------------------
        // 42b - $result = DB::table('orders')->selectRaw('avg(standard_amt_usd) / avg(standard_qty)')->get();
        // return $result;
        //-------------------------------------------------------------------------------
        // 43a - $date = Order::selectRaw('min(occurred_at) as occurred_at')->get();
        // return $date[0]->occurred_at;
        //-------------------------------------------------------------------------------
        // 43b - $date = DB::table('orders')->min('occurred_at');
        // return $date;
        //---------------------------------------------------------------------
        // 43c - $date = Order::min('occurred_at');
        // return $date;
        //---------------------------------------------------------------------
        // 44d - $date = Order::all('occurred_at')->min('occurred_at');
        // return $date;
        //---------------------------------------------------------------------
        // 45 - $date = Order::select('occurred_at')->orderBy('occurred_at')->first();
        // return $date;
        //----------------------------------------------------------------
        // 46a - $event = WebEvent::max('occurred_at');
        // return $event;
        //----------------------------------------------------------------
        // 46b - $event = WebEvent::select('occurred_at')->orderBy('occurred_at','desc')->first();
        // return $event->occurred_at;
        //----------------------------------------------------------------
        // 49a - $query = Order::selectRaw(    
        // 'avg(standard_qty) as avg_standard_qty, ' .
        // 'avg(poster_qty) as avg_poster_qty, ' .
        // 'avg(gloss_qty) as avg_gloss_qty, ' .
        // 'avg(standard_amt_usd) as avg_standard_amt_usd, ' .
        // 'avg(poster_amt_usd) as avg_poster_amt_usd, ' .
        // 'avg(gloss_amt_usd) as avg_gloss_amt_usd')->get();
        // return $query;
        //----------------------------------------------------------------
        // 49b - $query = DB::table('orders')->selectRaw(    
        //     'avg(standard_qty) as avg_standard_qty, ' .
        //     'avg(poster_qty) as avg_poster_qty, ' .
        //     'avg(gloss_qty) as avg_gloss_qty, ' .
        //     'avg(standard_amt_usd) as avg_standard_amt_usd, ' .
        //     'avg(poster_amt_usd) as avg_poster_amt_usd, ' .
        //     'avg(gloss_amt_usd) as avg_gloss_amt_usd')->get();
        //     return $query;
        //----------------------------------------------------------------
        // 50 - $query = Order::all();
        // if($query->count()%2 === 0){
        //     $first = $query->select('totalUSD')->sortBy('totalUSD')
        //     ->offsetGet($query->count()/2);
        //     $second = $query->select('totalUSD')->sortBy('totalUSD')
        //     ->offsetGet(($query->count()/2)-1);
        //     return ($first['totalUSD'] + $second['totalUSD'])/2;
        // }else{
        //     $median = $query->select('totalUSD')->sortBy('totalUSD')
        //     ->offsetGet(floor($query->count()/2))['totalUSD'];
        //     return $median;
        // }
        //----------------------------------------------------------------
        // 51a - $first_order = Order::with('account')
        // ->orderBy('occurred_at')
        // ->first();
        // return response()->json([
        //     'Account'               =>$first_order->account->name,
        //     'Date'                  =>$first_order->occurred_at
        // ]);
        //--------------------------------------------------------------
        // 51b - $first_order = Order::join('accounts as a','orders.account_id','=','a.id')
        // ->orderBy('orders.occurred_at')->limit(1)->select('a.name','orders.occurred_at')->get();
        // return $first_order;
        //--------------------------------------------------------------
        // 52a - $orders = Order::with('account')->get(); //to get totalUSD
        // $grouped = $orders->groupBy('account.name');
        // $result = $grouped->map(function ($grouped, $accountName) {
        //     $totalSalesUsd = $grouped->sum('totalUSD');
        //     return [
        //         'account_name' => $accountName,
        //         'total_sales_usd' => $totalSalesUsd,
        //     ];
        // });
        // return $result;
        //--------------------------------------------------------------
        // 52b - $query = Order::join('accounts as a','a.id','=','orders.account_id')
        // ->select('a.name')
        // ->selectRaw('sum(orders.standard_amt_usd) as standard_amt_usd')
        // ->selectRaw('sum(orders.gloss_amt_usd) as gloss_amt_usd')
        // ->selectRaw('sum(orders.poster_amt_usd) as poster_amt_usd')
        // ->groupBy('a.name')
        // ->get();
        // return $query->map(function($query){
        //     return [
        //         'Account'                   =>$query->name,
        //         'totalUsd'                  =>$query->totalUSD
        //     ];
        // });
        //--------------------------------------------------------------
        // 53a - $event = WebEvent::with('account')->where('occurred_at',WebEvent::max('occurred_at'))->get();
        // return $event->map(function($event){
        //     return [
        //     'Channel'                       =>$event->channel,
        //     'Occurred_at'                   =>$event->occurred_at,
        //     'Account'                       =>$event->account->name
        //     ]; 
        // });
        //-------------------------------------------------------------------
        // 53b - $event = WebEvent::with('account')->orderBy('occurred_at','desc')->first();
        // return response()->json([
        //     'Channel'                       =>$event->channel,
        //     'Occurred_at'                   =>$event->occurred_at,
        //     'Account'                       =>$event->account->name
        // ]);
        //-------------------------------------------------------------------
        // 53c - $events = WebEvent::with('account')->orderBy('occurred_at')->get();
        // $event = $events->last();
        // return response()->json([
        //     'Channel'                       =>$event->channel,
        //     'Occurred_at'                   =>$event->occurred_at,
        //     'Account'                       =>$event->account->name
        // ]);
        //-------------------------------------------------------------------
        // 54a - $event = WebEvent::all();
        // $event = $event->groupBy('channel')->map(function($event , $channel){
        //     return [
        //         'channel'               =>$channel,
        //         'Count'                 =>$event->count()
        //     ];
        // })->values();
        // return $event;
        //-------------------------------------------------------------------
        // 54b - $events_count = WebEvent::select('channel')
        // ->selectRaw('count(*) as count')->groupBy('channel')->get();
        // return $events_count;
        //-------------------------------------------------------------------
        // 55a - $query = WebEvent::with('account')->orderBy('occurred_at')->first();
        // return $query->account->primary_poc;
        //-------------------------------------------------------------------
        // 55b - $query = WebEvent::with('account')->where('occurred_at',WebEvent::min('occurred_at'))->get();
        // return $query[0]->account->primary_poc;
        //-------------------------------------------------------------------
        // 56a -  $query = Order::with('account')->get();
        // $query = $query->groupBy(function($query){
        //     return $query->account->name;
        // })->values();
        // $query = $query->map(function($query){
        //     return [
        //         'account'               =>$query[0]->account->name,
        //         'least_order'           =>$query->min('totalUSD')
        //     ];
        // });
        // return $query->sortBy('least_order')->values();
        //-------------------------------------------------------------------
        // 56b - $query = Order::join('accounts as a','a.id','=','orders.account_id')
        // ->select('a.name')
        // ->selectRaw('min(orders.standard_amt_usd + orders.gloss_amt_usd + orders.poster_amt_usd) as minimum_usd')
        // ->groupBy('a.name')
        // ->orderBy('minimum_usd')->get();
        // return $query;
        //-------------------------------------------------------------------
        // 57a - $regions = Region::with('salesReps')->get();
        // $regions = $regions->groupBy('name')->map(function($regions , $region){
        //     return [
        //         'region_name'           =>$region,
        //         'rep_count'             =>$regions[0]->salesReps->count()
        //     ];
        // });
        // return $regions->sortBy('rep_count')->values();
        //-------------------------------------------------------------------
        // 57b - $region = Region::join('sales_reps as s','region.id','=','s.region_id')
        // ->select('region.name')
        // ->selectRaw('count(s.id) as count')
        // ->groupBy('region.name')
        // ->orderBy('count')
        // ->get();
        // return $region;
        //-------------------------------------------------------------------
        // 58a - $accounts = Account::with('orders')->get();
        // $accounts = $accounts->groupBy(function($accounts){
        //     return $accounts->name;
        // })
        // ->map(function($accounts , $name){
        //     return [
        //         'account_name'                  =>$name,
        //         'poster_avg'                    =>$accounts[0]->orders->avg('poster_qty'),
        //         'gloss_avg'                    =>$accounts[0]->orders->avg('gloss_qty'),
        //         'standard_avg'                    =>$accounts[0]->orders->avg('standard_qty'),
        //     ];
        // });
        // return $accounts;
        //---------------------------------------------------------------------
        // 58b - $accounts = Account::join('orders as o','o.account_id','=','accounts.id')
        // ->groupBy('accounts.name')
        // ->select('accounts.name')
        // ->selectRaw('avg (o.standard_qty) as standard_avg')
        // ->selectRaw('avg (o.poster_qty) as poster_avg')
        // ->selectRaw('avg (o.gloss_qty) as gloss_avg')->get();
        // return $accounts;
        //---------------------------------------------------------------------
        // 59a - $accounts = Account::with('orders')->get();
        // $accounts = $accounts->groupBy(function($accounts){
        //     return $accounts->name;
        // })
        // ->map(function($accounts , $name){
        //     return [
        //         'account_name'                  =>$name,
        //         'poster_avg'                    =>$accounts[0]->orders->avg('poster_amt_usd'),
        //         'gloss_avg'                    =>$accounts[0]->orders->avg('gloss_amt_usd'),
        //         'standard_avg'                    =>$accounts[0]->orders->avg('standard_amt_usd'),
        //     ];
        // });
        // return $accounts;
        //---------------------------------------------------------------------
        // 59b - $accounts = Account::join('orders as o','o.account_id','=','accounts.id')
        // ->groupBy('accounts.name')
        // ->select('accounts.name')
        // ->selectRaw('avg (o.standard_qty) as standard_avg')
        // ->selectRaw('avg (o.poster_qty) as poster_avg')
        // ->selectRaw('avg (o.gloss_qty) as gloss_avg')->get();
        // return $accounts;
        //---------------------------------------------------------------------
        // 60a - $events = WebEvent::with('account.salesRep')->get();
        // $events = $events->groupBy(function($events){
        //     return $events->channel .'|'. $events->account->name;
        // });
        // $events = $events->map(function($events,$name){
        //     [$channel,$account] = explode('|',$name);
        //     $count = $events->count();
        //     return compact('channel','account','count');
        // })->values();
        // return $events->sortBy('count',SORT_NUMERIC,true)->values();
        //------------------------------------------------------------------------
        // 60b - $events = WebEvent::join('accounts as a','a.id','=','web_events.account_id')
        // ->join('sales_reps as s','a.sales_rep_id','=','s.id')
        // ->groupBy('web_events.channel')
        // ->groupBy('a.name')
        // ->select('web_events.channel','a.name')
        // ->selectRaw('count(web_events.id) as count')
        // ->orderBy('count','desc')
        // ->get();
        // return $events;
        //------------------------------------------------------------------------
        // 61a - $webEvents = WebEvent::with(['account.salesRep'])->get();
        // // Map the necessary fields into a new collection
        // $uniqueWebEvents = $webEvents->map(function($webEvent) {
        //     return [
        //         'name' => $webEvent->account->salesRep->name,
        //         'channel' => $webEvent->channel,
        //     ];
        // })->unique(function ($item) {
        //     return $item['name'] . '|' . $item['channel'];
        // });
        // return $uniqueWebEvents->values();
        //----------------------------------------------------------------------------
        // 61b - $webEvents = WebEvent::join('accounts as a','web_events.account_id','=','a.id')
        // ->join('sales_reps as s','s.id','=','a.sales_rep_id')
        // ->select('web_events.channel','s.name')
        // ->distinct()
        // ->get();
        // return $webEvents;
        //-----------------------------------------------------------------------
        // 62 - $sales_reps = SalesRep::with('accounts')->get();
        // $more_than_account = $sales_reps->filter(function($sales_reps){
        //     return $sales_reps->accounts->count() > 1 ;
        // })->count();
        // $all = $sales_reps->count();
        // return response()->json([
        //     'all_accounts'                  =>$all,
        //     'one_or_less'                   =>$all - $more_than_account,
        //     'more_than_one'                 =>$more_than_account
        // ]);
        //-----------------------------------------------------------------------
        // 62b - $query = SalesRep::join('accounts as a','a.sales_rep_id','=','sales_reps.id')
        // ->groupBy('sales_reps.name')
        // ->select('sales_reps.name')
        // ->selectRaw('count(a.id) as count')
        // ->having('count','>',1)
        // ->get();
        // return $query->count();
        //-----------------------------------------------------------------------
        // 63a - $query = SalesRep::join('accounts as a','a.sales_rep_id','=','sales_reps.id')
        // ->groupBy('sales_reps.name')
        // ->select('sales_reps.name')
        // ->selectRaw('count(a.id) as count')
        // ->having('count','>',5)
        // ->get();
        // return $query->count();
        //-----------------------------------------------------------------------
        // 63b - $sales_reps = SalesRep::with('accounts')->get();
        // $sales_reps = $sales_reps->groupBy('name')->map(function($sales_reps,$name){
        //     return [
        //         'name'                          =>$name,
        //         'count_of_accounts'             =>$sales_reps->first()->accounts->count()
        //     ];
        // })->values()
        // ->filter(function($sales_reps){
        //     return $sales_reps['count_of_accounts'] > 5;
        // });
        // return $sales_reps->count();
        //-----------------------------------------------------------------------
        //64a - $accounts = Account::join('orders as o','o.account_id','=','accounts.id')
        // ->select('accounts.name')
        // ->selectRaw('count(o.id) as orders_num')
        // ->groupBy('accounts.name')
        // ->having('orders_num','>',20)
        // ->get()->count();
        // return $accounts;
        //-----------------------------------------------------------------------
        //64b - $accounts = Account::with('orders')->get();
        // $accounts = $accounts->groupBy('name')
        // ->map(function($accounts , $name){
        //     return [
        //         'account'               =>$name,
        //         'orders_num'            =>$accounts->first()->orders->count()
        //     ];
        // })->values()
        // ->filter(function($accounts){
        //     return $accounts['orders_num'] > 20;
        // })->values()->count();
        // return $accounts;
        //-----------------------------------------------------------------------
        // 65a - $query = Account::join('orders as o','o.account_id','=','accounts.id')
        // ->select('accounts.name')
        // ->selectRaw('count(o.id) as count')
        // ->groupBy('accounts.name')
        // ->orderBy('count','desc')
        // ->limit(1)
        // ->get();
        // return $query->first()->name;
        //-----------------------------------------------------------------------
        // 65b -$query = Account::with('orders')->get();
        // $query = $query->groupBy('name')->map(function($query , $name){
        //     return [
        //         'name'                  =>$name,
        //         'orders_count'          =>$query->first()->orders->count()
        //     ];
        // });
        // $max =  $query->max(function($query){
        //     return $query['orders_count'];
        // });
        // return $query->filter(function($query) use($max){
        //     return $query['orders_count'] == $max;
        // })->first()['name'];
        //-----------------------------------------------------------------------
        // 66a - $query = Account::join('orders as o','o.account_id','=','accounts.id')
        // ->select('accounts.name as acc_name')
        // ->selectRaw('sum(o.standard_amt_usd + o.poster_amt_usd + o.gloss_amt_usd) as sum')
        // ->groupBy('acc_name')
        // ->having('sum','>','30000')
        // ->get()
        // ->count();
        // return $query;
        //-----------------------------------------------------------------------
        // 66b - $accounts = Account::with('orders')->get();
        // $accounts = $accounts->groupBy(function($accounts){
        //     return $accounts->name;
        // })->map(function($accounts , $accountName){
        //     return [
        //         'account_name'              =>$accountName,
        //         'sum'                       =>$accounts->first()->orders->sum('totalUSD')
        //     ];
        // })->filter(function($accounts){
        //     return $accounts['sum'] > 30000;
        // })->count();
        // return $accounts;
        //-----------------------------------------------------------------------
        // 67a - $query = Account::join('orders as o','o.account_id','=','accounts.id')
        // ->select('accounts.name as acc_name')
        // ->selectRaw('sum(o.standard_amt_usd + o.poster_amt_usd + o.gloss_amt_usd) as sum')
        // ->groupBy('acc_name')
        // ->having('sum','<','1000')
        // ->get()
        // ->count();
        // return $query;
        //-----------------------------------------------------------------------
        // 67b - $accounts = Account::with('orders')->get();
        // $accounts = $accounts->groupBy(function($accounts){
        //     return $accounts->name;
        // })->map(function($accounts , $accountName){
        //     return [
        //         'account_name'              =>$accountName,
        //         'sum'                       =>$accounts->first()->orders->sum('totalUSD')
        //     ];
        // })->filter(function($accounts){
        //     return $accounts['sum'] < 1000;
        // })->count();
        // return $accounts;
        //-----------------------------------------------------------------------
        // 68a - $query = Order::join('accounts as a','a.id','=','orders.account_id')
        // ->select('a.name')
        // ->selectRaw('sum(orders.standard_amt_usd + orders.poster_amt_usd + orders.gloss_amt_usd) as sum')
        // ->groupBy('a.name')
        // ->orderBy('sum')
        // ->limit(1)
        // ->get();
        // return $query->first()->name;
        //-----------------------------------------------------------------------
        // 68b - $query = Order::with('account')->get();
        // $query = $query->groupBy(function($query){
        //     return $query->account->name;
        // })->map(function($query , $accountName){
        //     return [
        //         'acc'               =>$accountName,
        //         'sum'               =>$query->sum('totalUSD')
        //     ];
        // });
        // $min = $query->min('sum');
        // return $query->filter(function($query) use ($min){
        //     return $query['sum'] == $min;
        // })->first(function($query){
        //     return $query['acc'];
        // });
        //-----------------------------------------------------------------------
        // 69a - $query = Account::join('web_events as w','w.account_id','=','accounts.id')
        // ->select('accounts.name')
        // ->selectRaw('count(w.id) as events_count')
        // ->groupBy('accounts.name')
        // ->where('w.channel','facebook')
        // ->having('events_count','>',6)
        // ->get();
        // return $query;
        //-----------------------------------------------------------------------
        // 69b - $query = Account::with('webEvents')->get();
        // $accounts = collect();
        // foreach($query as $account){
        //     foreach($account->webEvents as $webEvent){
        //         $section = [
        //             'account_name'              =>$account->name,
        //             'channel'                   =>$webEvent->channel
        //         ];
        //         $accounts = $accounts->push($section);
        //     }
        // }
        // $accounts = $accounts->filter(function($accounts){
        //     return $accounts['channel'] == 'facebook';
        // })
        // ->groupBy('account_name')
        // ->map(function($accounts , $accountName){
        //     return [
        //         'account'           =>$accountName,
        //         'count'             =>$accounts->count()
        //     ];
        // })
        // ->filter(function($accounts){
        //     return $accounts['count'] > 6;
        // });
        // return $accounts;
        //-----------------------------------------------------------------------
        // 70 - $account = Account::join('web_events as w','w.account_id','=','accounts.id')
        // ->groupBy('accounts.name')
        // ->select('accounts.name')
        // ->selectRaw('count(w.id) as count')
        // ->where('w.channel','facebook')
        // ->orderBy('count','desc')
        // ->limit(1)
        // ->get();
        // return $account->first()->name;
        //-----------------------------------------------------------------------
        // 71a - $years = Order::get();
        // $years = $years->groupBy(function($years){
        //     return Carbon::parse($years->occurred_at)->year;
        // })
        // ->map(function($years , $year){
        //     return [
        //         'year'          =>$year,
        //         'sum_of_year'   =>$years->sum('totalUSD')
        //     ];
        // })->values()
        // ->sortBy('year')->values();
        // return $years;
        //-----------------------------------------------------------------------
        // 71b - $years = Order::selectRaw('sum(standard_amt_usd+gloss_amt_usd+poster_amt_usd) as sum')
        // ->selectRaw('year(occurred_at) as year')
        // ->groupBy('year')
        // ->orderBy('year')
        // ->get();
        // return $years->select('year','sum');
        //-----------------------------------------------------------------------
        // 72a - $months = Order::get();
        // $months = $months->filter(function($months){
        //     return Carbon::parse($months->occurred_at)->year != 2013 && Carbon::parse($months->occurred_at)->year != 2017;
        // })
        // ->groupBy(function($months){
        //     return Carbon::parse($months->occurred_at)->month;
        // })
        // ->map(function($months , $month){
        //     return [
        //         'month'                 =>$month,
        //         'sum_of_month'          =>$months->sum('totalUSD')
        //     ];
        // })->sortBy('month',SORT_REGULAR,true)->values()->first();
        // return $months;
        //-----------------------------------------------------------------------
        // 72b - $months =  Order::selectRaw('month(occurred_at) as month')
        // ->selectRaw('sum(standard_amt_usd+gloss_amt_usd+poster_amt_usd) as sum')
        // ->whereBetween('occurred_at',['2014-01-01 00:00:00','2017-01-01 00:00:00'])
        // ->groupBy('month')
        // ->orderBy('sum','desc')
        // ->limit(1)
        // ->get();
        // return $months;
        //-----------------------------------------------------------------------
        
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

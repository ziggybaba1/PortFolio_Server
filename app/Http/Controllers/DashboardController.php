<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Payment;
use \App\Models\Customer;
use \App\Models\Traffic;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(){
    //     $saleToday=Payment::whereDate('created_at',date(""))->sum('amount');
    //     $sale48days=date('Y-m-d', strtotime('-48 day', strtotime(date("r"))));
    //     $sale28days=date('Y-m-d', strtotime('-28 day', strtotime(date("r"))));
    //     $saleNow=date('Y-m-d');
    //     $salelastMonth=Payment::whereBetween('created_at',[$sale48days,$sale28days])->sum('amount');
    //     $saleMonth=Payment::whereBetween('created_at',[$sale28days,$saleNow])->sum('amount');
    //     $salelastMonthCount=Payment::whereBetween('created_at',[$sale48days,$sale28days])->count();
    //     $saleMonthCount=Payment::whereBetween('created_at',[$sale28days,$saleNow])->count();
    //     $saleMonthPercent= $saleMonthCount!=0?(($saleMonthCount-$salelastMonthCount)/$saleMonthCount)*100:0;
    //     $saleYesterday=Payment::whereDate('created_at',date('Y-m-d', strtotime('-1 day', strtotime(date("r")))))->sum('amount');
    //     $percentMonth=$saleMonth!=0?(($saleMonth-$salelastMonth)/$saleMonth)*100:0;
    //     $percentDay=$saleToday!=0?(($saleToday-$saleYesterday)/$saleToday)*100:0;
    //    $customerMonthCount=Customer::whereBetween('created_at',[$sale28days,$saleNow])->count();
    //    $customerUpperMonthCount=Customer::whereBetween('created_at',[$sale48days,$sale28days])->count();
    //    $percentCustomer=$customerMonthCount!=0?(($customerMonthCount-$customerUpperMonthCount)/$customerMonthCount)*100:0;
    //    $customerMonth=Customer::whereBetween('created_at',[$sale28days,$saleNow])->latest()->get()->take(10);
    //    $saleList=Payment::whereBetween('created_at',[$sale28days,$saleNow])->latest()->get()->take(20);
      
    //    $dateMap=[];$salesMap=[];$revenueMap=[];$customerMap=[];
    //    for ($i=0; $i < 7; $i++) { 
    //        $datep=date('Y-m-d', strtotime("-".$i." day", strtotime(date("r"))));
    //     array_push($dateMap,$datep);
    //     array_push($salesMap,Payment::whereDate('created_at',$datep)->count());
    //     array_push($revenueMap,Payment::whereDate('created_at',$datep)->sum('amount'));
    //     array_push($customerMap,Customer::whereDate('created_at',$datep)->count());
    //    }
        return view("dashboard",
        // [
        //     'saleMonth'=>$saleMonth,
        //     'percentMonth'=>$percentMonth,
        //     'countMonth'=>$saleMonthCount,
        //     'countMonthPercent'=>$saleMonthPercent,
        //     "customerCount"=>$customerMonthCount,
        //     "customerCountPercent"=>$percentCustomer,
        //     "latestCustomer"=>$customerMonth,
        //     "saleList"=>$saleList,
        //     'dateMap'=>$dateMap,
        //     "salesMap"=>$salesMap,
        //     "revenueMap"=>$revenueMap,
        //     "customerMap"=>$customerMap
        // ]
    );
    }
}

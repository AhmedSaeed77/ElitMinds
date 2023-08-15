<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class InvoiceController extends Controller
{

    public function myInvoices_view()
    {
        $packages = \App\UserPackages::where('user_id',Auth::user()->id)->get();
        $payments = DB::table('payments')
                    ->where('complete',1)
                    ->leftJoin('payment_approves','payment_approves.payment_id','payments.id')
                    ->leftJoin('packages','packages.id','payment_approves.package_id')
                    ->leftJoin('users','users.id','payments.user_id')
                    ->select([
                        'payments.*',
                        'packages.id as package_id',
                        'packages.name as package_name',
                        'users.name as user_name',
                        'users.email as user_email'
                        ])->first();
                        
        return view('user.myInvoices',['packages'=>$packages,'payments'=>$payments]);
    }

    public function print($id)
    {
        $id = $id;
        $currentDateTime = Carbon::now();
        $currentDateTime->toDateTimeString();
        $newdate = $currentDateTime->format('Y-m-d h:i A');
        $packages = \App\UserPackages::where('user_id',Auth::user()->id)->get();
        $package = \App\Packages::where('id',$id)->first();
        
       
        $payments = DB::table('payment_approve_histories')
            ->join('payments', 'payment_approve_histories.payment_id', '=', 'payments.id')
            ->join('users', 'payment_approve_histories.user_id', '=', 'users.id')
            ->join('packages', 'payment_approve_histories.package_id', '=', 'packages.id')
            ->select('payment_approve_histories.id', 'payment_approve_histories.user_id', 'payment_approve_histories.package_id',
             'payment_approve_histories.payment_id', 'payments.*', 'users.id', 'users.name', 'users.email', 'packages.id', 'packages.name as packagename' , 
             'packages.original_price', 'packages.img')
            ->where('payment_approve_histories.user_id', Auth()->user()->id)->where('payments.complete', 1)->where('payment_approve_histories.package_id', $id)->first();
        return view('user.printinvoice' , ['id'=>$id,'payments'=>$payments,'package'=>$package,'newdate'=>$newdate]);
        
    }

}

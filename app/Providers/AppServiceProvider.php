<?php

namespace App\Providers;

use App\admin\BoAmount;
use App\admin\ShareRequest;
use App\admin\Transaction;

use App\admin\Withdraw;
use App\IpoRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;
use Auth;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(150);

            view()->composer('frontEnd.includes.balance-info', function ($view) {
                if((Auth::check())) {
                    $ledger_balance = Transaction::select(DB::raw('sum(debit - credit) as total'))->where('client_id', Auth::user()->id)->get();

                    $withdraw_pending =  Withdraw::where('client_id', Auth::user()->id)->where('status', 0)->sum('amount');
                    $share_request_pending = ShareRequest::where('client_id', Auth::user()->id)->where('status', 0)->sum('total_price_with_commission');
                    $ipo_request_pending = IpoRequest::where('client_id', Auth::user()->id)->where('status', 0)->sum('total_price');

                    $bo_amount = BoAmount::where('id', 1)->first();
                    $ledger_balance = $ledger_balance[0]['total'];
                    $mature_balance = $ledger_balance - $withdraw_pending;
                    $mature_balance -= $share_request_pending;
                    $mature_balance -= $ipo_request_pending;
                    $min_balance = $bo_amount->min_balance;
                }else{
                    $ledger_balance = 0;
                    $mature_balance = 0;
                    $min_balance = 0;
                }
                $view->with('ledger_balance',  $ledger_balance);
                $view->with('mature_balance',  $mature_balance);
                $view->with('min_balance',  $min_balance);
            });
        }


}

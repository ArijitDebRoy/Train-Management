<?php

namespace App\Http\Controllers\Auth;
use App\Train_details;
use App\Master_station_entry;
use App\Master_train_class;
use App\Master_train_type;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */




    protected $redirectTo = '/dashboard';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

        $count_station= Master_station_entry::all();
        $countS= count($count_station);

        $count_class= Master_train_class::all();
        $countC= count($count_class);

        $count_type= Master_train_type::all();
        $countY= count($count_type);

        $count_train= Train_details::all();
        $countT= count($count_train);

        session(['Scount' => $countS, 'Ccount' => $countC, 'Ycount' => $countY, 'Tcount'=> $countT]);
    }
}

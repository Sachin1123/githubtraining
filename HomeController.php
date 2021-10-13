<?php

namespace App\Http\Controllers;
use App\Http\Traits\UserTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use UserTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $successStatus = 200;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

 
}

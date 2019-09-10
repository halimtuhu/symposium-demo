<?php

namespace App\Http\Controllers;

use App\Services\Ipaymu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pay()
    {
        $ipaymu = new Ipaymu([
            'product' => request('ticket') . ' Ticket',
            'price' => request('price'),
            'quantity' => 1,
            'comments' => null
        ]);

        $url = $ipaymu->make();
        return redirect($url);
    }
}

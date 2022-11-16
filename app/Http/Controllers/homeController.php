<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB; 

class homeController extends Controller
{
    public function index(Request $request)
    {
        $events=DB::table('events')
                ->where('username',session('username'))
                ->get();
        return view('home.index')->with('events',$events);
        
    }
    
}

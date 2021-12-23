<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ride;
class RideController extends Controller
{
    //
    public function getRides(){
        $rides = Ride::all();
        return $rides;
    }
}

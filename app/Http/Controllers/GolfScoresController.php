<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\Golfer;

class GolfScoresController extends Controller
{



    public function index(){

        $golfers = Golfer::all();

        $active_golfers = Golfer::where('active', 1)->get();
        // dd($golfers);

        return view("golf-scores", [
            "golfers"=>$golfers,
            "active_golfers"=>$active_golfers,
        ]);
    }



    public function edit(Golfer $golfer){

        return view("golf-edit", [
            "golfer"=>$golfer,
        ]);

    }


    public function update(Golfer $golfer) {

        request()->validate([
            'id'=>['required'],
            'golfer_name'=>['required'],
            'r1'=>['required'],
            'r2'=>['required'],
            'r3'=>['required'],
            'r4'=>['required'],
            'round_status'=>['required'],
            'golfer_status'=>['required'],
            'active'=>['required'],
        ]);

        $golfer->update([
            'id'=>request('id'),
            'golfer_name'=>request('golfer_name'),
            'r1'=>request('r1'),
            'r2'=>request('r2'),
            'r3'=>request('r3'),
            'r4'=>request('r4'),
            'round_status'=>request('round_status'),
            'golfer_status'=>request('golfer_status'),
            'active'=>request('active'),
        ]);



        return redirect("/golf-scores");
    }
}

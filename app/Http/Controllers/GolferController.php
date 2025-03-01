<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\Golfer;



class GolferController extends Controller
{
    public function index() {
        $today = Carbon::now()->format('m/d/Y');


        return view('golf-dashboard', [
            'today'=>$today
        ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'golferList' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!str_starts_with(trim($value), '12345')) {
                        $fail('The golfer list is invalid');
                    }
                },
            ],
        ]);

        // Remove the '12345' prefix and split the string
        $golferList = preg_replace('/^12345,?\s*/', '', $request->golferList);
        $golferNames = explode(', ', $golferList);

        foreach ($golferNames as $name) {
            $name = trim($name);
            // Remove single quotes from the name
            $name = str_replace("'", "", $name);

            if (!empty($name)) {
                Golfer::create([
                    'golfer_name' => $name,
                    'r1' => 0,
                    'r2' => 0,
                    'r3' => 0,
                    'r4' => 0,
                    'round_status' => '0',
                    'golfer_status' => 0,
                    'active' => 0,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Golfers added successfully.');
    }
}




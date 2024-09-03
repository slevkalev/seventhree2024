<?php

namespace App\Helper;

use DateTime;

class Helper
{
    public static function get_week_id($date, $weeks)
    {
        $date_obj = DateTime::createFromFormat('m/d/Y', $date);

        if (!$date_obj) {
            return null; // Invalid date format
        }

        $date_obj->setTime(0, 0, 0);

        foreach ($weeks as $week) {
            $start_obj = DateTime::createFromFormat('m/d/Y', $week['start']);
            $end_obj = DateTime::createFromFormat('m/d/Y', $week['end']);

            if (!$start_obj || !$end_obj) {
                continue; // Skip invalid week data
            }

            $start_obj->setTime(0, 0, 0);
            $end_obj->setTime(23, 59, 59); // Set end time to end of day

            if ($date_obj >= $start_obj && $date_obj <= $end_obj) {
                return $week['weekId'];
            }
        }

        return null; // Date not found in any week
    }

    public static function schedule(){

        return [
            ['weekId'=> 1, 'start'=> '8/3/2024', 'end'=>'9/9/2024', 'nog'=>16],
            ['weekId'=> 2, 'start'=> '9/10/2024', 'end'=>'9/16/2024', 'nog'=>16],
            ['weekId'=> 3, 'start'=> '9/17/2024', 'end'=>'9/30/2024', 'nog'=>16],
            ['weekId'=> 4, 'start'=> '10/1/2024', 'end'=>'10/7/2024', 'nog'=>16],
            ['weekId'=> 5, 'start'=> '10/8/2024', 'end'=>'10/14/2024', 'nog'=>14],
            ['weekId'=> 6, 'start'=> '10/15/2024', 'end'=>'10/21/2024', 'nog'=>14],
            ['weekId'=> 7, 'start'=> '10/22/2024', 'end'=>'10/28/2024', 'nog'=>15],
            ['weekId'=> 8, 'start'=> '10/29/2024', 'end'=>'11/4/2024', 'nog'=>16],
            ['weekId'=> 9, 'start'=> '11/5/2024', 'end'=>'11/11/2024', 'nog'=>15],
            ['weekId'=> 10, 'start'=> '11/12/2024', 'end'=>'11/18/2024', 'nog'=>14],
            ['weekId'=> 11, 'start'=> '11/19/2024', 'end'=>'11/25/2024', 'nog'=>14],
            ['weekId'=> 12, 'start'=> '11/26/2024', 'end'=>'12/2/2024', 'nog'=>13],
            ['weekId'=> 13, 'start'=> '12/3/2024', 'end'=>'12/9/2024', 'nog'=>16],
            ['weekId'=> 14, 'start'=> '12/10/2024', 'end'=>'12/16/2024', 'nog'=>13],
            ['weekId'=> 15, 'start'=> '12/17/2024', 'end'=>'12/23/2024', 'nog'=>16],
            ['weekId'=> 16, 'start'=> '12/24/2024', 'end'=>'12/30/2024', 'nog'=>16],
            ['weekId'=> 17, 'start'=> '12/31/2024', 'end'=>'1/6/2025', 'nog'=>16],
            ['weekId'=> 18, 'start'=> '1/7/2025', 'end'=>'1/13/2025', 'nog'=>16]
        ];
    }

    public static function getMaxPointsInWeek($number) {

            // Validate input
            if (!is_int($number) || $number < 1) {
                return "Please provide a positive integer.";
            }

            // Create an array of numbers from 1 to the given number
            $numbersArray = range(1, $number);

            // Calculate the sum of the array values
            $sum = array_sum($numbersArray);

            return $sum;
        }

}

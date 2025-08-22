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
            ['weekId'=> 1, 'start'=> '9/4/2025', 'end'=>'9/8/2025', 'nog'=>16],
            ['weekId'=> 2, 'start'=> '9/9/2025', 'end'=>'9/15/2025', 'nog'=>16],
            ['weekId'=> 3, 'start'=> '9/16/2025', 'end'=>'9/22/2025', 'nog'=>16],
            ['weekId'=> 4, 'start'=> '9/23/2025', 'end'=>'9/29/2025', 'nog'=>16],
            ['weekId'=> 5, 'start'=> '10/1/2025', 'end'=>'10/7/2025', 'nog'=>14],
            ['weekId'=> 6, 'start'=> '10/8/2025', 'end'=>'10/14/2025', 'nog'=>15],
            ['weekId'=> 7, 'start'=> '10/15/2025', 'end'=>'10/21/2025', 'nog'=>15],
            ['weekId'=> 8, 'start'=> '10/22/2025', 'end'=>'10/28/2025', 'nog'=>13],
            ['weekId'=> 9, 'start'=> '10/29/2025', 'end'=>'11/4/2025', 'nog'=>14],
            ['weekId'=> 10, 'start'=> '11/5/2025', 'end'=>'11/11/2025', 'nog'=>14],
            ['weekId'=> 11, 'start'=> '11/12/2025', 'end'=>'11/18/2025', 'nog'=>15],
            ['weekId'=> 12, 'start'=> '11/19/2025', 'end'=>'11/25/2025', 'nog'=>13],
            ['weekId'=> 13, 'start'=> '11/26/2025', 'end'=>'12/2/2025', 'nog'=>16],
            ['weekId'=> 14, 'start'=> '12/3/2025', 'end'=>'12/9/2025', 'nog'=>14],
            ['weekId'=> 15, 'start'=> '12/10/2025', 'end'=>'12/16/2025', 'nog'=>16],
            ['weekId'=> 16, 'start'=> '12/17/2025', 'end'=>'12/22/2025', 'nog'=>16],
            ['weekId'=> 17, 'start'=> '12/23/2025', 'end'=>'12/30/2025', 'nog'=>16],
            ['weekId'=> 18, 'start'=> '12/31/2025', 'end'=>'1/5/2026', 'nog'=>16]
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

    public static function golfTournaments() {

        return [
            ['tournament_name'=>'The Players Championship','start'=>'3/13/2025', 'end'=>'3/16/2025','current'=>0, 'image'=>'https://res.cloudinary.com/pgatour-prod/d_tournaments:logos:R000.png/tournaments/logos/R011.png'],
            ['tournament_name'=>'The Masters','start'=>'4/10/2025', 'end'=>'4/13/2025','current'=>0, 'image'=>'https://icon2.cleanpng.com/20180510/xtq/avsyhrlrh.webp'],
            ['tournament_name'=>'The PGA Championship','start'=>'5/15/2025', 'end'=>'5/18/2025','current'=>0, 'image'=>'https://cdn.prod.website-files.com/630fbdaf6751e7b380e52e6e/672cf2ffa0c38e6abdcf8f7d_25CH_Quail_Holllow_4C.png'],
            ['tournament_name'=>'The US Open','start'=>'6/12/2025', 'end'=>'6/15/2025','current'=>0, 'image'=>'https://www.msgpromotions.com/wp-content/uploads/2024/04/2025-USO-Logo-for-MSG-Home-page.png'],
            ['tournament_name'=>'The Open','start'=>'7/17/2025', 'end'=>'7/20/2025','current'=>1, 'image'=>'https://www.theopen.com/-/media/images/logos/TheOpen_Poster.jpg'],
        ];
    }





    public static function tournamentField($filename)
    {
        $path = public_path("js/{$filename}");

        if (!file_exists($path)) {
            throw new \Exception("File not found: {$filename}");
        }

        $jsonContent = file_get_contents($path);
        $names = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON: ' . json_last_error_msg());
        }

        if (!is_array($names)) {
            throw new \Exception('JSON content is not an array');
        }

        return $names;
    }


}

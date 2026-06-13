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
                ['weekId'=> 1, 'start'=> '9/9/2026', 'end'=>'9/14/2026', 'nog'=>16],
                ['weekId'=> 2, 'start'=> '9/15/2026', 'end'=>'9/21/2026', 'nog'=>16],
                ['weekId'=> 3, 'start'=> '9/22/2026', 'end'=>'9/28/2026', 'nog'=>16],
                ['weekId'=> 4, 'start'=> '9/23/2026', 'end'=>'9/29/2026', 'nog'=>16],
                ['weekId'=> 5, 'start'=> '9/29/2026', 'end'=>'10/5/2026', 'nog'=>15],
                ['weekId'=> 6, 'start'=> '10/12/2026', 'end'=>'10/19/2026', 'nog'=>14],
                ['weekId'=> 7, 'start'=> '10/15/2026', 'end'=>'10/21/2026', 'nog'=>14],
                ['weekId'=> 8, 'start'=> '10/20/2026', 'end'=>'10/26/2026', 'nog'=>14],
                ['weekId'=> 9, 'start'=> '10/27/2026', 'end'=>'11/2/2026', 'nog'=>15],
                ['weekId'=> 10, 'start'=> '11/3/2026', 'end'=>'11/9/2026', 'nog'=>14],
                ['weekId'=> 11, 'start'=> '11/10/2026', 'end'=>'11/16/2026', 'nog'=>13],
                ['weekId'=> 12, 'start'=> '11/17/2026', 'end'=>'11/23/2026', 'nog'=>16],
                ['weekId'=> 13, 'start'=> '11/24/2026', 'end'=>'11/30/2026', 'nog'=>14],
                ['weekId'=> 14, 'start'=> '12/1/2026', 'end'=>'12/14/2026', 'nog'=>15],
                ['weekId'=> 15, 'start'=> '12/15/2026', 'end'=>'12/21/2026', 'nog'=>16],
                ['weekId'=> 16, 'start'=> '12/22/2026', 'end'=>'12/28/2026', 'nog'=>16],
                ['weekId'=> 17, 'start'=> '12/29/2026', 'end'=>'1/4/2027', 'nog'=>16],
                ['weekId'=> 18, 'start'=> '1/11/2027', 'end'=>'1/18/2027', 'nog'=>16]
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

        $tournaments =[
            ['tournament_name'=>'The Players Championship','start'=>'3/12/2026', 'end'=>'3/15/2026','current'=>0, 'image'=>'https://res.cloudinary.com/pgatour-prod/d_tournaments:logos:R000.png/tournaments/logos/R011.png'],
            ['tournament_name'=>'The Masters','start'=>'4/9/2026', 'end'=>'4/12/2026','current'=>0, 'image'=>'https://upload.wikimedia.org/wikipedia/en/2/23/Masters_Logo.png?_=20250526010410'],
            ['tournament_name'=>'The PGA Championship','start'=>'5/14/2026', 'end'=>'5/17/2026','current'=>0, 'image'=>'./images/26CH_ARON_4C.png'],
            ['tournament_name'=>'The US Open','start'=>'6/18/2026', 'end'=>'6/21/2026','current'=>1, 'image'=>'./images/usopen2026.png'],
            ['tournament_name'=>'The Open','start'=>'7/16/2026', 'end'=>'7/19/2026','current'=>0, 'image'=>'https://www.theopen.com/-/media/images/logos/TheOpen_Poster.jpg'],
        ];


        //'https://icon2.cleanpng.com/20180510/xtq/avsyhrlrh.webp'

        // Find the active tournament
        $active = array_filter($tournaments, fn($t) => $t['current'] === 1);

        // Return the first (and only) active tournament
        return reset($active);
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

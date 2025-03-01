<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golfer extends Model
{
    use HasFactory;

     // Specify the table if it's not the plural form of the model name
     protected $table = 'golfers';

     // Specify which attributes can be mass assignable
     protected $fillable = [
         'golfer_name',
         'r1',
         'r2',
         'r3',
         'r4',
         'round_status',
         'active',
         'golfer_status',
     ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

     // Specify the table if it's not the plural form of the model name
     protected $table = 'players';

     // Specify which attributes can be mass assignable
     protected $fillable = [
        'player_name',
        'email',
        'phone',
        'selection1',
        'selection2',
        'selection3',
        'selection4',
        'selection5',
        'selection6',
     ];
}

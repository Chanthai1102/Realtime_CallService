<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'nametable',
        'bookingdate',
    ];
}

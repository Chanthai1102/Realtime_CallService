<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Accept_Nofitication extends Model
{
    use HasFactory;
    protected $table = 'appecpt__notification';

    protected $fillable = [
        'nametable',
        'bookingdate',
    ];
}

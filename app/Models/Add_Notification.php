<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_notification extends Model
{
    use HasFactory;


    protected $table = 'add__notification';

    protected $fillable = [
        'nametable',
        'bookingdate',
    ];
}

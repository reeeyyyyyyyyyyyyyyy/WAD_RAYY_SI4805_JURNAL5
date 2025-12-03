<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    use HasFactory;
    /**
     * ============1================
     * Define the table name and its attributes/columns
     * the attributes are title, director, year
     */
    protected $table = 'dvds';
    protected $fillable = [

    ];
}

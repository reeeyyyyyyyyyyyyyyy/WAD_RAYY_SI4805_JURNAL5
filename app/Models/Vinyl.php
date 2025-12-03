<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    use HasFactory;

    /**
     * ============1================
     * Define the table name and its attributes/columns
     * the attributes are title, artist, year
     */
    protected $table = 'vinyls';
    protected $fillable = [

    ];
}

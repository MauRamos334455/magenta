<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = "venue";
    protected $fillable = [
        'venue_id',
        'name',
        'capacity',
        'location'
    ];

    protected $primaryKey = "venue_id";
    public $timestamps = false;
}

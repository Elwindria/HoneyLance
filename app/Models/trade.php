<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trade extends Model
{
    use HasFactory;
    protected $fillable = [
        'cost', 'interval', 'date', 'type', 'percent_urssaf', 'label'
    ];
}

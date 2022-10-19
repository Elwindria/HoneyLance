<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrssafSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'percentage', 'description'
    ];

    public function setting()
    {
        return $this->belongsTo(UserSetting::class);
    }
}

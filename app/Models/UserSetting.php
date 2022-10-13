<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'salary', 'urssaf_setting_id', 'date_start'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

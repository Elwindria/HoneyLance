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
        return $this->belongsTo(User::class);
    }

    public function urssaf()
    {
        return $this->hasOne(UrssafSetting::class, 'id', 'urssaf_setting_id');
    }
}

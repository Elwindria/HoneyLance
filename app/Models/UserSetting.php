<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\UserSettingFactory;

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

    protected static function newFactory()
    {
        return UserSettingFactory::new();
    }
}

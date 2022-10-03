<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\UrssafSettingFactory;

class UrssafSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'percentage', 'description'
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UrssafSettingFactory::new();
    }
}

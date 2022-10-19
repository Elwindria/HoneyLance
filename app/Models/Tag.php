<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TagFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_tag', 'user_id',
    ];

    public function trades()
    {
        return $this->belongsToMany(Trade::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

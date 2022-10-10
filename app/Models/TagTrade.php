<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TagTradeFactory;

class TagTrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_id', 'trade_id',
    ];
    protected $table = "tag_trade";

    protected static function newFactory()
    {
        return TagTradeFactory::new();
    }

}

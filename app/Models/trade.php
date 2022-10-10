<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Database\Factories\TradeFactory;

class trade extends Model
{
    use HasFactory;
    protected $fillable = [
        'cost', 'interval', 'date', 'type', 'urssaf_percent', 'name', 'user_id'
    ];

    public function tags()
    {
        //ManytoMany relationShip (Tag + Trade) avec comme nom de table tag_trade, et deux colonnes tag_id et trade_id
        return $this->belongsToMany(Tag::class, 'tag_trade', 'tag_id', 'trade_id');
    }

    protected static function newFactory()
    {
        return TradeFactory::new();
    }
}

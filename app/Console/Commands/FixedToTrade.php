<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Trade;
use App\Models\Tag;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FixedToTrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trade:fixed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a trade out from a trade fixed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $signature = 'trade:fixed';

        $this->info('The command ' . $signature . ' starts '.Carbon::now());
        Log::info('The command ' . $signature . ' starts '.Carbon::now());

        $this->fixedToTrade();

        $this->info('The command ' . $signature . ' terminates successfully');
        Log::info('The command ' . $signature . ' terminates successfully');
    }

    private function fixedToTrade()
    {
        $trades_fixed = Trade::where('type', 'fixed')->where('date', Carbon::now()->format('Y-m-d'))->get();

        foreach ($trades_fixed as $trade_fixed) {
            {
                $trade = $this->addTrade($trade_fixed);
                $this->attachTag($trade_fixed, $trade);
                $this->changeNextFacturation($trade_fixed);
            }
        }
    }

    private function addTrade($trade_fixed)
    {
        $trade = new Trade;
        $trade->cost = $trade_fixed->cost;
        $trade->date = $trade_fixed->date;
        $trade->type = 'out';
        $trade->name = $trade_fixed->name .' '. Carbon::now()->format('d/m/Y');
        $trade->user_id = $trade_fixed->user_id;
        $trade->save();

        return $trade;
    }

    private function attachTag($trade_fixed, $trade)
    {
        $tags = $trade_fixed->tags()->pluck('id')->toArray();
        $trade->tags()->attach($tags);
    }

    private function changeNextFacturation($trade_fixed)
    {
        if($trade_fixed->interval == 30){
            $date = Carbon::create($trade_fixed->date)->addMonth()->format('Y-m-d');
        } else {
            $date = Carbon::create($trade_fixed->date)->addDays($trade_fixed->interval)->format('Y-m-d');
        }

        $trade_fixed_update = Trade::find($trade_fixed->id);
        $trade_fixed_update->date = $date;
        $trade_fixed_update->save();
    }
}

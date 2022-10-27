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
        $this->info('The command trade:fixed starts '.Carbon::now());
        Log::info('The command trade:fixed starts '.Carbon::now());

        $this->fixedToTrade();

        $this->info('The command trade:fixed terminates successfully');
        Log::info('The command trade:fixed terminates successfully');
    }

    private function fixedToTrade()
    {
        $trades_fixed = Trade::where('type', 'fixed')->where('next_facturation', Carbon::now()->format('Y-m-d'))->get();

        foreach ($trades_fixed as $trade_fixed) {
            {
                $trade = $this->addTrade($trade_fixed);
                $this->attachTag($trade);
                $this->changeNextFacturation($trade_fixed);
            }
        }
    }

    private function addTrade($trade_fixed)
    {
        $trade = new Trade;
        $trade->cost = $trade_fixed->cost;
        $trade->date = $trade_fixed->next_facturation;
        $trade->type = 'out';
        $trade->name = $trade_fixed->name .' '. Carbon::now()->format('Y-m-d');
        $trade->user_id = $trade_fixed->user_id;
        $trade->save();

        return $trade;
    }

    private function attachTag ($trade)
    {
        $user = User::where('id', $trade->user_id)->get();

        foreach ($user as $user) {
            $tag_fixed = $user->tags()->where('name_tag', 'frais-fixe')->first();
    
            if($tag_fixed == null) {
                $tag_fixed = new Tag;
                $tag_fixed->name_tag = 'frais-fixe';
                $tag_fixed->user_id = $user->id;
                $tag_fixed->save();
            }
    
            $trade->tags()->sync($tag_fixed->id);
        }
    }

    private function changeNextFacturation($trade_fixed)
    {
        if($trade_fixed->interval == 30){
            $next_facturation = Carbon::create($trade_fixed->next_facturation)->addMonth()->format('Y-m-d');
        } else {
            $next_facturation = Carbon::create($trade_fixed->next_facturation)->addDays($trade_fixed->interval)->format('Y-m-d');
        }

        $trade_fixed_update = Trade::find($trade_fixed->id);
        $trade_fixed_update->next_facturation = $next_facturation;
        $trade_fixed_update->save();
    }
}

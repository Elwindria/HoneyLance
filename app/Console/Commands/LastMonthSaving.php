<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Trade;
use App\Models\User;
use App\Models\Saving;
use App\Models\Tag;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class LastMonthSaving extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'last-month:saving';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculated saving of the last month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('The command last-month:saving starts '.Carbon::now());
        Log::info('The command last-month:saving starts '.Carbon::now());

        $this->calculatedLastMonthSaving();

        $this->info('The command last-month:saving terminates successfully');
        Log::info('The command last-month:saving terminates successfully');
    }

    private function calculatedLastMonthSaving()
    {
        $users = User::where('grade', 'user')->whereNotNull('user_setting_id')->get();

        foreach ($users as $user) {

            $positive = Trade::where('user_id', $user->id)->where('type', 'in')->whereMonth('date', Carbon::now()->subMonth()->month)->sum('cost');
            $negative = Trade::where('user_id', $user->id)->where('type', 'out')->whereMonth('date', Carbon::now()->subMonth()->month)->sum('cost');
            $recipe = $positive - $negative;

            $cost_urssaf = 0;
    
            $salary = $user->setting->salary;

            $old_saving = Saving::where('user_id', $user->id)->whereMonth('date', Carbon::now()->subMonth()->month)->first();

            $trades_in = Trade::where('user_id', $user->id)->where('type', 'in')->whereMonth('date', Carbon::now()->subMonth()->month)->whereNotNull('urssaf_percent')->get();
            
            foreach ($trades_in as $trade_in) {
                $cost_urssaf += ($trade_in->cost * $trade_in->urssaf_percent)/100;
            }
        
            $new_saving = $old_saving->count + $recipe - $salary - $cost_urssaf;

            $saving = new Saving;
            $saving->user_id = $user->id;
            $saving->count = $new_saving;
            $saving->date = Carbon::now()->format('Y-m-d');
            $saving->save();
        }
    }
}

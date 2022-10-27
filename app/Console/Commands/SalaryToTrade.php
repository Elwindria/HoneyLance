<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Trade;
use App\Models\Tag;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SalaryToTrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trade:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a trade from the current salary';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('The command trade:salary starts '.Carbon::now());
        Log::info('The command trade:salary starts '.Carbon::now());

        $this->salaryToTrade();

        $this->info('The command trade:salary terminates successfully');
        Log::info('The command trade:salary terminates successfully');
    }

    private function salaryToTrade ()
    {
        $users = User::where('grade', 'user')->whereNotNull('user_setting_id')->get();

        foreach ($users as $user) {
            if ($user->setting->salary != null) {
                $trade = $this->addTrade($user);
                $this->attachTag($user, $trade);
            }
        }
    }

    private function addTrade ($user)
    {
        $trade = new Trade;
        $trade->cost = $user->setting->salary;
        $trade->date = Carbon::now();
        $trade->type = 'out';
        $trade->name = 'Salaire ' . Carbon::now()->monthName;
        $trade->user_id = $user->id;
        $trade->save();

        return $trade;
    }

    private function attachTag ($user, $trade)
    {
        dd($user);
        $tag_salary = $user->tags()->where('name_tag', 'salaire')->first();

        if($tag_salary == null) {
            $tag_salary = new Tag;
            $tag_salary->name_tag = 'salaire';
            $tag_salary->user_id = $user->id;
            $tag_salary->save();
        }

        $trade->tags()->sync($tag_salary->id);
    }
}

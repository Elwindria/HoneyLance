<?php

namespace App\Http\Livewire\App;

use App\Models\Trade;
use Livewire\Component;
use Carbon\Carbon;

class TradesList extends Component
{

    public $url;

    public function mount()
    {
        $this->url = url()->current();
        
        if (auth()->user()->user_setting_id == null) {
            $user_setting = new UserSetting;
            $save_user_setting = $user_setting->save();

            if ($save_user_setting) {
                $user = User::find(auth()->user()->id);
                $user->user_setting_id = $user_setting->id;
                $user->save();
            }

            return back();
        }

        $this->trades = Trade::where('user_id', auth()->user()->id)->whereIn('type', ['in', 'out'])->get();

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $this->recipe = $positive - $negative;
    }

    public function render()
    {
        return view('app.trades-list')->layout('layouts.app');
    }
}

<?php

namespace App\Http\Livewire\App;

use App\Models\Trade;
use App\Models\User;
use App\Models\Saving;
use App\Mail\HelloMail;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;

class Counts extends Component
{
    public $url;

    public function render()
    {
        $this->url = url()->current();

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->sum('cost');
        $recipe = $positive - $negative;

        return view('app.counts', compact('recipe'));
    }

    public function sendMail()
    {
        Mail::to('vincent@vinvui.com')->send(new HelloMail());
    }
}

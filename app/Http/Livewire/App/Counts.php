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

        $positive = Trade::where('user_id', auth()->user()->id)->where('type', 'in')->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('cost');
        $negative = Trade::where('user_id', auth()->user()->id)->where('type', 'out')->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('cost');
        $recipe = $positive - $negative;

        $saving = Saving::where('user_id', auth()->user()->id)->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->first()->count;

        return view('app.counts', compact('recipe', 'saving'));
    }

    public function sendMail()
    {
        Mail::to('vincent@vinvui.com')->send(new HelloMail());
    }
}

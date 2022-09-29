<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSetting;

class RedirectController extends Controller
{
    public function index()
    {
        switch (auth()->user()->grade) {
            case 'admin':
                // return redirect()->route('dashboard.admin');
                break;
            case 'user':
                return $this->redirectUser();
                break;
            default:
                return redirect()->route('welcome');
        }
    }

    private function redirectUser()
    {
        $this->createUserSettings();
        return redirect()->route('index');
    }

    private function createUserSettings()
    {
        $user_setting = new UserSetting;
        $user_setting->save();

        $user = User::find(auth()->user()->id);
        $user->user_setting_id = $user_setting->id;
        $user->save();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSetting;
use App\Models\Saving;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RedirectController extends Controller
{

    //Redirect = Créer toutes les tables utiles (userSettings par exemple) lors de la création d'un new User pour éviter les error 404 après.
    //Redirect est invoquer par app/providers/routeServiceProvider.php (une fois que les user sont co)

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
                return abort(401);
        }
    }

    private function redirectUser()
    {
        //On regarde si c'est un new user ou juste un log in
        if (auth()->user()->user_setting_id == null) {
            $this->createUserSettings();
        }

        //Si l'utilisateur n'a pas de saving alors on en créer un
        if(!auth()->user()->savings->first()){
            $this->createSaving();
        }

        return redirect()->route('trades-list');
    }

    private function createUserSettings()
    {
        $user_setting = new UserSetting;
        $save_user_setting = $user_setting->save();

        if ($save_user_setting) {
            $user = User::find(auth()->user()->id);
            $user->user_setting_id = $user_setting->id;
            $user->save();
        }
    }

    private function createSaving()
    {
        $saving = new Saving;
        $saving->date = Carbon::now();
        $saving->count = 0;
        $saving->user_id = auth()->user()->id;
        $saving->save();
    }
}

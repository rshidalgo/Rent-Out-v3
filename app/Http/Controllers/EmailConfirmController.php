<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class EmailConfirmController extends Controller
{
    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            return 'error';
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            return 'error';
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/');
    }
}

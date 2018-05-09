<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /*

     // Primeiro caso usuário checado, mas não é admin
            if (Auth::guard($guard)->check() && Auth::user()->role != 1) {
                return redirect('/');
            }
            // Segundo caso, sessão expirou
            if(!Auth::guard($guard)->check()){
                return redirect('/');
            }
    */
}

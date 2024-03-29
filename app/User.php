<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 *  Cada usuario pasa a ser una taquilla de venta
 * dentro del sistema
 *
 * @author Emilio Ochoa <emilioaor@gmail.com>
 * Class User
 * @package App
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    const LEVEL_USER = 'LEVEL_USER';
    const LEVEL_ADMIN = 'LEVEL_ADMIN';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password','level', 'print_code'
    ];

    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\Models\User
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retorna los tickets generados por el usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'user_id');
    }
}

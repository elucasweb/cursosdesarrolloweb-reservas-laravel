<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'credit',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'credit' => 'int',
        ];
    }

    /*
     * Reservas
     * HASMANY
     * HasMany quieres decir que un usuario puede tener mchas reservas
     *relacion de tipo  HasMany con el modelo booking, que tenemos una FOREIGN  DE ( user_id )
     *
     * */
    public function bookings(): HasMany
    {
        return $this->hasMany(booking::class);
    }

    /*
     * Para no estar controlando si el usuario tienes creditos o no en cuaquer lugar de la aplicacion para hacer una cosa o otra
     * vamos definir directamente un booleano true o false en nuestro modelo  ( hasCredit ) para saber si un usuario
     * tienes credito o no.
     * si es > do que cero significa que tiene credito si es 0 es que no tienes credito eretornaremos un booleano que nos
     * retornara false
     *
     * **/
    public function hasCredits(): bool
    {
        return $this->credit > 0;

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\PseudoTypes\CallableString;

class Business extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'image',
        'max_future_days',
        'slot_duration',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'phone' => 'string',
            'address' => 'string',
            'image' => 'string',
            'max_future_days' => 'int',
            'slot_duration' => 'int',
        ];
    }

    /* ( schedules = Horarios)
     *
     * Una empresa puede tener muchos Horarios
     *
     * */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /*
     *Un negocio puede tener muchas opciones de horarios o dias para que un cliente pueda reservar
     *
     *
     * */
    public function slots(): HasMany
    {
        return $this->hasMany(slot::class);
    }


}

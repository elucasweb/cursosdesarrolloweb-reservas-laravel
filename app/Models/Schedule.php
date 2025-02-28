<?php

namespace App\Models;


use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
 * Schedules son los horarios de cada uno de los negocios
 * */

class Schedule extends Model
{
    protected $fillable = [
        'business_id',
        'day_of_week',
        'open_time',
        'close_time',
        'is_closed',
    ];


    protected function casts(): array
    {
        return [

            'day_of_week' => 'int', // es los dias de la semanan [1, 2,  3 ,4 ,5 ,6, 7]
            'open_time' => TimeCast::class,
            'close_time' => TimeCast::class,
            'is_closed' => 'bool',
        ];
    }

    /*
     * definir belongTo
     * quieres decir que un horario siempre va a  pertenecer a un negocio
     *
     * */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    /*
     * day_of_week_string
     *
     * */
    public function dayOfWeekString(): Attribute
    {
        $day = match ($this->day_of_week) {
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miercoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sabado',
            7 => 'Domingo',
        };
        return Attribute::make(get: fn() => $day);
    }

}

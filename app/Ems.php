<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Ems extends Authenticatable
{
    use HasFactory;
    use Notifiable;


    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'phone',
    ];


}

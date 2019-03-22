<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public $table = 'sinhviens';
    protected $fillable = ['name', 'age' , 'avatar'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    public $table = 'sinhviens';
    protected $fillable = ['name', 'age' , 'avatar'];
}

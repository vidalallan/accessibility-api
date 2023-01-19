<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "tbUser";

    protected $fillable = ['idUser','nameUser','emailUser','passwordUser'];

    public $timestamps = false;
}

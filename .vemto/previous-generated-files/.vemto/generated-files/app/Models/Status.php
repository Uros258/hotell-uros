<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $table = 'Status';

    protected $guarded = [];

    public function rezervacijes()
    {
        return $this->hasMany(Rezervacije::class);
    }

    public function sobes()
    {
        return $this->hasMany(Sobe::class);
    }
}

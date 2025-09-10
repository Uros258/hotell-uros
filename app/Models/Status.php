<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['naziv_statusa'];

    public function rezervacije()
    {
        return $this->hasMany(Rezervacija::class, 'status_id');
    }
}

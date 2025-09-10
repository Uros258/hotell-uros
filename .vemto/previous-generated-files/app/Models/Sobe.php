<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sobe extends Model
{
    use HasFactory;

    protected $table = 'Sobe';

    protected $guarded = [];

    public function rezervacijes()
    {
        return $this->hasMany(Rezervacije::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

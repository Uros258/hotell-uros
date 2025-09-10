<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rezervacija extends Model
{
    use HasFactory;

    protected $fillable = [
        'datum_od',
        'datum_do',
        'korisnik_id',
        'soba_id',
        'status_id'
    ];

    public function korisnik()
    {
        return $this->belongsTo(User::class, 'korisnik_id');
    }

    public function soba()
    {
        return $this->belongsTo(Soba::class, 'soba_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

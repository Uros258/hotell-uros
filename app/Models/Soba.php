<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soba extends Model
{
    use HasFactory;

    protected $table = 'sobe';
    protected $fillable = ['broj_sobe', 'tip_sobe', 'cena', 'status_sobe'];

    public function rezervacije()
    {
        return $this->hasMany(Rezervacija::class, 'soba_id');
    }
}

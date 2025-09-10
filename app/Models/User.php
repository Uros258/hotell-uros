<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'ime',
        'prezime',
        'email',
        'telefon',
        'lozinka',
        'rola_id',
    ];

    protected $hidden = [
        'lozinka',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->lozinka;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'rola_id');
    }

    public function rezervacije()
    {
        return $this->hasMany(Rezervacija::class, 'korisnik_id');
    }

    
}

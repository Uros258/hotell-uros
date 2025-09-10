<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rezervacije extends Model
{
    use HasFactory;

    protected $table = 'Rezervacije';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sobe()
    {
        return $this->belongsTo(Sobe::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

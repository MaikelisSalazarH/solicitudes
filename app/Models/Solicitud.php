<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class); 
    }
}

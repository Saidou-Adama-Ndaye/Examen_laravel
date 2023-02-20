<?php

namespace App\Models;

use App\Models\Candidat;
use App\Models\Referentiel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'duree', 'description', 'isStarted', 'date_debut'];


    public function candidats() {
        return $this->belongsToMany(Candidat::class);
    }

    public function referentiels() {
        return $this->belongsToMany(Referentiel::class);
    }
}

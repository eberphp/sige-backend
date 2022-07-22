<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'Encuesta';
    protected $primaryKey = 'idEncuesta';
    public $timestamps = false;
    protected $fillable = [
        'idPeriodo',
        'idCandidatoDepartamento',
        'idDepartamento',
        'idCandidatoProvincia',
        'idProvincia',
        'idCandidatoDistrito',
        'idDistrito',
        'VotoDistrital',
        'VotoDepartamento',
        'VotoProvincial',
        'VotoProvincial',
        'NombresDepartamento',
        'NombresProvincia',
        'NombresDistrito',
        'LogoDepartamento',
        'LogoProvincia',
        'LogoDistrito'
    ];
    protected $guarded = [];
    public function periodo(){
        return $this->belongsTo(Periodo::class, 'idPeriodo');
    }
    public function candepart(){
        return $this->belongsTo(Candidato::class, 'idCandidatoDepartamento');
    }
    public function candpro(){
        return $this->belongsTo(Candidato::class, 'idCandidatoProvincia');
    }
    public function canddis(){
        return $this->belongsTo(Candidato::class, 'idCandidatoDistrito');
    }
    public function departamento(){
        return $this->belongsTo(Departamento::class, 'idDepartamento');
    }
    public function distrito(){
        return $this->belongsTo(Distrito::class, 'idDistrito');
    }
    public function provincia(){
        return $this->belongsTo(Provincia::class, 'idProvincia');
    }

}

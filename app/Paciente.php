<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

	protected $fillable = [
        'rut',
        'primer_nombre',
        'segundo_nombre',
        'apellido_paterno',
        'apellido_materno'
    ];

	public function scopeSearch($query, $value)
    {
        return $query->where('primer_nombre', 'LIKE', "%$value%");
    }

    public function getFullNameAttribute(){
        return $this->primer_nombre. ' '.$this->segundo_nombre. ' '. $this->apellido_paterno. ' '.$this->apellido_materno;
    }

    public function usuario(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
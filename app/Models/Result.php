<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'results';

    /**
    * The fielt that does not editable
    *
    * @var array
    */
    protected $guarded = ['id','created_at','updated_at'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_resultado';

    public function patient(){
        return $this->belongsTo(Patient::class,'id_paciente','id_paciente');
    }

    public function medicalTest(){
        return $this->belongsTo(MedicalTest::class,'id_prueba','id_prueba');
    }
}

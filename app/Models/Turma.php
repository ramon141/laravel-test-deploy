<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasFactory;

    protected $table ="turmas";

    protected $fillable =[
        'admission_year',
        'course_id'
    ];

    public function preOffer(){
        return $this->hasMany(PreOffer::class,'turma_id');
    }
}

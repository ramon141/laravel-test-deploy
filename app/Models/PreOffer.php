<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class PreOffer extends Model
{
    use HasFactory;

    protected $table = 'pre_offers';

    protected $fillable = ['date','shift','formatType','turma_id','period_id','discipline_id','siap_coordenador','this_is_pro_discipline'];

    public function turma(){
        return $this->belongsTo(Turma::class,'turma_id');
    }

    public function period(){
        return $this->belongsTo(Period::class,'period_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $table ="periods";

    protected $fillable = ['name','start_request','end_request','start_indication','end_indication'];

    public function preOffer(){
        return $this->hasMany(PreOffer::class,'period_id');
    }
}

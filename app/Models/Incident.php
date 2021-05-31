<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $fillable = ['title','category_id','incidentDate','comments'];

    public function peoples()
    {
        return $this->hasMany(People::class,'incident_id','id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class,'incident_id','id');
    }

}

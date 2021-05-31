<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','type','incident_id'];

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }

}

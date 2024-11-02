<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',       
        'phone',
        'room',
        'speciality_id',
        
    ];

   
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    protected $primaryKey = 'id';
    protected $fillable = ['id_patient','name', 'address', 'phone', 'date', 'doctor_id'];

    // protected $guarded =['id'];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

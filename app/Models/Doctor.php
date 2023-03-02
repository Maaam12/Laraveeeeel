<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctor';
    protected $primaryKey = 'id';
    protected $fillable = ['code_doctor','name', 'address', 'specialist'];

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}

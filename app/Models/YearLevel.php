<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevel extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional)
    protected $table = 'year_levels';

    // Define the fillable fields
    protected $fillable = [
        'year_level',
    ];

    // Relationship with Scholar model (One-to-Many)
    public function scholars()
    {
        return $this->hasMany(Scholar::class, 'year_level_id');
    }
}
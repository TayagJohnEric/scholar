<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scholar extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, Laravel assumes plural form)
    protected $table = 'scholars';

    // Define the fillable fields
    protected $fillable = [
        'name', 'age', 'gender', 'email', 'contact', 'status', 'address', 'school', 
        'course', 'year_level_id', 'cor_file', 'cog_file', 'school_id',
    ];
    

    // Relationship with YearLevel model (Many-to-One)
    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class, 'year_level_id');
    }

    // Relationship with Submission model (One-to-Many)
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional)
    protected $table = 'submissions';

    // Define the fillable fields
    protected $fillable = [
        'scholar_id', 'status',
    ];

    // Relationship with Scholar model (Many-to-One)
    public function scholar()
    {
        return $this->belongsTo(Scholar::class, 'scholar_id');
    }
}
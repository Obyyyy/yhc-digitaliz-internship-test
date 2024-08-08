<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'link',
    ];

    // protected $with = [
    //     'course'
    // ];

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
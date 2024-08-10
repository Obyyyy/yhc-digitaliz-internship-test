<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'link',
    ];

    // protected $with = [
    //     'course'
    // ];

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%'.$search.'%');
        });

        $query->when($filters['course'] ?? false, function($query, $course) {
            $query->whereHas('course', fn ($query) => $query->where('slug', $course)
            );
        });
    }
}
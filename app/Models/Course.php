<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'duration',
    ];

    // protected $with = [
    //     'materials'
    // ];

    public function materials(): HasMany {
        return $this->hasMany(Material::class, 'course_id', 'id');
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%'.$search.'%');
        });

        // $query->when($filters['category'] ?? false, function($query, $category) {
        //     $query->whereHas('category', function ($query) use ($category) { $query->where('slug', $category); }
        //     );
        // });

        // $query->when($filters['category'] ?? false, function($query, $category) {
        //     $query->whereHas('category', fn ($query) => $query->where('slug', $category)
        //     );
        // });
    }
}
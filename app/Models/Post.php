<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    protected function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . request('search') . '%');
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', fn (Builder $query) =>
                $query->where('slug', $category)
            );
        });
        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', fn (Builder $query) =>
                $query->where('username', $author)
            );
        });
    }
}

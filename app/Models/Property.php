<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "surfaces",
        "rooms",
        "bedrooms",
        "floor",
        "price",
        "city",
        "adress",
        "postal_code",
        "sold",
    ];

    protected $casts = [
        'created_at' => 'string',
    ];

    /**
     * Summary of option
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function option(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    /**
     * Summary of getSlug
     * @return string
     */
    public function getSlug(): string
    {
        return Str::slug($this->title);
    }

    /**
     * Summary of scopeAvaible
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param bool $available
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvaible(Builder $builder, bool $available = true): Builder
    {
        return $builder->where('sold', !$available);
    }

    /**
     * Summary of scopeRecent
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'state_code',
        'country_id',
        'user_id',
    ];


    /**
     * Scopes for filtering datasets
     *
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', '%' . $term . "%");
    }

    public function scopeFilterByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeFilterByCountry($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }

    public function scopeSort($query, $sortBy, $order = "ASC")
    {
        return $query->when($sortBy, fn($q) => $q->orderBy($sortBy, $order));
    }

    /**
     * 
     * Slug names as they are being created or updated 
     * 
     */

    protected static function booted()
    {
        // Slug while 
        static::creating(function ($state) {
            $state->slug = $state->generateUniqueSlug($state->name);
        });

        static::updating(function ($state) {
            $state->slug = $state->generateUniqueSlug($state->name);
        });
    }

    /**
     * Generate a unique slug for a state.
     * @param string
     * @return string
     */

    protected function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = 1;

        // Check if slug exist and append a counter if it does
        while (State::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }


    /**
     * 
     * Model Relations
     * 
    */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    
    public function cities() : HasMany
    {
        return $this->hasMany(City::class);
    }
    
}

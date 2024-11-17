<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Country extends Model
{

    use HasFactory;

    protected $fillables = [
        'name',
        'slug',
        'country_code',
        'flag',
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

    /**
     * Slug names as they are being created or updated
     */

    protected static function booted()
    {
        // Slug while creating country
        static::creating(function($country) {
            $country->slug = Str::slug($country->name);
        });
        // Slug while updating country
        static::updating(function($country) {
            $country->slug = Str::slug($country->name);
        });
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

    public function states() : HasMany
    {
        return $this->hasMany(City::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'state_id',
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

    public function scopeFilterByState($query, $stateId)
    {
        return $query->where('state_id', $stateId);
    }

    public function scopeSort($query, $sortBy, $order = "ASC")
    {
        return $query->when($sortBy, fn($q) => $q->orderBy($sortBy, $order));
    }

    /**
     * Slug names as they are being created or updated 
     */

    protected static function booted()
    {
        // Slug while 
        static::creating(function ($cities) {
            $cities->slug = $cities->generateUniqueSlug($cities->name);
        });

        static::updating(function ($cities) {
            $cities->slug = $cities->generateUniqueSlug($cities->name);
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

        while(City::where('slug', $slug)->exists())
        {
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

    public function state() : BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}

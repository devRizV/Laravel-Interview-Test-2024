<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class City extends Model
{

    protected $fillables = [
        'name',
        'slug',
        'state_id',
        'user_id',
    ];

    /**
     * Slug names as they are being created or updated 
     */

    protected static function booted()
    {
        // Slug while 
        static::creating(function ($cities) {
            $cities->slug = $this->generateUniqueSlug($cities->name);
        });

        static::updating(function ($cities) {
            $cities->slug = $this->generateUniqueSlug($cities->name);
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

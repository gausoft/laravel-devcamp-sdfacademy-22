<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'image',
        'cost',
        'deposit',
        'description',
        'city',
        'street',
        'category_id',
        'advertiser_id'
    ];
    
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->slug = Str::slug($model->label);
        });
    }

    /**
     * Get the advertiser that owns the advertisement.
     */
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }
}
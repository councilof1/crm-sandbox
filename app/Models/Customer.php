<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{

    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'id',
        'customer_id',
        'name',
        'active',
        'address',
        'address_2',
        'city',
        'state',
        'zip',
        'phone',
        'email',
        'company_name',
        'website',
        'comments',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

        public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('active', true);
    }
    public function scopeInactive(Builder $builder): Builder
    {
        return $builder->where('active', false);
    }
}

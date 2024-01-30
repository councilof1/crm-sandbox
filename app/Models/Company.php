<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,
        SoftDeletes;

        protected $fillable = [
            'id',
            'company_id',
            'company_name',
            'active',
            'company_address1',
            'company_address2',
            'company_city',
            'company_state',
            'company_zip',
            'company_country',
        ];

        protected $casts = [
            'active' => 'boolean',
        ];
/*
        public function scopeActive(Builder $builder): Builder
        {
            return $builder->where('active', true);
        }
        public function scopeInactive(Builder $builder): Builder
        {
            return $builder->where('active', false);
        }
        */
}

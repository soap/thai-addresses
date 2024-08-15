<?php

namespace Soap\ThaiAddresses\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'label',
        'given_name',
        'family_name',
        'organization',
        'street',
        'subdistrict_id',
        'postal_code',
        'latitude', 'longitude',
        'is_primary', 'is_billing', 'is_shipping',

    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'addressable_id' => 'integer',
        'addressable_type' => 'string',
        'label' => 'string',
        'given_name' => 'string',
        'family_name' => 'string',
        'organization' => 'string',
        'street' => 'string',
        'postal_code' => 'string',
        'latitude' => 'float',
        'longitude' => 'float',
        'is_primary' => 'boolean',
        'is_billing' => 'boolean',
        'is_shipping' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = ThaiAddresses::getAddressTableName();
    }

    /**
     * Get the owner model of the address.
     */
    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable', 'addressable_type', 'addressable_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    /**
     * Scope primary addresses.
     */
    public function scopeIsPrimary(Builder $builder): Builder
    {
        return $builder->where('is_primary', true);
    }

    /**
     * Scope billing addresses.
     */
    public function scopeIsBilling(Builder $builder): Builder
    {
        return $builder->where('is_billing', true);
    }

    /**
     * Scope shipping addresses.
     */
    public function scopeIsShipping(Builder $builder): Builder
    {
        return $builder->where('is_shipping', true);
    }
}

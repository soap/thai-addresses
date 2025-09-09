<?php

declare(strict_types=1);

namespace Soap\ThaiAddresses\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

trait HasAddress
{
    /**
     * Register a deleted model event with the dispatcher.
     *
     * @param  \Closure|string  $callback
     * @return void
     */
    abstract public static function deleted($callback);

    /**
     * Define a polymorphic one-to-many relationship.
     *
     * @param  string  $related
     * @param  string  $name
     * @param  string  $type
     * @param  string  $id
     * @param  string  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    abstract public function morphMany($related, $name, $type = null, $id = null, $localKey = null);

    /**
     * Boot the HasAddress trait for the model.
     *
     * @return void
     */
    public static function bootHasAddress()
    {
        static::deleted(function (self $model) {
            $model->addresses()->delete();
        });
    }

    /**
     * Get all attached addresses to the model.
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(config('thai-addresses.address.model'), 'addressable', 'addressable_type', 'addressable_id');
    }

    public function addAddress(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return $this->addresses()->create($attributes);
    }

    /**
     * Find addressables by distance.
     */
    public function findByDistance(string $distance, string $unit, string $latitude, string $longitude): Collection
    {
        // @TODO: this method needs to be refactored!
        return $this->addresses()->within($distance, $unit, $latitude, $longitude)->get();
    }
}

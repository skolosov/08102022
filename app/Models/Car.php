<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Car
 * @package App\Models
 *
 * @property int $id
 * @property int $name
 * @property Rent $rent
 */
class Car extends Model
{
    use HasFactory;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return HasOne
     */
    public function rent(): HasOne
    {
        return $this->hasOne(Rent::class, 'car_id', 'id')
            ->orderBy('end_rent', 'desc');
    }

    /**
     * @param Builder $builder
     */
    public function scopeLeftJoinRents(Builder $builder)
    {
        $builder->select([
                'cars.id',
                'name',
                'created_at',
                'updated_at',
                'rents.user_id',
                'rents.start_rent',
                'rents.end_rent',
            ]
        )->leftJoin('rents', 'cars.id', '=', 'rents.car_id');
    }

    /**
     * @param Builder $builder
     */
    public function scopeFreeCars(Builder $builder)
    {
        $now = Carbon::now();
        $builder->leftJoinRents()
            ->where(function ($query) {
                $query->whereNull('start_rent')
                    ->whereNull('end_rent');
            })->orWhere(function ($query) use ($now) {
                $query->where('start_rent', '<', $now)
                    ->where('end_rent', '>', $now);
            });
    }
}

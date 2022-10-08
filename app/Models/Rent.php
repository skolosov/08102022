<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Rent
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property int $car_id
 * @property string $start_rent
 * @property string $end_rent
 * @property User $user
 * @property Car $car
 */
class Rent extends Model
{
    use HasFactory;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'user_id',
        'car_id',
        'start_rent',
        'end_rent',
    ];

    /**
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trip Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $vehicle_id
 * @property int $start_station_id
 * @property int|null $end_station_id
 * @property int $paymethod_id
 * @property int|null $promotion_id
 * @property \Cake\I18n\DateTime $start_time
 * @property \Cake\I18n\DateTime|null $end_time
 * @property int|null $duration_minutes
 * @property string $base_rate
 * @property string|null $total_cost
 * @property string $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Paymethod $paymethod
 * @property \App\Model\Entity\Promotion $promotion
 */
class Trip extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'vehicle_id' => true,
        'start_station_id' => true,
        'end_station_id' => true,
        'paymethod_id' => true,
        'promotion_id' => true,
        'start_time' => true,
        'end_time' => true,
        'duration_minutes' => true,
        'base_rate' => true,
        'total_cost' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'vehicle' => true,
        'paymethod' => true,
        'promotion' => true,
    ];
}

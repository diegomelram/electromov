<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property int $id
 * @property int $model_id
 * @property string $serial_number
 * @property string $status
 * @property int $battery_level
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $current_station_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\Trip[] $trips
 */
class Vehicle extends Entity
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
        'model_id' => true,
        'serial_number' => true,
        'status' => true,
        'battery_level' => true,
        'latitude' => true,
        'longitude' => true,
        'current_station_id' => true,
        'created' => true,
        'modified' => true,
        'model' => true,
        'trips' => true,
    ];
}

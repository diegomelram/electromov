<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paymethod Entity
 *
 * @property int $id
 * @property string|null $cardholder_name
 * @property int $user_id
 * @property string|null $provider_name
 * @property string|null $card_number
 * @property string|null $cvv
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Trip[] $trips
 */
class Paymethod extends Entity
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
        'cardholder_name' => true,
        'user_id' => true,
        'provider_name' => true,
        'card_number' => true,
        'cvv' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'trips' => true,
    ];
}

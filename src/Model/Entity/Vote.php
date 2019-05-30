<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vote Entity
 *
 * @property int $id
 * @property string $table_alias
 * @property int $primary_key
 * @property int $user_id
 * @property int $vote
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 */
class Vote extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'table_name' => true,
        'primary_key' => true,
        'user_id' => true,
        'vote' => true,
        'created' => true,
        'user' => true,
    ];
}

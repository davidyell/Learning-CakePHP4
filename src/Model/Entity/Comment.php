<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property string $comment
 * @property int $user_id
 * @property string $table_name
 * @property int $primary_key
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Comment extends Entity
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
        'comment' => true,
        'user_id' => true,
        'table_name' => true,
        'primary_key' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}

<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email_address
 * @property string $password
 * @property bool|null $is_active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Tagged[] $tagged
 */
class User extends Entity
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
        'username' => true,
        'email_address' => true,
        'password' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'answers' => true,
        'comments' => true,
        'questions' => true,
        'tagged' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * Hash the User entity password
     *
     * @param string $password Users plain text password
     * @return null|string
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return null;
    }
}

<?php
declare(strict_types=1);
namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property int $id
 * @property int $question_id
 * @property int $user_id
 * @property string $answer
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\User $user
 */
class Answer extends Entity
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
        'question_id' => true,
        'user_id' => true,
        'answer' => true,
        'created' => true,
        'modified' => true,
        'question' => true,
        'user' => true,
    ];

    protected function _getVoteCount(): int
    {
        return count($this->get('votes'));
    }

    protected function _getUpvotes(): int
    {
        $votes = new Collection($this->get('votes'));
        return $votes->match(['vote' => 1])->count();
    }

    protected function _getDownvotes(): int
    {
        $votes = new Collection($this->get('votes'));
        return $votes->match(['vote' => -1])->count();
    }
}

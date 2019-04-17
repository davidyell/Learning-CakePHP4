<?php
namespace App\Model\Behavior;

use App\Model\Table\CommentsTable;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Query;

/**
 * Comments behavior
 */
class CommentsBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Initialize the behaviour
     *
     * @param array $config Array of behaviour configuration
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->_table->hasMany('Comments', [
            'className' => CommentsTable::class,
            'foreignKey' => 'primary_key',
            'bindingKey' => 'id',
            'conditions' => ['table_name' => $this->_table->getRegistryAlias()],
            'propertyname' => 'comments'
        ]);
    }

    /**
     * beforeFind to attach comments and their author
     *
     * @param Event $event Event instance
     * @param Query $query Query instance to modify
     * @param \ArrayObject $options Array of options
     * @param $primary
     * @return Query
     */
    public function beforeFind(Event $event, Query $query, \ArrayObject $options, $primary): Query
    {
        return $query->contain([
            'Comments' => [
                'Users'
            ]
        ]);
    }
}

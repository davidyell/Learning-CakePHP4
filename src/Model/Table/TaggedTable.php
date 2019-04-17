<?php
declare(strict_types=1);
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tagged Model
 *
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Tagged get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tagged newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tagged[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tagged|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tagged saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tagged patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tagged[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tagged findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TaggedTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tagged');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->allowEmptyString('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }

    /**
     * Take an array of tag names from a selectize field, find out which ones exist, and add news ones.
     * Then return an array of Tagged entities
     *
     * @param array $tagNames
     * @return array
     */
    public function buildTags(array $tagNames): array
    {
        $taggedEntities = [];

        $existingTags = $this->Tags->find()
            ->where(['Tags.name IN' => $tagNames]);

        $existingTagsArray = $existingTags
            ->combine('id', 'name')
            ->toArray();

        foreach ($existingTags as $tag) {
            $newTaggedEntity = $this->newEmptyEntity();
            $newTaggedEntity->set('tag', $tag);
            $taggedEntities[] = $newTaggedEntity;
        }

        $newTags = array_diff($tagNames, $existingTagsArray);
        foreach ($newTags as $tagName) {
            $newTaggedEntity = $this->newEmptyEntity();
            $newTagEntity = $this->Tags->newEntity(['name' => $tagName]);
            $newTaggedEntity->set('tag', $newTagEntity);
            $taggedEntities[] = $newTaggedEntity;
        }

        return $taggedEntities;
    }
}

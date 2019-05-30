<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Cake\ORM\Query;

/**
 * @property \App\Model\Table\TagsTable $Tags
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class TagsController extends AppController
{
    /**
     * Initialize the controller
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
    }

    /**
     * View a tag and a paginated list of questions tagged with the tag
     *
     * @param string|int $id The tag id to find
     * @return \Cake\Http\Response|null
     */
    public function view($id)
    {
        $tag = $this->Tags->find()
            ->where(['Tags.id' => $id])
            ->first();

        if (!$tag) {
            throw new NotFoundException('Tag cannot be found');
        }

        $this->loadModel('Questions');
        $questions = $this->Questions->find()
            ->contain([
                'Tagged' => [
                    'Tags'
                ],
                'Users'
            ])
            ->order(['Questions.modified' => 'desc'])
            ->matching('Tagged.Tags', function (Query $query) use ($id) {
                return $query->where(['Tags.id' => $id]);
            });

        $this->set('tag', $tag);
        $this->set('questions', $this->Paginator->paginate($questions));
    }
}

<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\ORM\Query;

/**
 * @property \App\Model\Table\QuestionsTable $Questions
 * @mixin \Cake\Controller\Component\PaginatorComponent
 */
class QuestionsController extends AppController
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

        $this->Auth->allow(['index', 'view']);
    }

    /**
     * List the questions
     *
     * @return void
     */
    public function index()
    {
        $questionsQuery = $this->Questions->find()
            ->contain([
                'Users',
                'Tagged' => [
                    'Tags',
                ],
            ])
            ->order(['Questions.modified' => 'desc']);

        $this->set(
            'questions',
            $this->Paginator->paginate($questionsQuery, ['limit' => 10])
        );
    }

    /**
     * Add a new question
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $question = $this->Questions->newEmptyEntity();

        if ($this->getRequest()->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->getRequest()->getData());
            $question->set('user_id', $this->getRequest()->getSession()->read('Auth.User.id'));
            if (!empty($this->getRequest()->getData('tags'))) {
                $question->set('tagged', $this->Questions->Tagged->buildTags($this->getRequest()->getData('tags')));
            }

            if ($this->Questions->save($question)) {
                $this->Flash->success('Your question has been saved.');

                return $this->redirect(['action' => 'view', $question->get('slug')]);
            }

            $this->Flash->error('Sorry, your question could not be saved.');
        }

        $this->set('question', $question);
        $this->set('tags', $this->Questions->Tagged->Tags->find('list', [
            'keyField' => 'name',
            'valueField' => 'name'
        ]));
    }

    /**
     * View a single question
     *
     * @param string $slug Question slug to view
     * @return \Cake\Http\Response|null
     */
    public function view(string $slug)
    {
        $question = $this->Questions->find()
            ->contain([
                'Users',
                'Answers' => function (Query $query) {
                    return $query
                        ->contain('Users')
                        ->order(['Answers.modified' => 'desc']);
                },
                'Tagged' => [
                    'Tags',
                ],
            ])
            ->where(['Questions.slug' => $slug])
            ->first();

        if (!$question) {
            throw new NotFoundException('Question cannot be found.');
        }

        $this->set('question', $question);
        $this->set('answer', $this->Questions->Answers->newEmptyEntity());
    }

    /**
     * Allow a user to edit their own question
     *
     * @param string $slug Question slug to edit
     * @return Response|null
     */
    public function edit(string $slug)
    {
        $question = $this->Questions->find()
            ->contain([
                'Users',
                'Tagged' => [
                    'Tags'
                ]
            ])
            ->where([
                'Questions.slug' => $slug,
                'Questions.user_id' => $this->getRequest()->getSession()->read('Auth.User.id')
            ])
            ->first();

        if (!$question) {
            $this->Flash->error('You cant edit that question or it doesn\'t exist.');
            return $this->redirect($this->referer());
        }

        if ($this->getRequest()->is(['post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->getRequest()->getData());
            if (!empty($this->getRequest()->getData('tags'))) {
                $question->set('tagged', $this->Questions->Tagged->buildTags($this->getRequest()->getData('tags')));
            }

            if ($this->Questions->save($question)) {
                $this->Flash->success('Question has been updated.');
                return $this->redirect(['controller' => 'Questions', 'action' => 'view', 'slug' => $question->get('slug')]);
            }

            $this->Flash->error('Question could not be updated.');
        }

        $this->set('question', $question);
        $this->set('tags', $this->Questions->Tagged->Tags->find('list', [
            'keyField' => 'name',
            'valueField' => 'name'
        ]));
    }
}

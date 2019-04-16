<?php
/**
 * QuestionsController
 *
 * Copyright (c) 2019 UK Web Media Ltd.
 * @package App\Controller
 * @author David Yell <dyell@ukwebmedia.com>
 */

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;
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
            ->contain('Users')
            ->order(['Questions.modified' => 'desc']);

        $this->set(
            'questions',
            $this->Paginator->paginate($questionsQuery)
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

            if ($this->Questions->save($question)) {
                $this->Flash->success('Your question has been saved.');

                return $this->redirect(['action' => 'view', $question->get('id')]);
            }

            $this->Flash->error('Sorry, your question could not be saved.');
        }

        $this->set('question', $question);
    }

    /**
     * View a single question
     *
     * @param int|string $id
     * @return \Cake\Http\Response|null
     */
    public function view($id)
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
                    'Tags'
                ]
            ])
            ->where(['Questions.id' => $id])
            ->first();

        if (!$question) {
            throw new NotFoundException('Question cannot be found.');
        }

        $this->set('question', $question);
        $this->set('answer', $this->Questions->Answers->newEmptyEntity());
    }
}
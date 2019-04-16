<?php
/**
 * AnswersController
 *
 * Copyright (c) 2019 UK Web Media Ltd.
 * @package App\Controller
 * @author David Yell <dyell@ukwebmedia.com>
 */

namespace App\Controller;

/**
 * @property \App\Model\Table\AnswersTable $Answers
 */
class AnswersController extends AppController
{
    /**
     * Add a new answer to an existing question
     *
     * @param int $questionId
     * @return \Cake\Http\Response|null
     */
    public function add($questionId)
    {
        if ($questionId !== $this->getRequest()->getData('question_id')) {
            $this->Flash->error('Cannot answer other questions from this question.');
            return $this->redirect(['controller' => 'Questions', 'action' => 'view', $questionId]);
        }

        $question = $this->Answers->Questions->get($questionId);

        $answer = $this->Answers->newEmptyEntity();

        if ($this->getRequest()->is(['post', 'put'])) {
            $answer = $this->Answers->patchEntity($answer, $this->getRequest()->getData());
            $answer->set('user_id', $this->getRequest()->getSession()->read('Auth.User.id'));

            if ($this->Answers->save($answer)) {
                $this->Flash->success('Thanks, your answer has been saved.');
            } else {
                $this->Flash->error('Cannot add your answer');
            }
        }

        return $this->redirect(['controller' => 'Questions', 'action' => 'view', $question->get('id')]);
    }
}

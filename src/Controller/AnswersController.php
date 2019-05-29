<?php
declare(strict_types=1);
namespace App\Controller;

/**
 * @property \App\Model\Table\AnswersTable $Answers
 */
class AnswersController extends AppController
{
    /**
     * Add a new answer to an existing question
     *
     * @param int $questionId Question id to add an answer to
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

        return $this->redirect(['controller' => 'Questions', 'action' => 'view', 'slug' => $question->get('slug')]);
    }
}

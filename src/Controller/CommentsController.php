<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Utility\Inflector;

/**
 * @property \App\Model\Table\CommentsTable $Comments
 * @property \App\Model\Table\QuestionsTable $Questions
 * @property \App\Model\Table\AnswersTable $Answers
 */
class CommentsController extends AppController
{
    /**
     * Add a new comment to either a Question or Answer
     *
     * @param string $model Name of the model being commented on, expected lowercase plural, eg, questions
     * @param int|string $id Primary key of the item
     * @return \Cake\Http\Response
     */
    public function add(string $model, $id)
    {
        $className = Inflector::camelize($model);

        $this->getRequest()->allowMethod('post');
        if (!in_array($className, ['Questions', 'Answers'])) {
            throw new \BadMethodCallException('Ye gads! What did you do?');
        }

        $this->loadModel('Questions');
        $this->loadModel('Answers');

        // Check things exist before trying to write to them
        if ($this->Questions->exists(['Questions.id' => $id]) === false && $this->Answers->exists(['Answers.id' => $id]) === false) {
            $this->Flash->error('We cant find that question.');
            return $this->redirect(['controller' => 'Questions', 'action' => 'index']);
        }

        $comment = $this->Comments->newEntity([
            'comment' => $this->getRequest()->getData('comment'),
            'user_id' => $this->getRequest()->getSession()->read('Auth.User.id'),
            'table_name' => $className,
            'primary_key' => $id
        ]);

        if ($this->Comments->save($comment)) {
            $this->Flash->success('Comment has been added.');
        } else {
            $this->Flash->error('Your comment could not be added.');
        }

        if ($className === 'Questions') {
            $question = $this->Questions->find()
                ->where(['Questions.id' => $id])
                ->first();
            return $this->redirect(['controller' => 'Questions', 'action' => 'view', 'slug' => $question->get('slug')]);
        }

        // Redirect the user to the Question on which the Answer they commented on resides
        $answer = $this->Answers->find()
            ->contain('Questions')
            ->where(['Answers.id' => $id])
            ->first();

        if (!$answer) {
            $this->Flash->error('We cant find a question to match that answer.');
            return $this->redirect(['controller' => 'Questions', 'action' => 'index']);
        }

        return $this->redirect(['controller' => 'Questions', 'action' => 'view', $answer->get('question')->get('slug')]);
    }
}

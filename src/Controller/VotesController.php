<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Utility\Inflector;

/**
 * Class VotesController
 * @package App\Controller
 *
 * @property \App\Model\Table\VotesTable $Votes
 */
class VotesController extends AppController
{
    /**
     * Store a vote against a Question or Answer
     *
     * @param string $dir
     * @param string $model
     * @param string|int $id
     * @return \Cake\Http\Response|null
     */
    public function vote(string $dir, string $model, $id)
    {
        $votes = [
            'up' => 1,
            'down' => -1
        ];

        // Check if vote already exists
        $vote = $this->Votes->find()
            ->where([
                'table_name' => Inflector::camelize($model),
                'primary_key' => $id,
                'vote' => $votes[$dir],
                'user_id' => $this->Auth->user('id')
            ])
            ->first();

        if ($vote) {
            $this->Flash->success('You already voted, so we removed your vote.');
            $this->Votes->delete($vote);

            return $this->redirect($this->referer());
        }

        // Build a new vote
        $vote = $this->Votes->newEntity([
            'table_name' => Inflector::camelize($model),
            'primary_key' => $id,
            'vote' => $votes[$dir],
            'user_id' => $this->Auth->user('id')
        ]);

        if ($this->Votes->save($vote)) {
            $this->Flash->success('Your ' . $dir . 'vote has been saved.');
        } else {
            $this->Flash->error('We could not save your ' . $dir . 'vote.');
        }

        return $this->redirect($this->referer());
    }
}

<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\CommentsBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\CommentsBehavior Test Case
 */
class CommentsBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\CommentsBehavior
     */
    public $Comments;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Comments = new CommentsBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comments);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

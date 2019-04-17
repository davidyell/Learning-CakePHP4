<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CommentsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CommentsController Test Case
 */
class CommentsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Comments',
        'app.Users',
    ];

    /**
     * Test add method
     *
     * @return void
     * @throws \PHPUnit\Exception
     * @throws \Throwable
     */
    public function testAddWithInvalidCommentModel()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Ye gads! What did you do?');

        $this->post('/comments/add/invalid/999');
    }
}

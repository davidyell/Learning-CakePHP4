<?php
namespace App\Test\TestCase\Controller;

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

    public function setUp(): void
    {
        parent::setUp();

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 2,
                    'username' => 'neon1024',
                    'email' => 'neon1024@example.com',
                    'is_active' => true,
                    'created' => new \DateTimeImmutable(),
                    'modified' => new \DateTimeImmutable()
                ]
            ]
        ]);
    }

    /**
     * Test add method
     *
     * @return void
     * @throws \PHPUnit\Exception
     * @throws \Throwable
     */
    public function testAddWithInvalidCommentModel()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->setUnlockedFields(['comment']);
        $this->post('/comments/add/invalid/999', ['comment' => 'Expecting an exception here']);

        $this->assertResponseFailure();
    }
}

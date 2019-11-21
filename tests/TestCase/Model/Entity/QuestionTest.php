<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Question;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Question Test Case
 */
class QuestionTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Question
     */
    public $Question;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Question = new Question();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Question);

        parent::tearDown();
    }

    public function providerSlugs()
    {
        return [
            'Basic title' => ['An example question', '/an-example-question-[\d]+/'],
            'Title with accents' => ['Das Pferd fährt nicht', '/das-pferd-fahrt-nicht-[\d]+/'],
            'Non latin title' => ['马不开车', '/ma-bu-kai-che-[\d]+/'],
            'Another non latin' => ['الحصان لا يقود', '/alhsan-la-yqwd-[\d]+/']
        ];
    }

    /**
     * @dataProvider providerSlugs
     */
    public function testSlugGeneration($title, $expectedPattern)
    {
        $question = new Question([
            'title' => $title,
            'user_id' => 1
        ]);

        $this->assertNotEmpty($question->get('slug'));
        $this->assertRegExp($expectedPattern, $question->get('slug'));
    }
}

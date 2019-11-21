<?php
declare(strict_types=1);
namespace App\Test\TestCase\Model\Table;

use App\Model\Entity\Tag;
use App\Model\Entity\Tagged;
use App\Model\Table\TaggedTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaggedTable Test Case
 */
class TaggedTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TaggedTable
     */
    public $Tagged;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Tagged',
        'app.Questions',
        'app.Tags',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tagged') ? [] : ['className' => TaggedTable::class];
        $this->Tagged = TableRegistry::getTableLocator()->get('Tagged', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tagged);

        parent::tearDown();
    }

    /**
     * Test building of Tagged entity array from array of tags
     *
     * @return void
     */
    public function testBuildTags()
    {
        $tagNames = ['Cat', 'Fish', 'Weasel'];

        $result = $this->Tagged->buildTags($tagNames);

        $this->assertNotEmpty($result);
        $this->assertIsArray($result);
        $this->assertCount(3, $result);

        foreach ($result as $taggedEntity) {
            $this->assertInstanceOf(Tagged::class, $taggedEntity);
            $this->assertInstanceOf(Tag::class, $taggedEntity->get('tag'));
        }
    }
}

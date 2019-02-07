<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalculationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalculationsTable Test Case
 */
class CalculationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalculationsTable
     */
    public $Calculations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Calculations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Calculations') ? [] : ['className' => CalculationsTable::class];
        $this->Calculations = TableRegistry::getTableLocator()->get('Calculations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calculations);

        parent::tearDown();
    }
	
	
	public function testFindResult()
    {
		
		$query = $this->Calculations->find('result',['start_date' => '2019-02-06', 'end_date' => '2019-02-15']);
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->enableHydration(false)->select('result')->first();
		
        $expected = ['result' => '9 Days'];
            
        $this->assertEquals($expected, $result);
    }

    

}

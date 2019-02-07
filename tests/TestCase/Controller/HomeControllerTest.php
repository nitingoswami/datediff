<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Test\TestCase\Controller;

use App\Controller\HomeController;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\IntegrationTestCase;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
/**
 * PagesControllerTest class
 */
class HomeControllerTest extends IntegrationTestCase
{
    
    /**
     * Test that missing template renders 404 page in production
     *
     * @return void
     */
    public function testMissingTemplate()
    {
        Configure::write('debug', false);
        $this->get('/home/not_existing');

        $this->assertResponseError();
        $this->assertResponseContains('Error');
    }

    /**
     * Test that missing template in debug mode renders missing_template error page
     *
     * @return void
     */
    public function testMissingTemplateInDebug()
    {
        Configure::write('debug', true);
        $this->get('/home/not_existing');

        $this->assertResponseFailure();
        $this->assertResponseContains('Missing Template');
        $this->assertResponseContains('Stacktrace');
        $this->assertResponseContains('not_existing.ctp');
    }

    /**
     * Test directory traversal protection
     *
     * @return void
     */
    public function testDirectoryTraversalProtection()
    {
        $this->get('/home/../Layout/ajax');
        $this->assertResponseCode(403);
        $this->assertResponseContains('Forbidden');
    }
	
	
	public function testIndexPostData()
    {
        $data = [
            'startDate' => '2019-02-06',
            'endDate' => '2019-02-15'
        ];
		
        $this->post('/home', $data);

        $this->assertResponseSuccess();
     
        $calculations = TableRegistry::getTableLocator()->get('Calculations');
		$result       = $calculations->find()
							   ->where(['start_date' => $data['startDate'], 'end_date' => $data['endDate'] ])
							   ->select('result')
							   ->enableHydration(false)
							   ->first();
		
		$expected = ['result' => '9 Days'];
            
        $this->assertEquals($expected, $result);
        
    }
}

<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Base
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * General inspector class for JObservable.
 *
 * @package Joomla.UnitTest
 * @subpackage HTML
 * @since 11.3
 */
class JObservableInspector extends JObservable
{
	/**
	* Method for inspecting protected variables.
	*
	* @return mixed The value of the class variable.
	*/
	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
			trigger_error('Undefined or private property: ' . __CLASS__.'::'.$name, E_USER_ERROR);
			return null;
		}
	}

	/**
	* Sets any property from the class.
	*
	* @param string $property The name of the class property.
	* @param string $value The value of the class property.
	*
	* @return void
	*/
	public function __set($property, $value)
	{
		$this->$property = $value;
	}

	/**
	 * Calls any inaccessible method from the class.
	 *
	 * @param string 	$name Name of the method to invoke
	 * @param array 	$parameters Parameters to be handed over to the original method
	 *
	 * @return mixed The return value of the method
	 */
	public function __call($name, $parameters = false)
	{
		return call_user_func_array(array($this,$name), $parameters);
	}
}

/**
 * Test class for JObservable.
 * Generated by PHPUnit on 2009-10-08 at 11:45:30.
 */
class JObservableTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var	JObservable
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new JObservableInspector;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
	}

	/**
	 * Test for JObservable::getState()
	 *
	 * @covers  JObservable::getState
	 */
	public function testGetState() {
		$this->object->_state = 'test1';

		$this->assertThat(
			$this->object->getState(),
			$this->equalTo('test1')
		);
	}

	/**
	 * @todo Implement testNotify().
	 *
	 * @covers  JObservable::notify
	 */
	public function testNotify() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');

		$obj1 = new JObserverMock($this->object);
		$obj2 = new JObserverMock($this->object);
		$obj2->name = 'JObserverMock2';
		$this->object->_observers = array($obj1, $obj2);

		$this->assertThat(
			$this->object->notify(),
			$this->equalTo(array('JObserverMock', 'JObserverMock2'))
		);
	}

	/**
	 * @todo Implement testAttach().
	 *
	 * @covers  JObservable::attach
	 */
	public function testAttach() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}

	/**
	 * @todo Implement testDetach().
	 *
	 * @covers  JObservable::detach
	 */
	public function testDetach() {
		// Remove the following lines when you implement this test.
		$this->markTestIncomplete('This test has not been implemented yet.');
	}
}

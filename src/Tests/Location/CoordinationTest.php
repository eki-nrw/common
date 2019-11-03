<?php
/**
 * This file is part of the Eki-NRW package.
 *
 * (c) Ekipower
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */ 

namespace Eki\NRW\Common\Tests\Location;

use Eki\NRW\Common\Location\Coordination;
use Eki\NRW\Common\Location\CoordinateValidatorInterface;

use PHPUnit\Framework\TestCase;

class CoordinationTest extends TestCase
{
    public function testConstructorNoValidator()
    {
    	$type = "a_coordination_type";
    	$coordination = $this->getMockBuilder(Coordination::class)
    		->setConstructorArgs(array(
    			"a_coordination_type", 
    			$this->randomArray("abcdefghij", "abcdefghijklmn")
    		))
    		->getMock()
    	;
    }

	/**
	* @dataProvider goodDataProvide
	* 
	*/
    public function testConstructorWithValidator($coordinates, $validatorPattern)
    {
    	$coordination = $this->getMockBuilder(Coordination::class)
    		->setConstructorArgs(array(
    			"a_coordination_type", 
    			$coordinates,
    			$this->getValidator($validatorPattern)
    		))
    		->getMock()
    	;
    }

	/**
	* @dataProvider wrongDataProvide
	* @expectedException \InvalidArgumentException
	*/
    public function testConstructorWithValidatorWrong($coordinates, $validatorPattern)
    {
    	$coordination = $this->getMockBuilder(Coordination::class)
    		->setConstructorArgs(array(
    			"a_coordination_type", 
    			$coordinates,
    			$this->getValidator($validatorPattern)
    		))
    		->getMockForAbstractClass()
    	;
    }
    
    public function goodDataProvide()
    {
		return [
			[
				[
					'street' => 'Le Van Luong',
					'postCode' => '700000'
				],
				[
					'type' => 'a_coordination_type',
					'street' => 'string',
					'postCode' => 'integer'
				]
			],
			[
				[
					'firstName' => 'Nguyen',
					'middleName' => 'Van',
					'LastName' => 'Minh',
					'age' => 50,
				],
				[
					'type' => 'a_coordination_type',
					'firstName' => 'string',
					'middleName' => 'string',
					'LastName' => 'string',
					'age' => 'integer',
				]
			]
		];
	}

    public function wrongDataProvide()
    {
		return [
			[
				[
					'street' => 'Le Van Luong',
					'postCode' => '700000'
				],
				[
					'type' => 'a_coordination_type',
					'street' => 'string__a',
					'postCode' => 'integer__x'
				]
			],
			[
				[
					'firstName' => 'Nguyen',
					'middleName' => 'Van',
					'LastName' => 'Minh',
					'age' => 50,
				],
				[
					'type' => 'a_coordination_type',
					'firstName' => 'string_a',
					'middleName' => 'string_m',
					'LastName' => 'string_p',
					'age' => 'integer_c',
				]
			]
		];
	}
    
    private function getValidator(array $patt)
    {
		$validator = $this->getMockBuilder(CoordinateValidatorInterface::class)
			->setMethods(['validateCoordinate', 'validateCoordinateFailed'])
			->getMockForAbstractClass()
		;
		
		$validator
			->expects($this->any())
			->method('validateCoordinate')
			->will($this->returnCallback( function ($key, $coordinate, $type) use ($patt, $validator) {
				if ($patt['type'] !== $type)
					$validator->validateCoordinateFailed();
				if (!array_key_exists($key, $patt) or gettype($coordinate) !== $patt[$key])
					$validator->validateCoordinateFailed();
			}))
		;
		
		$validator
			->expects($this->any())
			->method('validateCoordinateFailed')
			->will($this->throwException(new \InvalidArgumentException()))
		;
		
		
		return $validator;
	}
    
    private function randomArray($pattKey, $pattValue, $maxNumKeys = 30)
    {
    	$randKey = function ($patternStr) {
			return substr(str_shuffle($patternStr), 0, rand(1, strlen($patternStr)));
		};
    	
    	$arr = [];
		$numKeys = rand(1, $maxNumKeys);
		echo "numKey=" . $numKeys . "\n";
		for($i=0;$i<$numKeys;$i++)
		{
			$numberOfString = rand(0,1);
			$key = $randKey($pattKey);
			if ($numberOfString == 0)
				$val = $randKey($pattValue);
			else
				$val = rand(0, 9999);

			$arr[$key] = $val; 
			
			echo $key . "=" . $val . "\n";
		}	
		
		return $arr;
	}
}

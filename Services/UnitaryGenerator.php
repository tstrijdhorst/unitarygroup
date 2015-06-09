<?php

namespace Services;

/**
 * User: Tim Strijdhorst
 * Project: Unitary Group Calculator
 * Date: 9-6-15
 * Time: 16:30
 */

class UnitaryGenerator
{
	private $baseNumber;
	private $numberList;
	private $relativePrimes;

	public function __construct($baseNumber)
	{
		$this->baseNumber = $baseNumber;
		$this->relativePrimes = [1];
	}

	/**
	 * Generates and returns the array of numbers smaller than and relative prime to the basenumber
	 *
	 * @return array
	 */
	public function generate()
	{
		//Enumerate all the numbers before baseNumber, this is not good for large baseNumbers obviously
		$this->initialize();

		//Now for the magic : D Lets find all the relative primes
		for ($i=0;$i<count($this->numberList);$i++) {
			$number = $this->numberList[$i];
			if ($number !== null && $this->baseNumber % $number == 0) {
				//$i is a divider, so lets cross off all the multiples of the dividers as well
				for ($a=$i;$a<$this->baseNumber;$a+=$number) {
					$this->numberList[$a] = null;
				}
			}
		}

		foreach ($this->numberList as $rPrime) {
			if ($rPrime !== null) {
				$this->relativePrimes[] = $rPrime;
			}
		}

		return $this->relativePrimes;
	}

	/**
	 * Initialize the numberlist with all the integers smaller than the baseNumber
	 */
	private function initialize()
	{
		$this->numberList = [];
		for ($i=2;$i<$this->baseNumber;$i++) {
			$this->numberList[] = $i;
		}
	}
}
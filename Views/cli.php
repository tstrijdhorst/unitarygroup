<?php

include('../Services/UnitaryGenerator.php');
/**
 * User: Tim Strijdhorst
 * Project: Unitary Group Calculator
 * Date: 9-6-15
 * Time: 16:30
 */

if ($argc <= 1) {
	die('Usage: '.$argv[0].' <N> to generate the output for U(N)');
}

$baseNumber = $argv[1];
$generator = new \Services\UnitaryGenerator($baseNumber);
$uGroup = $generator->generate();

echo 'U('.$baseNumber.') = {'.implode($uGroup,',').'}';
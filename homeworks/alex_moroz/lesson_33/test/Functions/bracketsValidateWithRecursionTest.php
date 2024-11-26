<?php

require_once '../../Functions/bracketsValidateWithRecursion.php';
require_once 'bracketsTestData.php';

testFunctionBasketsValidateWithRecursion();

function testFunctionBasketsValidateWithRecursion(): void
{
    foreach (createTestData() as $testData) {
        $strokeToCheck = $testData['stroke'];
        $actualResult = isBalancedWithRecursion($strokeToCheck);
        $expectedResult = $testData['expectedResult'];
        assert($actualResult === $expectedResult, "Validation failed for stroke: $strokeToCheck.");
    }
}
<?php

require_once '../../Functions/bracketsValidate.php';
require_once 'bracketsTestData.php';

testFunctionBasketsValidate();

function testFunctionBasketsValidate(): void
{
    foreach (createTestData() as $testData) {
        $strokeToCheck = $testData['stroke'];
        $actualResult = isBalanced($strokeToCheck);
        $expectedResult = $testData['expectedResult'];
        assert($actualResult === $expectedResult, "Validation failed for stroke: $strokeToCheck.");
    }
}
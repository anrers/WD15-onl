<?php

require_once '../../Functions/calculateDigitSum.php';

testFunctionCalculateDigitSum();

function testFunctionCalculateDigitSum(): void
{
    foreach (createSumTestData() as $testData) {
        $numberToCheck = $testData['number'];
        $actualResult = calculateDigitSum($numberToCheck);
        $expectedResult = $testData['expectedResult'];
        assert($actualResult === $expectedResult, "Validation failed for number: $numberToCheck.");
    }
}

/**
 * Create array with test data.
 *
 * @return array with test data
 */
function createSumTestData(): array
{
    $arrayWithNumberAndExpectedResult = [];
    addTestData($arrayWithNumberAndExpectedResult, 123, 6);
    addTestData($arrayWithNumberAndExpectedResult, -123, 6);
    addTestData($arrayWithNumberAndExpectedResult, 1, 1);
    addTestData($arrayWithNumberAndExpectedResult, -5, 5);
    addTestData($arrayWithNumberAndExpectedResult, 5.5, 5);
    addTestData($arrayWithNumberAndExpectedResult, 12.5, 3);
    addTestData($arrayWithNumberAndExpectedResult, 12345, 15);
    addTestData($arrayWithNumberAndExpectedResult, 123456789, 45);
    addTestData($arrayWithNumberAndExpectedResult, '0123456789', 45);
    addTestData($arrayWithNumberAndExpectedResult, true, 1);
    addTestData($arrayWithNumberAndExpectedResult, false, 0);

    return $arrayWithNumberAndExpectedResult;
}

/**
 * Add to given array password and expected validation result for given password.
 *
 * @param $array          array which be filled in with test data
 * @param $number         int to calculate
 * @param $expectedResult int expected result for given number
 */
function addTestData(array &$array, int $number, int $expectedResult): void {
    $array[] = [
        'number' => $number,
        'expectedResult' => $expectedResult,
    ];
}
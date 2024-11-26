<?php

/**
 * Create array with test data.
 *
 * @return array with test data
 */
function createTestData(): array
{
    $arrayWithStrokeAndExpectedResult = [];
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "{}");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "{}()[]");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "{}[]()");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "{{({[]})}}");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "(){{([])}[]}[]");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "(5 + 3) * (1 + 2)");
    addTestDataToArray($arrayWithStrokeAndExpectedResult, 'text([key:value]{object(text)( ) 44 }%%)');
    addTestDataToArray($arrayWithStrokeAndExpectedResult, "({9)", false);
    addTestDataToArray($arrayWithStrokeAndExpectedResult, '()({{}[}])', false);

    return $arrayWithStrokeAndExpectedResult;
}

/**
 * Add to given array password and expected validation result for given password.
 *
 * @param $array          array which be filled in with test data
 * @param $stroke         string to check
 * @param $expectedResult bool expected result for given number
 */
function addTestDataToArray(array &$array, string $stroke, bool $expectedResult = true): void {
    $array[] = [
        'stroke' => $stroke,
        'expectedResult' => $expectedResult,
    ];
}
<?php

/**
 * Validate password. Password should contain:
 * 1. 8 - 16 symbols;
 * 2. letters and digits, at least 1 capital (upper case) letter;
 * 3. at least 2 special characters from list ?:%!()*+=_;
 * 4. without whitespace
 *
 * @param string $password stoke to validate
 * @return bool true - if password match to the rules, otherwise - false
 */
function validatePassword(string $password): bool
{
    $regex = "#^(?=.*?[?:%!()*+=_].*?[?:%!()*+=_])(?=.*[A-Z])[0-9a-zA-Z?:%!()*+=_\S]{8,16}$#"; //(?=[^\s*]) not necessary to add
    return preg_match($regex, $password);
}


function testFunctionValidatePassword(){
    foreach (createTestData() as $passwordData)
    {
        $passwordToCheck = $passwordData['password'];
        $actualResult = validatePassword($passwordToCheck);
        $expectedResult = $passwordData['expectedResult'];
        assert($actualResult === $expectedResult, "Validation failed for password: $passwordToCheck.");
    }
}

/**
 * Create array with test data.
 *
 * @return array with test data
 */
function createTestData(): array
{
    $arrayWithPasswordsAndExpectedResult = [];
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "4%loGin_4234");
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "LOGIN!4234*");
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "L?:%!()*+=_!1");
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "(P1234567)");
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "!Password_");
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "!%Password");
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "?:%!()*+=_", false); //only special symbols
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, " loGin_4234", false); //whitespace in the start
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "loGin!_4234 ", false); //whitespace in the end
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "loGin! 4234", false); //whitespace in the middle
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "login!_4234", false); //doesn't have at least one capital letter
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "123!_4234", false); //doesn't have at least one capital letter
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "loGin4234", false); //doesn't have special symbols
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "loGin4234!", false); //only one special symbol
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "loG34!*", false); //less than 8 symbols
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "loGin4234?:%!()*+=_", false); //longer than 16 symbols
    addTestDataToArray($arrayWithPasswordsAndExpectedResult, "!Password_ L%", false); //whitespace in the middle

    return $arrayWithPasswordsAndExpectedResult;
}

/**
 * Add to given array password and expected validation result for given password.
 *
 * @param $array array which be filled in with test data
 * @param $password string to validate
 * @param $expectedResult bool expected validation result for given password
 */
function addTestDataToArray(array &$array, string $password, bool $expectedResult = true)
{
    $array[] = [
        'password' => $password,
        'expectedResult' => $expectedResult
    ];
}

testFunctionValidatePassword();
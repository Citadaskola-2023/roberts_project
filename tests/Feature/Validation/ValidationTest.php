<?php

test('passwords are validated as expected', function (string $password, bool $result) {
    $validator = new \App\Validation\PasswordValidator();
    $validator->addRule(new \App\Validation\Rule\MinLengthRule(8));
    $validator->addRule(new \App\Validation\Rule\MaxLengthRule(32));
    $validator->addRule(new \App\Validation\Rule\ContainsDigits());
    $validator->addRule(new \App\Validation\Rule\ContainsSpecialCharacter());

    expect($validator->isValid($password))->toBe($result);
})->with([
    'too short' => ['tomato', false],
    'too long' => ['tomatotomatotomatotomatotomatotomato', false],
    'does not contain digits' => ['tomatotomato', false],
    'does not contain spec char' => ['tomatotomato', false],
    'has everything needed' => ['IL0veTomato!', true]
]);
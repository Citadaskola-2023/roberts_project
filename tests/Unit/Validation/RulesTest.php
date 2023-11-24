<?php

test('eight char password is valid with min length rule', function () {
    $rule = new \App\Validation\Rule\MinLengthRule(8);
    expect($rule->validate('12345678'))->toBeTrue();
});

test('that shorter password fails with min length rule', function () {
    $rule = new \App\Validation\Rule\MinLengthRule(4);
    expect($rule->validate('123'))->toBeFalse();
});

test('eight char password is valid with max length rule', function () {
    $rule = new \App\Validation\Rule\MaxLengthRule(8);
    expect($rule->validate('555'))->toBeTrue();
});

test('that longer password fails with max length rule', function () {
    $rule = new \App\Validation\Rule\MaxLengthRule(5);
    expect($rule->validate('wjlqwuudqgwydgqoyiw'))->toBeFalse();
});

test('special character rule', function(string $password, bool $result) {
    $rule = new \App\Validation\Rule\ContainsSpecialCharacter();
    expect($rule->validate($password))->toBe($result);
})->with([
    ['123124', false],
    ['!!!test', true],
    ['HelloWorld:))', true],
]);
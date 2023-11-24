<?php

test('sum between two numbers', function () {
    $calc = new \App\Calc();

    expect($calc->add(2,3))->toBe(5);
});

test('difference between two numbers', function (int $a, int $b, int $res) {
    $calc = new \App\Calc();
    expect($calc->diff($a, $b))->toBe($res);
})->with([
    [4, 7, -3],
    [10, 4, 6],
    [-10, 4, -14],
]);

test('difference between two numbers - VECAIS', function () {
    $calc = new \App\Calc();
    expect($calc->diff(4, 7))->toBe(-3);
});
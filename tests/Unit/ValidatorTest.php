<?php 
use core\Validator;

test('it validate a string', function () {
    // arrange

  //  $result = Validator::string('foobar');
  expect(Validator::string('foobar'))->toBeTrue();
  expect(Validator::string(false))->toBeFalse();
  expect(Validator::string(""))->toBeFalse();
    //assert/expect
   // expect($result)->toBeTrue();
});

test('it validate a string with a minium character', function () {
    // arrange

  //  $result = Validator::string('foobar');
  expect(Validator::string('foobar', 20))->toBeFalse();

    //assert/expect
   // expect($result)->toBeTrue();
});
test('it validate an email', function () {
    // arrange

  //  $result = Validator::string('foobar');
  expect(Validator::string('foobar39@gmail.com'))->toBeTrue();

    //assert/expect
   // expect($result)->toBeTrue();
});

test('it check if a number is greater than', function () {
    // arrange

  //  $result = Validator::string('foobar');
  expect(Validator::greaterThan(10,1))->toBeTrue();
  expect(Validator::greaterThan(10,100))->toBefalse();

  // it would skip others that is up and test only this
})->only();
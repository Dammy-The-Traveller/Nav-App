<?php
use core\Container;

test('it can resolve something out of the container', function () {
    // arrange

    $container = new Container();

//     $container->bind('foo', function () {
// return 'foo';
//     });

    $container->bind('foo',  fn() => 'bar');

    //act
    $result = $container->resolve('foo');

    //assert/expect
    expect($result)->toEqual('bar');









  //  expect(true)->toBeTrue();
});

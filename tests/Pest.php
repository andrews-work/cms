<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different class or traits.
|
*/

pest()->extend(Tests\TestCase::class)
    ->in('guest', 'admin', 'client', 'employee', 'auth');
/*
|--------------------------------------------------------------------------
| Expectation Extending
|--------------------------------------------------------------------------
|
| You can extend the expectations API for your custom matchers. For example:
| - `expect()->toBeOne()`, where `toBeOne` is a custom extension.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Expose helpers as global functions. These can be reused throughout your tests.
|
*/

function something()
{
    // ..
}

// -------------------------------------------
// Add custom test directories for Pest
// -------------------------------------------

// Define an array of your custom directories
$directories = ['admin', 'guest', 'auth', 'client', 'employee'];

// Loop through directories and configure Pest to use them
foreach ($directories as $directory) {
    pest()->in("tests/{$directory}/*");
}

// If you need to change the default test case or add additional traits globally,
// you can also do that here.

<?php

// guest

it('success - home', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('success - contact', function () {
    $response = $this->get('/contact');

    $response->assertStatus(200);
});

it('success - about', function () {
    $response = $this->get('/about');

    $response->assertStatus(200);
});

it('success - register', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

it('success - login', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('success - forgot', function () {
    $response = $this->get('/forgot');

    $response->assertStatus(200);
});

// auth

it('fail - profile', function () {
    $response = $this->get('/profile');

    $response->assertStatus(302);
});

// client

it('fail - client dashboard ', function () {
    $response = $this->get('/client/dashboard');

    $response->assertStatus(302);
});

it('fail - client messages ', function () {
    $response = $this->get('/client/messages');

    $response->assertStatus(302);
});

it('fail - client tasks', function () {
    $response = $this->get('/client/tasks');

    $response->assertStatus(302);
});

it('fail - client meetings', function () {
    $response = $this->get('/client/meetings');

    $response->assertStatus(302);
});

// employee

it('fail - employee dashboard ', function () {
    $response = $this->get('/employee/dashboard');

    $response->assertStatus(302);
});

it('fail - employee messages ', function () {
    $response = $this->get('/employee/messages');

    $response->assertStatus(302);
});

it('fail - employee tasks', function () {
    $response = $this->get('/employee/tasks');

    $response->assertStatus(302);
});

it('fail - employee meetings', function () {
    $response = $this->get('/employee/meetings');

    $response->assertStatus(302);
});

// admin

it('fail - admin dashboard ', function () {
    $response = $this->get('/admin/dashboard');

    $response->assertStatus(302);
});

it('fail - admin messages ', function () {
    $response = $this->get('/admin/messages');

    $response->assertStatus(302);
});

it('fail - admin tasks', function () {
    $response = $this->get('/admin/tasks');

    $response->assertStatus(302);
});

it('fail - admin meetings', function () {
    $response = $this->get('/admin/meetings');

    $response->assertStatus(302);
});

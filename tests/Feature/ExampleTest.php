<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertRedirect('/login');
});

it('redirects the demo route to GitHub Pages', function () {
    $this->get('/demo')
        ->assertRedirect('https://buithang04.github.io/instagram-clone');
});

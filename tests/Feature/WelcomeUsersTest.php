<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    public function it_welcome_users_with_nickname()
    {
        $this->get('/greeting/lucas/glacius')
            ->assertStatus(200)
            ->assertSee("Welcome user Lucas your nickname is 'Glacius'.");
    }

    /** @test */
    public function it_welcome_users_without_nickname()
    {
        $this->get('/greeting/lucas')
            ->assertStatus(200)
            ->assertSee('Welcome user Lucas you have not nickname.');
    }
}

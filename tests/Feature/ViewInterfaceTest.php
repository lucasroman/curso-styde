<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewInterfaceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHeaderBar()
    {
        $this->get('/user/index')
            ->assertStatus(200)
            ->assertSee('New user')
            ->assertSee('User ID')
            ->assertSee('List users');
    }
}

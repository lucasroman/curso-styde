<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    public function it_load_users_list_page()
    {
        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('Users'); // Work too for substring of "Users" e.g. "rs"
    }

    /** @test */
    public function it_load_user_details_page()
    {
        $this->get('/user/5')
            ->assertStatus(200)
            ->assertSee("User's detail: 5");
    }

    /** @test */
    public function it_load_new_user_page()
    {
        $this->get('/user/new')
            ->assertStatus(200)
            ->assertSee('Create new user');
    }
}

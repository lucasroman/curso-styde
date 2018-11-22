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
        /* It only guarantees that the string "Users" will appear,
           but it will also pass with "bUsers" or "UsersSomething". */

        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('Users')
            ->assertSee('Sub-Zero')
            ->assertSee('Raiden')
            ->assertSee('Shang Tsung');
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

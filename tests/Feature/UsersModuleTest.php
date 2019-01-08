<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    public function it_load_users_page()
    {
       // Get the users page
       $response = $this->json('GET', 'user/index');
       // Get content from variable "users" in the view
       $users = $response->getOriginalContent()->getData()['users'];
       // Check if "/index" uri exist
       $users_view = $this->get('user/index')->assertStatus(200);

       if ($users) {
           /* It only guarantees that the string "Users" will appear,
              but it will also pass with "bUsers" or "UsersSomething". */
            $users_view->assertSee('Living Tower')
                ->assertSee('Lucas Roman');
        } else {
            $users_view->assertSee('There are not users.');
        }
    }

    /** @test */
    public function it_load_user_details_page()
    {
        $this->get('user/show/5')
            ->assertStatus(200)
            ->assertSee("User's details: 5");
    }

    /** @test */
    public function it_load_new_user_page()
    {
        $this->get('user/new')
            ->assertStatus(200)
            ->assertSee('Create new user');
    }
}

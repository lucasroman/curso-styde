<?php

namespace Tests\Feature;

use App\User;
use App\Profession;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    // Run migrations for test database (cursto_styde_tests) each time
    use RefreshDatabase;

    /** @test */
    public function it_load_users_page()
    {
        /* Create the first profession, the database for tests is empty
           so the for this profession is: id = 1 */
        Profession::create([
            'title' => 'Test profession',
        ]);

        factory(User::class)->create([
            'name' => 'Lucas Roman',
            'profession_id' => 1,
        ]);

        $this->get('user/index')
            ->assertSee('Living Tower')
            ->assertSee('Lucas Roman');
    }

    /** @test */
    public function user_list_empty()
    {
        $this->get('user/index')
            ->assertStatus(200)
            ->assertSee('There are not users.');
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

<?php

namespace Tests\Feature;

use App\User;
use App\Profession;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    // Run migrations for test database (cursto_styde_tests) each time
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp(); // Necessary for setUp work!
        $this->profession = Profession::create([
                                'title' => 'Test profession fixture',
                            ]);

        $this->user = factory(User::class)->create([
            'name' => 'Test user fixture',
            'profession_id' => $this->profession->id,
        ]);

        $this->tables = ['users', 'professions'];
    }

    /** @test */
    public function it_load_users_page()
    {
        $this->get('users')
            ->assertSee('Living Tower')
            ->assertSee('Test user fixture');
    }

    /** @test */
    public function user_list_empty()
    {
        // Delete all tables for check empty message
        DB::statement('SET foreign_key_checks=0');
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET foreign_key_checks=1');

        $this->get('users')
            ->assertStatus(200)
            ->assertSee('There are not users.');
    }

    /** @test */
    public function it_load_user_details()
    {
        $this->get('users/' . $this->user->id)
            ->assertStatus(200)
            ->assertSee($this->user->name)
            ->assertSee($this->user->email)
            ->assertSee($this->user->profession->title);
    }

    /** @test */
    public function it_display_error_404_if_user_not_found()
    {
        $this->get('users/10000')
            ->assertStatus(404)
            ->assertSee('Page not found');
    }

    /** @test */
    public function it_create_a_new_user()
    {
        $this->post('users', [
            'name' => 'John Doe',
            'email' => 'jdoe@example.com',
            'password' => '123',
            'profession_id' => $this->profession->id,
        ])->assertRedirect(route('users.index'));

        $this->assertCredentials([
            'name' => 'John Doe',
            'email' => 'jdoe@example.com',
            'password' => '123',
        ]);
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'name' => '',
                'email' => 'jdoe@example.com',
                'password' => '123',
                'profession_id' => $this->profession->id,
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['name' => 'The name field is required.']);

        $this->assertDatabaseMissing('users', [
            'email' => 'jdoe@example.com',
        ]);
    }
}

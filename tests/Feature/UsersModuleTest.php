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
            'email' => 'userfixture@example.com',
            'password' => bcrypt('123456'), // Password min: 6 characters
            'profession_id' => $this->profession->id,
        ]);

        $this->user2 = factory(User::class)->create([
            'name' => 'Tes user fixture 2',
            'email' => 'user2@fixture.com',
            'password' => 'user2pass',
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
            'password' => '123456', // Password min: 6 characters
            'profession_id' => $this->profession->id,
        ])->assertRedirect(route('users.index'));

        $this->assertCredentials([
            'name' => 'John Doe',
            'email' => 'jdoe@example.com',
            'password' => '123456',
        ]);
    }

    /** @test */
    public function the_name_is_required()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'name' => '',
            ])
            ->assertRedirect(route('users.create'))
            /* Is not necessary to specific the message asociated if you use
               the default message (see the test for email required) */
            ->assertSessionHasErrors(['name' => 'The name field is required.']);

        $this->assertDatabaseMissing('users', [
            'email' => 'jdoe@example.com',
        ]);
    }

    /** @test */
    public function the_email_is_required()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'email' => '',
            ])
            ->assertRedirect(route('users.create'))
            /* Is not necessary to specify a message if you use the default
               message */
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'email' => '',
        ]);
    }

    /** @test */
    public function the_password_is_required()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'password' => '',
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password']);

        $this->assertDatabaseMissing('users', [
            'email' => 'jdoe@example.com',
        ]);
    }

    /** @test */
    public function the_email_must_be_valid()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'email' => 'invalidEmail',
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Test user',
        ]);
    }

    /** @test */
    public function the_email_must_be_unique()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'email' => 'userfixture@example.com',
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);

        $this->assertEquals(2, User::count());
    }

    /** @test */
    public function the_password_must_be_greater_or_equal_to_six()
    {
        $this->from(route('users.create'))
            ->post('users', [
                'password' => 'less6', // Invalid password (shorter length 6)
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function it_load_the_edit_user_page()
    {
        $this->get("users/{$this->user->id}/edit")
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Edit user')
            ->assertViewHas('user');
    }

    /** @test */
    function it_update_a_user()
    {
        $this->put("users/{$this->user->id}", [
            'name' => 'Update name',
            'email' => 'updatedemail@something.com',
            'password' => '123456',
        ])->assertRedirect(route('users.show', ['user' => $this->user]));

        $this->assertCredentials([
            'name' => 'Update name',
            'email' => 'updatedemail@something.com',
            'password' => '123456',
        ]);
    }

    /** @test */
    function the_name_is_required_when_updating_a_user()
    {
        $this->from("users/{$this->user->id}/edit")
            ->put("users/{$this->user->id}", [
                'name' => '',
        ])->assertRedirect("users/{$this->user->id}/edit")
        ->assertSessionHasErrors(['name' => 'The name field is required.']);

        $this->assertDatabaseMissing('users',
            ['email' => 'updatedemail@something.com']);
    }

    /** @test */
    public function the_email_must_be_valid_when_updating()
    {
        $this->from("users/{$this->user->id}/edit")
            ->put("users/{$this->user->id}", [
                'name' => 'Name edited',
                'email' => 'invalidemail',
                'password' => '123456',
        ])->assertRedirect(route('users.edit', ['user' => $this->user]))
        ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users',
            ['name' => 'Name edited']);
    }

    /** @test */
    public function the_email_must_be_unique_when_updating()
    {
        // If try assign the email of user2 to user1 should back to update view
        $this->from("users/{$this->user->id}/edit")
            ->put("users/{$this->user->id}", [
                'email' => 'user2@fixture.com',
            ])
            ->assertRedirect(route('users.edit', ['user' => $this->user]))
            ->assertSessionHasErrors(['email']);

            $this->assertEquals(2, User::count());
    }

    /** @test */
    public function the_password_is_optional_when_updating()
    {
        $this->from("users/{$this->user->id}/edit")
            ->put("users/{$this->user->id}", [
                'name' => 'Same name',
                'email' => 'sameEmail@example.com',
                'password' => '',  // This is the only attribute changed
            ])
            ->assertRedirect(route('users.show', ['user' => $this->user]));

        $this->assertCredentials([
            'name' => 'Same name',
            'email' => 'sameEmail@example.com',
            'password' => '123456',
        ]);
    }

    /** @test */
    public function the_email_can_stay_same_when_updating()
    {
        $this->from("users/{$this->user->id}/edit")
            ->put("users/{$this->user->id}", [
                'name' => 'New name',
                'email' => 'userfixture@example.com', // keep the same email
                'password' => '123456',
            ])
            ->assertRedirect(route('users.show', ['user' => $this->user]));

        $this->assertDatabaseHas('users', [
            'name' => 'New name',
            'email' => 'userfixture@example.com',
        ]);
    }

    /** @test */
    public function it_delete_a_user()
    {
        $this->delete("users/{$this->user->id}")
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $this->user->id,
        ]);
        // To do same that the previous test
        $this->assertSame(1, User::count());
    }
}

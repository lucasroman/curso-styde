<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;

class LanguageTest extends TestCase
{
    public function testTheLanguageShoudChange()
    {
        // Test using index view
        // Default language is english
        $this->get(route('users.index'))
            ->assertSee('Living Tower');

        // Click to spanish language and redirect to the same view
        $this->get(route('language', 'es'))
            ->assertRedirect(route('users.index'));

        // Check that language changed to spanish
        $this->get(route('users.index'))
            ->assertSee('Torre Viviente');
    }

    public function testTheApplicationShouldRememberTheLanguageSelected()
    {
        $this->get(route('users.create'))
            ->assertSee('New user');

        $this->get(route('language', 'de'))
            ->assertRedirect(route('users.create'));

        /* Surf to other view for check that application remember the language
           selected */
        $this->get(route('users.index'))
            ->assertSee('Lebender Turm');
    }
}

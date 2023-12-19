<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = \App\Models\User::factory()
            ->create();

        $user
            ->addMedia(resource_path('dummy.pdf'))
            ->preservingOriginal()
            ->toMediaCollection();

        $this->assertNotNull($user->getFirstMediaUrl(conversionName: 'preview'));
    }
}

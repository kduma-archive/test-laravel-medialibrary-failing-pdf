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

        $path = $user->getFirstMediaPath(conversionName: 'preview');

        [$width, $height] = getimagesize($path);

        $this->assertEquals(300, $width, 'The width of the conversion is not 300px.');
        $this->assertEquals(300, $height, 'The height of the conversion is not 300px.');
    }
}

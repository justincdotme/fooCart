<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAuthTest extends TestCase
{
    /**
     * Test that our customized post-login redirect works.
     * Note: we aren't testing any of the other login and registration methods here because
     * we are using the Laravel UI package's built in functionality, which is already tested.
     *
     * @test
     */
    public function it_redirects_authenticated_standard_users_to_home_route()
    {
        $user = User::factory()->make();
        $this->be($user);
        $response = $this->get('/login');

        $response->assertStatus(302);
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}

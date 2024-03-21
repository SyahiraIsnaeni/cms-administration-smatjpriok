<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLogin()
    {
        $this->get('/login')
            ->assertSeeText("Login Admin SMA Tanjung Priok");
    }

    public function testLoginSuccess()
    {
        $this->post('/login')
            ->assertSeeText("Login Admin SMA Tanjung Priok");
    }

}

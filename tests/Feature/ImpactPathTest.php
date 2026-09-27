<?php
namespace Tests\Feature;
use Tests\TestCase;
class ImpactPathTest extends TestCase { public function test_home_page_is_reachable(): void { $this->get('/')->assertOk(); } public function test_demo_login_endpoint_exists(): void { $this->post('/login',['email'=>'demo@impactpath.test','password'=>'password'])->assertRedirect('/dashboard'); } }

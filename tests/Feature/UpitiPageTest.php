<?php

namespace Tests\Feature;

use Tests\TestCase;

class UpitiPageTest extends TestCase
{
    public function test_admin_upiti_page_exists(): void
    {
        $response = $this->get('/admin/upiti');
        $response->assertStatus(302);
    }
}

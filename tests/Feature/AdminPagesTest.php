<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminPagesTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\Test]
    public function admin_zadaci_page_exists()

    {
        $response = $this->get('/admin/zadaci');
        $response->assertStatus(302);
    }

    /** @test */
    public function admin_molbe_page_exists()
    {
        $response = $this->get('/admin/molbe');
        $response->assertStatus(302);
    }
    public function admin_upiti_page_exists()

    {
        $response = $this->get('/admin/upiti');
        $response->assertStatus(302);
    }
    
}

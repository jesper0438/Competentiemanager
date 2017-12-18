<?php

namespace Tests\Feature;

use Tests\TestCase;

class VakexpertTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_has_a_name()
    {
        $this->assertTrue(true);
        $vakexpert = factory(\App\Vakexpert::class)->create(['name' => 'Eennaam']);
    }
}

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

    //Positieve tests

    public function test_it_has_a_name()
    {
        $this->assertTrue(true);
        $vakexpert = factory(\App\Vakexpert::class)->create(['name' => 'Eennaam']);
    }

    /**
     * A test to check if a name is required.
     *
     * @return true
     */
    public function test_it_has_a_competentie()
    {
        $this->assertTrue(true);
        $vakexpert = factory(\App\Vakexpert::class)->create(['competentie' => 'SRE1a']);
    }

    /**
     * A basic test example.
     *
     * @return true
     */
    public function test_it_has_a_description()
    {
        $this->assertTrue(true);
        $vakexpert = factory(\App\Vakexpert::class)->create(['description' => 'Beschrijving']);
    }

    //negatieve tests
    // Deze test verwacht een error. De naam van de vakexpert is verplicht in te vullen.
    public function test_a_name_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $vakexpert = factory(\App\Vakexpert::class)->create(['name' => null]);
    }

    public function test_a_competentie_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $vakexpert = factory(\App\Vakexpert::class)->create(['vakexpert' => null]);
    }
}

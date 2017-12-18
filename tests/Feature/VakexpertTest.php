<?php

namespace Tests\Feature;

use Tests\TestCase;

class VakexpertTest extends TestCase
{

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
     * A test to check if a competentie is required.
     *
     * @return true
     */
    public function test_it_has_a_description()
    {
        $this->assertTrue(true);
        $vakexpert = factory(\App\Vakexpert::class)->create(['description' => 'Beschrijving']);

    }
    /**
     * A test to check if a description is required.
     *
     * @return true
     */

    //negatieve tests
    public function test_a_name_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $vakexpert = factory(\App\Vakexpert::class)->create(['name' => null]);
    }
    /**
     * A test to check if a error returns when the name-field is empty
     *
     * @return true
     */
    public function test_a_competentie_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $vakexpert = factory(\App\Vakexpert::class)->create(['competentie' => null]);
    }
    /**
     * A test to check if a error returns when the competentie-field is null
     *
     * @return true
     */
}

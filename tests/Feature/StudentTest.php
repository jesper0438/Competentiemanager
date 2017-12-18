<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function test_it_has_an_id()
    {
        $unit = factory(\App\Student::class)->create();
        $this->assertGreaterThan(0, $unit->id);
    }

    /**
     * A test to check if a id is required.
     *
     * @return true
     */
    public function test_it_has_a_name()
    {
        $student = factory(\App\Student::class)->create(['name' => 'name']);
        $this->assertEquals('name', $student->name);
    }
    /**
     * A test to check if a name is required.
     *
     * @return true
     */
    public function test_it_has_a_email()
    {
        $student = factory(\App\Student::class)->create(['email' => 'name@name.nl']);
        $this->assertEquals('name@name.nl', $student->email);
    }
    /**
     * A test to check if a email is required.
     *
     * @return true
     */

    //Negatieve tests

    public function test_a_name_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $student = factory(\App\Student::class)->create(['name' => null]);
    }
    /**
     * A test to check if a error popup's when you don't fill in the name field.
     *
     * @return true
     */

    public function test_a_amountec_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $student = factory(\App\Student::class)->create(['amountec' => null]);
    }
    /**
     * A test to check if a error returns when you don't fill in the amountec
     *
     * @return true
     */
    // Positieve tests
    public function test_amount_ec_is_required()
    {
        $this->assertTrue(true);
        $student = factory(\App\Student::class)->create(['amountec' => 'genoeg']);
    }

    public function test_currentproject_ec_is_required()
    {
        $this->assertTrue(true);
        $student = factory(\App\Student::class)->create(['currentproject' => 'De competentiemanager']);
    }

    public function test_currentcompetenties_ec_is_required()
    {
        $this->assertTrue(true);
        $student = factory(\App\Student::class)->create(['currentcompetenties' => 'SRE2A']);
    }
}

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

    //Deze test kijkt of er daardwerkelijk een naam is ingevuld
    public function test_it_has_a_name()
    {
        $student = factory(\App\Student::class)->create(['name' => 'name']);
        $this->assertEquals('name', $student->name);
    }

    //Test die controleert of een email-adres succesvol in de db geplaatst is
    public function test_it_has_a_email()
    {
        $student = factory(\App\Student::class)->create(['email' => 'name@name.nl']);
        $this->assertEquals('name@name.nl', $student->email);
    }

    //Negatieve tests
    // Deze test verwacht een error. Naam is verplicht in te vullen
    public function test_a_name_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $student = factory(\App\Student::class)->create(['name' => null]);
    }

    //Deze test verwacht een error, omdat het veld 'amountec' required is in de controller. Negatieve test
    public function test_a_amountec_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $student = factory(\App\Student::class)->create(['amountec' => null]);
    }

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

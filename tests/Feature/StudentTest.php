<?php

namespace Tests\Feature;

use App\Student;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function testit_has_an_id()
    {
        $unit = factory(\App\Student::class)->create();
        $this->assertGreaterThan(0, $unit->id);
    }

      // Deze test verwacht een error. Naam is verplicht in te vullen
    function test_a_name_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $student = factory(\App\Student::class)->create(['name' => null]);
    }
    
    //Deze test kijkt of er daardwerkelijk een naam is ingevuld
    function test_it_has_a_name()
    {
        $student = factory(\App\Student::class)->create(['name' => 'name']);
        $this->assertEquals('name', $student->name);
    }
     function test_it_has_a_email()
    {
        $student = factory(\App\Student::class)->create(['email' => 'name@name.nl']);
        $this->assertEquals('name@name.nl', $student->email);
    }
    //Deze test verwacht een error, omdat het veld 'amountec' required is in de controller
     function test_a_amountec_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $student = factory(\App\Student::class)->create(['amountec' => null]);
    }
}

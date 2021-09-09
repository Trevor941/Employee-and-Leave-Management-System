<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleInsertTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    Public function a_exampleinsert_can_be_added()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/exampleInsert', [
            'title' => 'John Deo',
            'address' => 'Nepal, Kathmandu'
        ]);

        $response->assertOk();
        $this->assertCount(1, Example::all());
         }
}

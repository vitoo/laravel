<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function basic_test()
    {
        $this->get(route('home'))->assertSuccessful();
    }
}

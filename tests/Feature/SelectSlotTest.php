<?php

namespace Shirish71\LaravelFormComponents\Tests\Feature;

use Shirish71\LaravelFormComponents\Tests\TestCase;

class SelectSlotTest extends TestCase
{
    /** @test */
    public function it_shows_the_slot_if_the_options_are_empty()
    {
        $this->registerTestRoute('select-slot');

        $this->visit('/select-slot')
            ->seeElement('option[value="a"]')
            ->seeElement('option[value="b"]')
            ->seeElement('option[value="c"]');
    }
}

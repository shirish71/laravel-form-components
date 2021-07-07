<?php

namespace Shirish71\LaravelFormComponents\Tests\Feature;

use Livewire\Component;
use Livewire\Livewire;
use Shirish71\LaravelFormComponents\Tests\TestCase;

class FormComponent extends Component
{
    public $input        = 'a';
    public $textarea     = 'b';
    public $select       = 'c';
    public $multi_select = ['d','e'];
    public $checkbox     = true;
    public $radio        = true;

    public function submit()
    {
        $this->validate([
            'input'        => ['required'],
            'textarea'     => ['required'],
            'select'       => ['required', 'in:c'],
            'multi_select' => ['required'],
            'checkbox'     => ['required', 'accepted'],
            'radio'        => ['required', 'accepted'],
        ]);
    }

    public function render()
    {
        return view('livewire-form');
    }
}

class FormComponentWithModifier extends FormComponent
{
    public function render()
    {
        return view('livewire-form-lazy');
    }
}

class LivewireTest extends TestCase
{
    /** @test */
    public function it_can_validate_the_fields()
    {
        $component = Livewire::test(FormComponent::class);

        $component->assertSeeHtml('wire:model="input"')
            ->assertSeeHtml('wire:model="textarea"')
            ->assertSeeHtml('wire:model="select"')
            ->assertSeeHtml('wire:model="multi_select"')
            ->assertSeeHtml('wire:model="checkbox"')
            ->assertSeeHtml('wire:model="radio"');

        $component->set('input', '')
            ->set('textarea', '')
            ->set('select', '')
            ->set('multi_select', [])
            ->set('checkbox', false)
            ->set('radio', false)
            ->call('submit')
            ->assertSeeHtml('The input field is required')
            ->assertSeeHtml('The textarea field is required')
            ->assertSeeHtml('The select field is required')
            ->assertSeeHtml('The multi select field is required')
            ->assertSeeHtml('The checkbox must be accepted')
            ->assertSeeHtml('The radio must be accepted');
    }

    /** @test */
    public function it_can_add_a_modifier_to_the_wire_directive()
    {
        $component = Livewire::test(FormComponentWithModifier::class);

        $component->assertSeeHtml('wire:model.debounce.1000ms="input"')
            ->assertSeeHtml('wire:model.debounce.1000ms="textarea"')
            ->assertSeeHtml('wire:model.debounce.1000ms="select"')
            ->assertSeeHtml('wire:model.debounce.1000ms="multi_select"')
            ->assertSeeHtml('wire:model.debounce.1000ms="checkbox"')
            ->assertSeeHtml('wire:model.debounce.1000ms="radio"');

        $component->set('input', '')
            ->set('textarea', '')
            ->set('select', '')
            ->set('multi_select', [])
            ->set('checkbox', false)
            ->set('radio', false)
            ->call('submit')
            ->assertSeeHtml('The input field is required')
            ->assertSeeHtml('The textarea field is required')
            ->assertSeeHtml('The select field is required')
            ->assertSeeHtml('The multi select field is required')
            ->assertSeeHtml('The checkbox must be accepted')
            ->assertSeeHtml('The radio must be accepted');
    }
}

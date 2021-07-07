<?php

namespace Shirish71\TailwindForm\Components;

class FormLabel extends Component
{
    public string $label, $smallNote, $for;
    public bool $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $for, bool $required = false, string $label = '', $smallNote = '')
    {
        $this->for = $for;
        $this->label = $label;
        $this->required = $required;
        $this->smallNote = $smallNote;
    }
}

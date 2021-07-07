<?php

namespace Shirish71\LaravelFormComponents\Components;

use Shirish71\LaravelFormComponents\Traits\HandlesValidationErrors;
use Shirish71\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;

class FormInput extends Component
{
    use HandlesValidationErrors, HandlesDefaultAndOldValue;

    public string $name, $label, $type, $placeholder;

    public $value;

    public bool $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $type = 'text',
        bool $required = false,
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true,
        string $label = null,
        string $placeholder = ''
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->showErrors = $showErrors;
        $language ? $this->name = "{$name}[{$language}]" : "";
        $label ? $this->label = $label : $this->label = str_replace('_', ' ', ucfirst($name));
        $placeholder ? $this->placeholder = $placeholder : $this->placeholder = "Please enter {$this->label}";
        $this->required = $required;
        $this->setValue($name, $bind, $default, $language);
    }
}

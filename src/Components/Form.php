<?php

namespace Shirish71\LaravelFormComponents\Components;

use Illuminate\View\View;
use Illuminate\Support\ViewErrorBag;

class Form extends Component
{
    public string $method, $action;

    public bool $spoofMethod = false;

    public bool $files = false, $file = false, $successMessage = false;

    public function __construct(
        string $method = 'POST',
        string $action = '#',
        bool $files = false,
        bool $file = false,
        bool $successMessage = false
    ) {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
        $this->method = $method;
        $this->files = $files;
        $this->file = $file;
        $this->action = $action;
        $this->successMessage = $successMessage;
    }


    public function hasError($bag = 'default'): bool
    {
        $errors = View::shared('errors', fn() => request()->session()->get('errors', new ViewErrorBag()));
        return $errors->getBag($bag)->isNotEmpty();
    }

}

<?php

use Shirish71\LaravelFormComponents\Components;

/*
 * You can place your custom package configuration in here.
 */
return [
    'prefix' => '',

    /** tailwind | tailwind-2 | bootstrap-4 */
    'framework' => 'tailwind',

    'components' => [
        'form' => [
            'view' => 'laravel-form-components::{framework}.form',
            'class' => Components\Form::class,
        ],
        'success-message' => [
            'view' => 'laravel-form-components::{framework}.form',
            'class' => Components\SuccessMessage::class,
        ],
        'form-error' => [
            'view' => 'laravel-form-components::{framework}.form-errors',
            'class' => Components\FormError::class,
        ],
        'form-input' => [
            'view' => 'laravel-form-components::{framework}.form-input',
            'class' => Components\FormInput::class,
        ],
        'form-label' => [
            'view' => 'laravel-form-components::{framework}.form-label',
            'class' => Components\FormLabel::class,
        ],

//        'form-checkbox' => [
//            'view' => 'laravel-form-components::{framework}.form-checkbox',
//            'class' => Components\FormCheckbox::class,
//        ],
//
//
//        'form-group' => [
//            'view' => 'laravel-form-components::{framework}.form-group',
//            'class' => Components\FormGroup::class,
//        ],
//
//
//
//        'form-radio' => [
//            'view' => 'laravel-form-components::{framework}.form-radio',
//            'class' => Components\FormRadio::class,
//        ],
//
//        'form-select' => [
//            'view' => 'laravel-form-components::{framework}.form-select',
//            'class' => Components\FormSelect::class,
//        ],
//
//        'form-submit' => [
//            'view' => 'laravel-form-components::{framework}.form-submit',
//            'class' => Components\FormSubmit::class,
//        ],
//
//        'form-textarea' => [
//            'view' => 'laravel-form-components::{framework}.form-textarea',
//            'class' => Components\FormTextarea::class,
//        ],
    ],
];

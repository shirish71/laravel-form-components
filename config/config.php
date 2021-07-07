<?php

use Shirish71\TailwindForm\Components;

/*
 * You can place your custom package configuration in here.
 */
return [
    'prefix' => '',

    /** tailwind | tailwind-2 | bootstrap-4 */
    'framework' => 'tailwind',

    'components' => [
        'form' => [
            'view' => 'tailwind-form::{framework}.form',
            'class' => Components\Form::class,
        ],
        'success-message' => [
            'view' => 'tailwind-form::{framework}.form',
            'class' => Components\SuccessMessage::class,
        ],
        'form-error' => [
            'view' => 'tailwind-form::{framework}.form-errors',
            'class' => Components\FormError::class,
        ],
        'form-input' => [
            'view' => 'tailwind-form::{framework}.form-input',
            'class' => Components\FormInput::class,
        ],
        'form-label' => [
            'view' => 'tailwind-form::{framework}.form-label',
            'class' => Components\FormLabel::class,
        ],

//        'form-checkbox' => [
//            'view' => 'tailwind-form::{framework}.form-checkbox',
//            'class' => Components\FormCheckbox::class,
//        ],
//
//
//        'form-group' => [
//            'view' => 'tailwind-form::{framework}.form-group',
//            'class' => Components\FormGroup::class,
//        ],
//
//
//
//        'form-radio' => [
//            'view' => 'tailwind-form::{framework}.form-radio',
//            'class' => Components\FormRadio::class,
//        ],
//
//        'form-select' => [
//            'view' => 'tailwind-form::{framework}.form-select',
//            'class' => Components\FormSelect::class,
//        ],
//
//        'form-submit' => [
//            'view' => 'tailwind-form::{framework}.form-submit',
//            'class' => Components\FormSubmit::class,
//        ],
//
//        'form-textarea' => [
//            'view' => 'tailwind-form::{framework}.form-textarea',
//            'class' => Components\FormTextarea::class,
//        ],
    ],
];

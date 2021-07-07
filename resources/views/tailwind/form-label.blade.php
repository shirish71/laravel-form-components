<label {!! $attributes->merge([
    'class' => 'label block mb-2 ',
    'for'=>$for
    ]) !!}>
    {{ $label }}@if($required)<i class="text-red-500">*</i>@endif
</label>


<div class="@if($type === 'hidden') hidden @else m-2 @endif ">
    <x-form-label :label="$label" for="asdf"/>
    <input {!!  $attributes->merge([
            'class'=>'form-control '
            ])!!}
           type="{{ $type }}"
           @if($isWired())
           wire:model{!! $wireModifier() !!}="{{ $name }}"
           @else
           name="{{ $name }}"
           value="{{ $value }}"
           @endif
           placeholder="{{$placeholder}}"
    />

    @if($hasErrorAndShow($name))
        <x-form-error :name="$name" id="id"/>
    @endif
</div>

<form action="{{$action??'#'}}"
      method="{{ $spoofMethod ? 'POST' : $method }}"
      @if($file == 'true' || $files == 'true') enctype="multipart/form-data" @endif  {!! $attributes !!}>
    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless
    @if($spoofMethod)
        @method($method)
    @endif

    @if($successMessage ==true)
        <x-success-message/>
    @endif
    <div class="my-3">
        {!! $slot !!}
    </div>
</form>

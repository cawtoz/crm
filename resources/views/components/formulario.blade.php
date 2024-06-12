<link rel="stylesheet" href="/css/formulario.css">
<div class="form-container">
    <form action="{{ $action }}" method="POST">
        @if(isset($title) && !empty($title))
            <h1>{{ $title }}</h1>
        @endif
        @csrf
        @foreach ($inputs as $input)

            <div class="input">
                <p>
                    {{ $input['placeholder'] }} @if ($input['required'])<span>*</span>@endif
                </p>
                <div>
                    <img src="{{ $input['img'] ?? '/images/icons/edit.svg' }}">
                    <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" {{ $input['required'] ? 'required' : '' }}>
                </div>
            </div>
        @endforeach
        <button type="submit">{{ $buttonText }}</button>
    </form>
</div>

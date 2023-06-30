@if (session('message'))
    <div
        {{ $attributes->merge(['class' => 'text-center mb-4 alert alert-'.(session('status') ? 'success' : 'danger')]) }}
        role="alert"
    >
        {!! session('message') !!}
    </div>
@endif

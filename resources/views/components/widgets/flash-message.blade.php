@if (session('message'))
    <div
        {{ $attributes->merge(['class' => 'alert alert-'.(session('status') ? 'success' : 'danger')]) }}
        role="alert"
    >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p class="mb-0">{!! session('message') !!}</p>
    </div>
@endif

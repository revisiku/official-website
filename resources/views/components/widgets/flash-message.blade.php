@if (session('message'))
    <div
        {{ $attributes->merge(['class' => 'alert alert-'.(session('status') ? 'success' : 'danger')]) }}
        role="alert"
    >
        <h6 class="mb-1 font-weight-bold h6">{{ session('status') ? 'Success' : 'Error' }}!</h6>
        <p class="mb-0">{!! session('message') !!}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">{{ __('Konfirmasi Logout') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('Anda yakin ingin Logout?') }}
            </div>
            <div class="modal-footer">
                <form class="w-25" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block btn-custom">
                        <i class="fa fa-arrow-circle-right mr-1"></i> {{ __('Oke') }}
                    </button>
                </form>
                <button type="button" data-dismiss="modal" class="btn btn-dark btn-custom">
                    <i class="fa fa-times mr-1"></i> {{ __('Batal') }}
                </button>
            </div>
        </div>
    </div>
</div>

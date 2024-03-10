<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">{{ __('Konfirmasi Hapus') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('Anda yakin menghapus data?') }}
            </div>
            <div class="modal-footer">
                <form class="w-25" method="POST">
                    @csrf
                    @method('delete')
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

@push('script')
    <script >
        $(document).ready(function() {
            $('body').on('click', '.btn-delete',function () {
                $('#deleteModal form').attr('action', this.dataset.link)
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endpush



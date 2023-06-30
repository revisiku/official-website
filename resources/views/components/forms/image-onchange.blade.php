@push('css')
    <style>
        .preview {
            padding: 10px;
            border: 1px rgb(153, 151, 151) dotted;
        }

        .preview img {
            width: 100%;
        }
    </style>
@endpush
@push('js')
    <script>
        const imageOnChange = function(event, id) {
            const output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = () => URL.revokeObjectURL(output.src)
        };
    </script>
@endpush

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @php
                    $link = url('redirect')."?stats=sosial-media&link=".$socialMedia->where('icon', 'instagram')->first()->link;
                @endphp
                <p><x-copyright /> | <a class="pointer text-decoration-underline" onclick="redirect('{{ $link }}')"><i class="fa fa-instagram"></i> Instagram</a></p>
            </div>
        </div>
    </div>
</footer>

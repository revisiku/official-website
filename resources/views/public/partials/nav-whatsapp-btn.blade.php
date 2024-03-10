<li>
    <div class="border-first-button">
        @php
            $link = url('redirect')."?stats=whatsapp&link=https://api.whatsapp.com/send?phone=62".str_replace('-','',substr($contact->phone_number,1,18));
        @endphp
        <button onclick="redirect('{{ $link }}')"><i class="fa fa-whatsapp"></i></button>
    </div>
</li>

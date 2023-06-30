@extends('public.contents.landing_page.template')

@section('content')
    <div class="main-banner wow fadeIn" id="home" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Kembangkan Bisnis</h2>
                                        <p>Mari melaju satu langkah bersama Kami, gunakan media online untuk branding bisnis Anda guna taklukan persaingan dengan kompetitor.</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-first-button scroll-to-section">
                                            <a href="#contact">Let's Partner</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="assets/static/images/slider-dec.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="assets/static/images/about-dec.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="about-right-content">
                                <div class="section-heading">
                                    <h6>About Us</h6>
                                    <h4>Who is <em>RevisiKu</em></h4>
                                    <div class="line-dec"></div>
                                </div>
                                <p>Kami adalah penyedia jasa untuk pembuatan Website, Desain Grafis, Digital Marketing dan Social Media Management. Anda dapat request berdasarkan kebutuhan Anda dan kami siap membantu Anda dengan senang hati.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>Our Services</h6>
                        <h4>What Our Agency <em>Provides</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="naccs">
                        <div class="grid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="menu">
                                        <div class="first-thumb wow fadeInRight" data-wow-delay=".3s">
                                            <div class="thumb active">
                                                <span class="icon"><img src="assets/static/images/service-icon-01.png" alt=""></span>
                                                Programming
                                            </div>
                                        </div>
                                        <div class="wow fadeInRight" data-wow-delay=".5s">
                                            <div class="thumb">
                                                <span class="icon"><img src="assets/static/images/service-icon-02.png" alt=""></span>
                                                Design
                                            </div>
                                        </div>
                                        <div class="last-thumb wow fadeInRight" data-wow-delay=".7s">
                                            <div class="thumb">
                                                <span class="icon"><img src="{{ asset('assets/static/images/service-icon-03.png') }}" alt=""></span>
                                                Marketing
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center wow fadeInDown">
                                                            <div class="left-text">
                                                                <h4>Website Development</h4>
                                                                <div class="ticks-list">
                                                                    <span><i class="fa fa-check"></i> Website Profil (Perusahaan, Instansi, dll)</span> <br>
                                                                    <span><i class="fa fa-check"></i> Website Sistem Informasi Managemen</span> <br>
                                                                    <span><i class="fa fa-check"></i> Landing Page (Keperluan Marketing)</span> <br>
                                                                    <span><i class="fa fa-check"></i> dan bisa Custom by Request</span> <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center wow fadeInDown">
                                                            <div class="right-image">
                                                                <img src="{{ asset('assets/static/images/services-image-03.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>Graphic Design</h4>
                                                                <p></p>
                                                                <div class="ticks-list">
                                                                    <span><i class="fa fa-check"></i> Desain Logo</span> <br>
                                                                    <span><i class="fa fa-check"></i> Feed IG</span> <br>
                                                                    <span><i class="fa fa-check"></i> Banner</span> <br>
                                                                    <span><i class="fa fa-check"></i> dan bisa Custom by Request</span> <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('assets/static/images/services-image-02.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="thumb">
                                                    <div class="row">
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="left-text">
                                                                <h4>SEO dan SEM</h4>
                                                                <p></p>
                                                                <div class="ticks-list">
                                                                    <span><i class="fa fa-check"></i> Social Media Advertising</span> <br>
                                                                    <span><i class="fa fa-check"></i> Facebook Ads</span> <br>
                                                                    <span><i class="fa fa-check"></i> Google Ads</span> <br>
                                                                    <span><i class="fa fa-check"></i> Optimasi Website</span> <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 align-self-center">
                                                            <div class="right-image">
                                                                <img src="{{ asset('assets/static/images/services-image.jpg') }}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h6>Contact Us</h6>
                        <h4>Get In Touch With Us <em>Now</em></h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" class="form-submit" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-dec">
                                <img src="{{ asset('assets/static/images/contact-dec.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div id="map">
                                <iframe src="{!! $gmap !!}" width="100%" height="470px" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="fill-form">
                                    <x-widgets.public.flash-message-js />
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="* Nama Lengkap" maxlength="50">
                                            <input type="text" class="form-control" name="handphone" id="handphone" placeholder="Nomor Handphone" maxlength="14">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="* Alamat Email" maxlength="75">
                                        </div>
                                        <div class="col-lg-6">
                                            <textarea name="message" class="form-control" id="message" placeholder="* Masukkan pesan Anda.." maxlength="300"></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" id="btn-submit" class="main-button">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/is-number.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script>
        initNumber($('input[name=handphone]'))

        $('.form-submit').submit(function(event) {
            event.preventDefault();

            inputValidation($('#name'))
            inputValidation($('#message'))
            numberValidation($('#handphone'), false)
            emailValidation($('#email'))

            if (error == false) {
                $('#btn-submit').html('<i class="fa fa-spinner fa-pulse"></i>').attr('disabled', true)

                $.ajax({
                    type: "post",
                    url: "{{ route('kirimPesan') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": $('#name').val(),
                        "handphone": $('#handphone').val(),
                        "email": $('#email').val(),
                        "message": $('#message').val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        $('.alert').removeAttr('hidden').show()

                        if(response.status == false) {
                            $('.alert').addClass('alert-danger')
                                .removeClass('alert-success')
                                .html(response.message)
                        } else {
                            $('#name').val('')
                            $('#handphone').val('')
                            $('#email').val('')
                            $('#message').val('')

                            $('.alert').removeClass('alert-danger')
                                .addClass('alert-success')
                                .html(response.message)
                        }

                        $('#btn-submit').html('Kirim Pesan').removeAttr('disabled')
                    }
                });
            }
        })
    </script>
@endpush

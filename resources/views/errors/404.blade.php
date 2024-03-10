<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ $siteName = \App\Models\Pengaturan::getValue('site_name') }}">
    <title>{{ __('404 | ').$siteName }} - {{ \App\Models\Pengaturan::getValue('tag') }}</title>
    <link href="{{ asset(\App\Models\Pengaturan::getValue('favicon')) }}" rel="icon" sizes="32x32" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="row align-items-center" style="height: 100vh">
            <div class="container-fluid">
                <!-- 404 Error Text -->
                <div class="text-center">
                    <h3 class="error error-number p-0">404</h3>
                    <p class="error error-text mb-5">Not Found</p>
                    <p class="error-description mb-1">{{ __('Maaf, halaman tidak tersedia pastikan alamat URL Anda benar.') }}</p>
                    <a href="{{ url()->previous() }}">&larr; Back</a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</body>
</html>

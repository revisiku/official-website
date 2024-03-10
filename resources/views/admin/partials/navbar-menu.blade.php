<nav class="main-header navbar navbar-expand-md navbar-light navbar-light py-3">
    <div class="container">
        <a href="" class="navbar-brand">
        <img src="{{ asset($favicon) }}" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $site_name }}</span>
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Left navbar links -->
        @include('admin.partials.navbar-menu-left')
        <!-- Right navbar links -->
        @include('admin.partials.navbar-menu-right')
    </div>
</nav>

<div class="collapse navbar-collapse order-3" id="navbarCollapse">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('banner.index') }}" class="nav-link">Banner</a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownPost" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Post</a>
            <ul aria-labelledby="dropdownPost" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('post.kategori.index') }}" class="dropdown-item">Kategori </a></li>
                <li><a href="{{ route('post.blog.index') }}" class="dropdown-item">Daftar Blog</a></li>
                <li><a href="{{ route('post.berita.index') }}" class="dropdown-item">Daftar Berita</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownPage" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Halaman</a>
            <ul aria-labelledby="dropdownPage" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('halaman.edit', 1) }}" class="dropdown-item">Tentang Kami </a></li>
                <li><a href="{{ route('testimoni.index') }}" class="dropdown-item">Testimoni</a></li>
                <li><a href="{{ route('partnership.index') }}" class="dropdown-item">Partnership</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('infoKontak.index') }}" class="nav-link">Informasi Kontak</a>
        </li>
    </ul>
</div>

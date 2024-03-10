<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-comments"></i>
            <span class="badge badge-danger navbar-badge">{{ $newMessageCount ?: '' }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @forelse ($newMessage as $message)
                <a href="{{ route('pesan.detail', $message->id) }}" @class(['dropdown-item', 'new-message' => !$message->isReaded()])>
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ $message->name }}
                            </h3>
                            <p class="text-sm">{{ str($message->message)->limit(35).(strlen($message->message) > 35 ? '...' : '') }}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
            @empty
                <p class="p-3 text-center text-danger mt-1">Tidak ada pesan..</p>
                <div class="dropdown-divider"></div>
            @endforelse
            <a href="{{ route('pesan.index') }}" class="dropdown-item dropdown-footer">Semua Pesan</a>
        </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('pesan.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>
    <!-- Profile Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right py-0" style="width: 230px">
            <div class="dropdown-item text-center py-3 bg-primary">
                {{ __(auth()->user()->name) }}
            </div>
            <div class="dropdown-divider my-0"></div>
            <a href="{{ route('profil.index') }}" class="dropdown-item py-2">
                <i class="feather icon-user"></i> {{ __('Profil') }}
            </a>
            <div class="dropdown-divider my-0"></div>
            <a href="{{ route('gantiPassword.index') }}" class="dropdown-item py-2">
                <i class="feather icon-lock"></i> {{ __('Ganti Password') }}
            </a>
            <div class="dropdown-divider my-0"></div>
            <a href="{{ route('pengaturan.index') }}" class="dropdown-item py-2">
                <i class="feather icon-lock"></i> {{ __('Pengaturan') }}
            </a>
            <div class="dropdown-divider my-0"></div>
            <a href="{{ route('akun.index') }}" class="dropdown-item py-2">
                <i class="feather icon-lock"></i> {{ __('Akun Admin') }}
            </a>
            <div class="dropdown-divider my-0"></div>
            <a class="dropdown-item py-2" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="feather icon-log-out"></i> {{ __('Logout') }}
            </a>
        </div>
    </li>
</ul>

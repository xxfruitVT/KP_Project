<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">E-Perpus</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <li class="menu-item {{ request()->routeIs('chatbot.index') ? 'active' : '' }}">
                <a href="{{ route('chatbot.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-chat"></i>
                    <div data-i18n="Analytics">Chatbot</div>
                </a>
            </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Buku</span>
        </li>

        <li class="menu-item {{ request()->routeIs('buku.index') ? 'active' : '' }}">
            <a href="{{ route('buku.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Analytics">Data Buku</div>
            </a>
        </li>
        @if (Auth::user()->role == 'user')
            <li class="menu-item {{ request()->routeIs('buku.history') ? 'active' : '' }}">
                <a href="{{ route('buku.history') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-history"></i>
                    <div data-i18n="Analytics">History Peminjaman</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Genre Buku</span>
            </li>

            @foreach ($genres as $genre)
                <li class="menu-item {{ request()->input('genre') == $genre->id ? 'active' : '' }}">
                    <a href="{{ route('buku.index', ['genre' => $genre->id]) }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-book-open"></i>
                        <div data-i18n="Analytics">{{ $genre->name }}</div>
                    </a>
                </li>
            @endforeach

        @endif

        @if (Auth::user()->role == 'admin')
            <li class="menu-item {{ request()->routeIs('buku.create') ? 'active' : '' }}">
                <a href="{{ route('buku.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                    <div data-i18n="Analytics">Tambah</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('genre.index') ? 'active' : '' }}">
                <a href="{{ route('genre.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-list-ul"></i>
                    <div data-i18n="Analytics">Genre Buku</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pengunjung</span>
            </li>

            <li class="menu-item">
                <a href="{{ route('visitor.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Analytics">Data Pengunjung</div>
                </a>
            </li>
        @endif

    </ul>

</aside>

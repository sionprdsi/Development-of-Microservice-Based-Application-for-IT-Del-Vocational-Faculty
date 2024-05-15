<nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
        <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
        <li><a class="nav-link scrollto {{ Request::is('tentang') ? 'active' : '' }}" href="/tentang">Tentang</a></li>
        <li class="dropdown">
            <a class="nav-link scrollto {{ Request::is('prodi/*') ? 'active' : '' }}" href="/tentang">Program Studi <i class="bi bi-chevron-down"></i></a>
            <ul>
                @foreach ($prodi as $item)
                    <li style="text-decoration: none; color:black"><a href="/prodi/?q={{ $item->slug }}">{{ $item->nama }} </a></li>
                @endforeach
            </ul>
        </li>
        {{-- <li><a class="nav-link scrollto {{ Request::is('berita') ? 'active' : '' }}" href="/berita">Berita</a></li> --}}
        {{-- <li><a class="nav-link scrollto {{ Request::is('event') ? 'active' : '' }}" href="/event">Event</a></li> --}}
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>

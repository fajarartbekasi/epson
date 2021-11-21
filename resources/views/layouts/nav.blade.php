<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-white" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand text-info" href="{{route('welcome')}}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{route('home')}}">
                {{ __('Home') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{route('user.cek.cart')}}">Keranjang</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto ">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link  btn-pill btn-indigo mr-2 shadow" href="{{ route('login') }}">{{ __('Please Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link  btn-pill bg-indigo-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
  </div>
</nav>

<div class="nav-scroller bg-white shadow-sm">
  <nav class="nav nav-underline px-3" aria-label="Secondary navigation">
    @forelse($kategoris as $kategori)
        <a class="nav-link" aria-current="page" href="#">{{$kategori->name}}</a>
        @empty
        <p class="offset-md-4 pt-2 text-secondary">Maaf Kategori belum tersedia</p>
    @endforelse
  </nav>
</div>

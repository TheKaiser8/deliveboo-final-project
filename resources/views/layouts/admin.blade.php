<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/svg" href="/deliveroo.svg" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>DeliveBoo | @yield('page-title')</title>

    <!-- Fontawesome 6 cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito"
      rel="stylesheet"
    />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
  </head>

  <body>
    <div id="app">
      <header
        class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap justify-content-between p-2 shadow"
      >
        <button
          class="navbar-toggler position-absolute d-md-none collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#sidebarMenu"
          aria-controls="sidebarMenu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        @if( Auth::user()->restaurant )
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="http://127.0.0.1:8000/admin/backoffice-to-frontoffice"
            >DeliveBoo</a
          >
        @else
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.restaurants.create') }}"
            >DeliveBoo</a
          >
        @endif
        
          <div class="navbar-nav">
            <div class="nav-item text-nowrap ms-2">
              <a
                class="nav-link"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
              >
                {{ __('Logout') }}
              </a>
              <form
                id="logout-form"
                action="{{ route('logout') }}"
                method="POST"
                class="d-none"
              >
                @csrf
              </form>
            </div>
          </div>
      </header>

      <div class="container-fluid vh-100">
        <div class="row h-100">
          <nav
            id="sidebarMenu"
            class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse"
          >
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                {{-- restaurant button --}}
                @if( Auth::user()->restaurant )
                  <li class="nav-item">
                    <a
                      class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.restaurants') ? 'bg-secondary' : '' }}"
                      href="{{route('admin.restaurants.show', Auth::user()->restaurant)}}"
                    >
                      <i class="fa-solid fa-utensils fa-lg fa-fw"></i>
                      Il tuo ristorante
                    </a>
                  </li>
                @endif
                {{-- products button --}}
                @if(Auth::user()->restaurant)
                  <li class="nav-item">
                    <a
                      class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.products') ? 'bg-secondary' : '' }}"
                      href="{{route('admin.products.index')}}"
                    >
                      <i class="fa-solid fa-burger fa-lg fa-fw"></i>
                      Prodotti
                    </a>
                  </li>
                @endif
                {{-- orders button --}}
                @if(Auth::user()->restaurant)
                  <li class="nav-item">
                    <a
                      class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.orders') ? 'bg-secondary' : '' }}"
                      href="{{route('admin.orders.index')}}"
                    >
                      <i class="fa-solid fa-truck-fast fa-lg fa-fw"></i>
                      Ordini
                    </a>
                  </li>
                @endif
                {{-- <li class="nav-item">
                  <a
                    class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'admin.stats') ? 'bg-secondary' : '' }}"
                    href="{{route('admin.stats.index')}}"
                  >
                    <i class="fa-solid fa-chart-line fa-lg fa-fw"></i>
                    Statistiche
                  </a>
                </li> --}}
              </ul>
            </div>
          </nav>

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
          </main>
        </div>
      </div>
    </div>
  </body>
</html>
<nav class="navbar navbar-expand-lg bg-secondary text-light">
    <div class="container">
      <a class="navbar-brand" href="#">Zain's Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-3 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/product') }}">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/category') }}">Category</a>
          </li>
          <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="">Pakaian Wanita</a></li>
                  <li><a class="dropdown-item" href="#">Pakaian Pria</a></li>
                  <li><a class="dropdown-item" href="#">Pakaian Anak-anak</a></li>
              </ul>
          </li> -->
        </ul>
        <ul class="navbar-nav d-flex">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url ('/user/profile') }}">Setting</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
          @endauth
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          @endguest
          </ul>
      </div>
    </div>
</nav>
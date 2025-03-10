<nav class="navbar navbar-expand-md navbar-light shadow-sm samuraimart-header-container">
    <div class="container">
      <a href="{{url('/')}}" class="navbar-brand">
          <img src="{{asset('img/logo.jpg')}}">
      </a>
      <form action="{{route('products.index')}}" method="get" class="row g-1">
        <div class="col-auto">
          <input class="form-control samuraimart-header-search-input" name="keyword" placeholder="何かお探しですか？">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn samuraimart-header-search-button"><i class="fas fa-search samuraimart-header-search-icon"></i></button>
        </div>
      </form>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mr-5 mt-2">
              @guest
                  <li class="nav-item me-3">
                      <a href="{{route('register')}}" class="nav-link">登録</a>
                  </li>
                  <li class="nav-item border-end border-dark me-3 pe-3">
                      <a href="{{route('login')}}" class="nav-link">ログイン</a>
                  </li>
                  <hr>
                  <li class="nav-item me-3">
                    <a class="nav-link" href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i></a>
                  </li>
              @else
                <li class="nav-item mx-2 border-end border-dark px-3">
                  <a href="{{route('mypage')}}" class="nav-link">
                    <i class="fas fa-user mr-1"></i><label>マイページ</label>
                  </a>
                </li>
                <li class="nav-item mx-2">
                  <a class="nav-link" href="{{route('mypage.favorite')}}">
                    <i class="far fa-heart"></i>
                  </a>
                </li>
                <li class="nav-item mx-2">
                  <a href="{{route('carts.index')}}" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                  </a>
                </li>
              @endguest
          </ul>
      </div>
    </div>
  </nav>

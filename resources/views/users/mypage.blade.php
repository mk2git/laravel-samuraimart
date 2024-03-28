@extends('layouts.app')

@section('content')
  <div class="container d-flex justify-content-center mt-3">
    <div class="w-50">
      <h1>マイページ</h1>

      <hr>

      <div class="container">
            <a href="{{route('mypage.edit')}}" class="text-decoration-none">
                <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                    <i class="fas fa-user fa-3x text-dark"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-2 mt-3">
                    <div class="d-flex flex-column">
                        <label for="user-name">会員情報の編集</label>
                        <small class="text-muted">アカウント情報の編集</small>
                    </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-chevron-right fa-2x text-secondary"></i>
                </div>
                </div>
            </a>
     </div>


      <hr>

      <div class="container">
        <a href="{{route('mypage.cart_history')}}" class="text-decoration-none">
            <div class="d-flex justify-content-between">
            <div class="row">
                <div class="col-2 d-flex align-items-center">
                <i class="fas fa-archive fa-3x text-dark"></i>
                </div>
                <div class="col-9 d-flex align-items-center ms-2 mt-3">
                <div class="d-flex flex-column">
                    <label for="user-name">注文履歴</label>
                    <small class="text-muted">注文履歴を確認できます</small>
                </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-chevron-right fa-2x text-secondary"></i>
            </div>
            </div>
        </a>
      </div>

      <hr>

       <div class="container">
            <a href="{{route('mypage.edit_password')}}" class="text-decoration-none">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-lock fa-3x text-dark"></i>
                        </div>
                        <div class="col-9 d-flex align-items-center ms-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">パスワード変更</label>
                            <small class="text-muted">パスワードを変更します</small>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chevron-right fa-2x text-secondary"></i>
                    </div>
                </div>
            </a>
      </div>

      <hr>

      <div class="container">
        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-decoration-none">
            <div class="d-flex justify-content-between">
            <div class="row">
                <div class="col-2 d-flex align-items-center">
                <i class="fas fa-sign-out-alt fa-3x text-dark"></i>
                </div>
                <div class="col-9 d-flex align-items-center ms-2 mt-3">
                <div class="d-flex flex-column">
                    <label for="user-name">ログアウト</label>
                    <small class="text-muted">ログアウトします</small>
                </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-chevron-right fa-2x text-secondary"></i>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
            </div>
         </a>
      </div>
      <hr>

    </div>
  </div>

@endsection

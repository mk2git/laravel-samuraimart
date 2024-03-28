@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-5">
              <h3 class="mt-3 mb-3">新規会員登録</h3>
              <hr>

              <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group row mb-3 mt-4">
                    <label for="name" class="col-md-5 col-form-label text-md-left mr-3">氏名
                        <small class="ml-1 samuraimart-require-input-label p-1 rounded">
                            <small class="samuraimart-require-input-label-text">必須</small>
                        </small>
                    </label>
                    <div class="col-md-7">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror samuraimart-login-input" value="{{old('name')}}" required autocomplete="name" autofocus placeholder="侍 太郎">

                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                          </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-md-5 col-form-label text-md-left mr-3">メールアドレス <span class="ml-1 samuraimart-require-input-label p-1 rounded"><span class="samuraimart-require-input-label-text">必須</span></span></label>
                    <div class="col-md-7">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror samuraimart-login-input" id="email" value="{{old('email')}}" required autocomplete="email" placeholder="samurai@samurai.com">

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                          </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="postal_code" class="col-md-5 col-form-label text-md-left mr-3">郵便番号 <span class="ml-1 samuraimart-require-input-label p-1 rounded"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror samuraimart-login-input" name="postal_code" required placeholder="150-0043">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="address" class="col-md-5 col-form-label text-md-left mr-3">住所 <span class="ml-1 samuraimart-require-input-label p-1 rounded"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                     <div class="col-md-7">
                         <input type="text" class="form-control @error('address') is-invalid @enderror samuraimart-login-input" name="address" required placeholder="東京都渋谷区道玄坂２丁目１１−１">
                     </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="phone" class="col-md-5 col-form-label text-md-left mr-3">電話番号 <span class="ml-1 samuraimart-require-input-label p-1 rounded"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                     <div class="col-md-7">
                         <input type="text" class="form-control @error('phone') is-invalid @enderror samuraimart-login-input" name="phone" required placeholder="03-5790-9039">
                     </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="password" class="col-md-5 col-form-label text-md-left mr-3">パスワード <span class="ml-1 samuraimart-require-input-label p-1 rounded"><span class="samuraimart-require-input-label-text">必須</span></span></label>

                     <div class="col-md-7">
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samuraimart-login-input" name="password" required autocomplete="new-password">

                         @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left">パスワード(確認用)</label>

                     <div class="col-md-7">
                         <input id="password-confirm" type="password" class="form-control samuraimart-login-input" name="password_confirmation" required autocomplete="new-password" placeholder="同じパスワードを入力してください">
                     </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn samuraimart-submit-button w-100 mt-4">
                        アカウント作成
                    </button>
                </div>
              </form>
          </div>
      </div>
  </div>
@endsection

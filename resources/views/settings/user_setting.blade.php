@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/settings.css')}}">
@endsection

@section('title', 'User Setting')
    
@section('content')
<div class="user_setting_container">
    <div class="page_title text-start">
      <h2 class="ms-3 fs-1">
        <i class="fa-solid fa-user"></i> ユーザ情報変更
      </h2>
    </div>

    <form method="POST" action="#" class="p-0 mx-auto">
      @csrf

      <div class="mb-3 user_form">
          <label for="email" class="form-label text-start">メールアドレス</label>

          <div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="mb-3 user_form">
          <label for="password" class="form-label text-start">パスワード</label>

          <div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="row mt-5 mb-0  buttons">
          <div class="w-100 button_green">
              <button type="submit" class="">
                  変更を保存する
              </button>
          </div>
      </div>
  </form>

</div>

@endsection

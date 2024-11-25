@extends('layouts.app')

@section('body-class', 'welcome_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcomes.css')}}">
@endsection

@section('title', 'Login')

@section('content')
<div class="register_container">
    <div class="row justify-content-center">

            <h2 class="text-center text-white">ログイン</h2>

            <form method="POST" action="{{ route('login') }}" class="p-0">
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
                    <div class="w-100 button_white">
                        <button type="submit" class="">
                            ログイン
                        </button>
                    </div>
                </div>
            </form>
            
        
    </div>
</div>
@endsection

@php($hideNavbar = true) {{-- ナビバーを非表示にする --}}
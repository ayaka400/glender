@extends('layouts.app')

@section('body-class', 'welcome_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
@endsection

@section('title', 'Welcome')
    
@section('content')
    <div class="welcome_container">
        <h1 class="text-center">GLENDER</h1>

        <div class="buttons">
            <a href="{{ route('register') }}" class="d-block mb-3 button_trans">
                <button type="button" class="">新規登録</button>
            </a>
            <a href="{{ route('login') }}" class="d-block button_white">
                <button type="button">ログイン</button>
            </a>
        </div>
    </div>
    
@endsection

@php($hideNavbar = true) {{-- ナビバーを非表示にする --}}

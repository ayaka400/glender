@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/settings.css')}}">
@endsection

@section('title', 'Setting')
    
@section('content')
  <div class="setting_container">
      <div class="page_title">
          <h2 class="ms-3 fs-1">
            <i class="fa-solid fa-gear text-white"></i> 設定
          </h2>
      </div>
      <div class="setting_selection">
          <div class="row">
              <a href="{{ route('country-setting.show')}}" class="d-flex justify-content-center">
                <div class="col-auto me-3"><i class="fa-solid fa-globe"></i></div>
                <div class="col-auto">表示する国</div>
              </a>
              
          </div>
          <div class="row mt-5">
              <a href="{{ route('user.settings') }}" class="d-flex justify-content-center">
                <div class="col-auto me-3"><i class="fa-solid fa-user"></i></div>
                <div class="col-auto">ユーザ情報</div>
              </a>
          </div>

          {{-- ユーザページにログアウトボタン --}}
          <div class="row mt-5">
              <a href="{{ route('logout') }}" class="d-flex justify-content-center" 
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <div class="col-auto me-3"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                  <div class="col-auto">ログアウト</div>
              </a>
          </div>
          

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>


      </div>
  </div>
@endsection
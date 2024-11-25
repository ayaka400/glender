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
          <div class="row mb-4">
              <a href="#" class=" d-flex justify-content-center">
                <div class="col-auto me-3"><i class="fa-solid fa-globe"></i></div>
                <div class="col-auto">表示する国</div>
              </a>
              
          </div>
          <div class="row mt-4">
              <a href="#" class=" d-flex justify-content-center">
                <div class="col-auto me-3"><i class="fa-solid fa-user"></i></div>
                <div class="col-auto">ユーザ情報</div>
              </a>
        </div>
      </div>
  </div>
@endsection
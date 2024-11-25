
@extends('layouts.app')

@section('body-class', 'welcome_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcomes.css')}}">
@endsection

@section('title', 'Select Country')

@section('content')
    <div class="country_select_container text-center">
          <h3>祝日や行事をチェックしたい国を選んでみましょう。<br>（複数選択可）</h3>
        <form action="#" method="POST">
          @csrf
          
          <div class="row d-flex justify-content-center country_option">
              @foreach (range(1, 6) as $i)  {{-- 1から6まで繰り返す --}}
                  <div class="col-5 mb-3 d-flex justify-content-center">
                      <div class="form-check d-flex align-items-center">
                          <input class="form-check-input" type="checkbox" name="country" id="country{{ $i }}" value="{{ $i }}">
                          <label class="form-check-label" for="country{{ $i }}">
                              国{{ $i }}
                              <br>
                              <img src="{{ asset('sample_images/ntf_142.svg') }}" alt="国{{ $i }}の国旗" class="flag-sm">
                             
                          </label>
                      </div>
                  </div>
              @endforeach
          </div>

          <div class="button_white">
            <button type="submit">選択完了！</button>
          </div>
          
      </form>
    </div>
@endsection

@php($hideNavbar = true) {{-- ナビバーを非表示にする --}}
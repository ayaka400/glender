@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/settings.css')}}">
@endsection

@section('title', 'Country Setting')
    
@section('content')

<div class="country_select_container text-center">
    <div class="page_title text-start">
      <h2 class="ms-3 fs-1">
        <i class="fa-solid fa-globe"></i> 表示する国
      </h2>
    </div>

    <div class="add_country d-flex justify-content-end me-4">
        <a href="#" class="add_country">国の追加</a>
    </div>
   
    <form action="#" method="POST" class="mt-4 ms-0">
      @csrf
      
      <div class="row d-flex justify-content-center country_option">
          @foreach (range(1, 6) as $i)  {{-- 1から6まで繰り返す --}}
              <div class="col-5 mb-3 d-flex justify-content-center flex-column">
                  
                  <div class="form-check d-flex align-items-center justify-content-center">
                      {{-- チェックボックス --}}
                      <input class="form-check-input" type="checkbox" name="country" id="country{{ $i }}" value="{{ $i }}">

                      {{-- 国名と国旗 --}}
                      <label class="form-check-label d-flex flex-column" for="country{{ $i }}">
                          国{{ $i }}
                          <br>
                          <img src="{{ asset('sample_images/ntf_142.svg') }}" alt="国{{ $i }}の国旗" class="flag-sm">
                      </label>
                  </div>
                  {{-- 国紹介リンク --}}
                  <div class="county_desc d-block text-center ms-3">
                    <a href="#" class="text-black text-decoration-underline ps-3">どんな国？</a>
                  </div>
              </div>
          @endforeach
      </div>

      <div class="button_green mt-4">
        <button type="submit">変更を保存する</button>
      </div>
      
    </form>
</div>


@endsection
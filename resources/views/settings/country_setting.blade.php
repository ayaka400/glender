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
        <a href="{{route('countries.create')}}" class="add_country">国の追加</a>
    </div>
   
    <form action="{{ route('country-setting.update')}}" method="POST" class="mt-4 ms-0">
      @csrf
      
      <div class="row d-flex justify-content-center country_option">
          @foreach ($countries as $country)  
              <div class="col-5 mb-5 d-flex justify-content-center flex-column">
                  
                  <div class="form-check d-flex align-items-center justify-content-center">
                      {{-- チェックボックス --}}
                      <input class="form-check-input" type="checkbox" name="countries[]" id="country" value="{{ $country->id}}"
                      {{-- ユーザーが選択中の国にチェック --}}
                      @if(in_array($country->id, $selectedCountries)) 
                          checked 
                      @endif
                      >

                      {{-- 国名と国旗 --}}
                      <div class="d-flex flex-column">
                          <div class="row country_edit_link ms-2">
                              <div class="col-auto p-0 fw-bold">{{ $country->country_name }}</div>
                              <div class="col p-0"><a href="{{ route('countries.edit', $country->id) }}" class="d-inline"><i class="fa-solid fa-pen"></i></a></div>
                          </div>
                      
                          <label class="form-check-label" for="country">
                              <img src="{{ Storage::url($country->flag_image) }}" alt="No image" class="flag-sm">
                          </label>
                    </div>
                  </div>
                  {{-- 国紹介リンク --}}
                  <div class="county_desc d-block text-center ms-3">
                    <a href="{{ route('countries.show', ['id' => $country->id]) }}" class="text-black text-decoration-underline ps-3">どんな国？</a>
                  </div>
              </div>
          @endforeach
      </div>

      <div class="button_green mt-4">
        <button type="submit">変更を保存する</button>
      </div>

      {{-- エラー表示 --}}
      @if ($errors->has('countries'))
      <div class="text-danger mt-2 small">
          {{ $errors->first('countries') }}
      </div>
      @endif
      
    </form>
</div>


@endsection
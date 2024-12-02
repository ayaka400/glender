
@extends('layouts.app')

@section('body-class', 'welcome_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcomes.css')}}">
@endsection

@section('title', 'Select Country')

@section('content')
    <div class="country_select_container text-center">
          <h3>祝日や行事をチェックしたい国を選んでみましょう。<br>（複数選択可）</h3>
        <form action="{{ route('country-selection.store') }}" method="POST">
          @csrf
          
          <div class="row d-flex justify-content-center country_option">
              @foreach ($countries as $country) 
                  <div class="col-5 mb-3 d-flex justify-content-center">
                      <div class="form-check d-flex align-items-center">
                          <input class="form-check-input" type="checkbox" name="countries[]" value="{{ $country->id }}" id="country_{{ $country->id }}">
                          <label class="form-check-label" for="country_{{ $country->id }}">
                             {{ $country->country_name }}
                              <br>
                              <img src="{{ Storage::url($country->flag_image) }}" alt="No image" class="flag-sm">
                             
                          </label>
                      </div>
                  </div>
              @endforeach
          </div>

          <div class="button_white">
            <button type="submit">選択完了！</button>
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

@php($hideNavbar = true) {{-- ナビバーを非表示にする --}}
@extends('layouts.app')

@section('body-class', 'view_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/countries.css')}}">
@endsection

@section('title', 'Country')
    
@section('content')
<div class="country_container">
    <div class="back_button mt-2">
      <a href="javascript:history.go(-1)">< Back</a>
    </div>
    <div class="page_title text-start d-flex justify-content-start ms-3">
        @if($country->flag_image)
            <img src="{{ Storage::url($country->flag_image) }}" alt="Flag of {{ $country->country_name }}" style="max-width: 300px;">
        @else
            <p>No image</p>
        @endif
      <h2 class="ms-3 mt-2"> {{ $country->country_name }}</h2>
    </div>
    <div class="card my-2">
        <div class="card-body">

          <div class="country_desc mb-3">
              <h4>概要</h4>
              <div class="row">
                  <span class="col-auto">首都：</span>
                  <p class="col ps-0">{{ $country->capital }}</p>
              </div>
              <div class="row">
                <span class="col-auto">主な言語：</span>
                <p class="col ps-0">{{ $country->lang }}</p>
              </div>
              <div class="row">
                <span>主な宗教：</span>
                <p>{{ $country->relig }}</p>
              </div>
              <div class="row mb-2">
                <span>有名な観光地：</span>
                <p>{{ $country->tourist_spot}}</p>
              </div>
              <div class="other">
                  <span>その他の説明:</span>
                  <p>{{ $country->other_desc }}</p>
              </div>
          </div>
      
          <div class="greetng">
              <h4>主なあいさつ</h4>
              <div class="card" style="background-color: #8edcd540">
                <p>{{ $country->greeting }}</p>
              </div>
          </div>

        </div>
    </div>

    <h3 class="mt-4 mb-3">{{ $country->country_name }}の行事・祝日一覧</h3>

    <div class="small_events">
      @foreach (range(1, 3) as $i)
          <div class="card border-0 shadow-sm d-flex justify-content-between mb-3">
              <div class="card-body">
                  <div class="row">
                      <div class="event_name col">
                          <a href="{{ route('event')}}" class="col my-1">
                              <h5>イベント名</h5>
                          </a>
                      </div>
                      <div class="country_name col-auto">
                          <a href="#">
                              <h5 class="event_country my-1 align-items-end">
                                  国{{ $i }}
                              </h5>
                          </a>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="col event_left">
                          <p class="event_date my-0 py-0">
                              2024/◯/◯
                          </p>
                          <p class="event_desc">
                              (祭りの概要)
                          </p>
                      </div>
                      <div class="col-auto event_picture d-flex flex-column align-items-end">
                          <a href="{{ route('event')}}">
                              <img src="{{ asset('sample_images/teto.jpg') }}" alt="#">
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
</div>
@endsection

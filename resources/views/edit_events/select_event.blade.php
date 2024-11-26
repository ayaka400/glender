@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_events.css')}}">
@endsection

@section('title', 'Select Event')
    
@section('content')
    <div class="select_event_countainer mt-4">
        <div class="back_button mt-2">
          <a href="#">< Back</a>
        </div>
        <h2 class="ms-2 mb-0">作成したイベントの編集</h2>
        <p class="ms-3 mt-4 ">編集したいイベントを選択してください。</p>

        <select name="" id="" class="mt-3 mb-4"></select>

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
                              <h5 class="event_country my-1 align-items-end">
                                国{{ $i }}
                              </h5>
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
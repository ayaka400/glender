@extends('layouts.app')

@section('body-class', 'view_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/event.css')}}">
@endsection

@section('title', 'Event')
    
@section('content')
  <div class="event_container">
      <div class="back_button mt-2">
        <a href="#">< Back</a>
      </div>
      <div class="card_container">
          <div class="card">
            <div class="row title">
              <h2 class="col">〜〜祭り</h2>
              <div class="country_name col">
                <a href="#">
                  <h5 class="text-end align-items-center">ベトナム</h5>
                </a>
              </div>
            </div>
            
            <img src="{{ asset('sample_images/teto.jpg') }}" alt="">
            <div class="event_date row">
                <h4>イベントの日付・期間</h4>
                <p>2024/◯/◯</p>
            </div>
            <div class="event_desc">
                <h4>イベントの概要</h4>
                <p>文文文文文文文文文文文文文文文文
                  文文文文文文文文文文文文文文文文
                </p>
            </div>
            <div class="event_desc">
              <h4>主な過ごし方</h4>
              <p>文文文文文文文文文文文文文文文文
                文文文文文文文文文文文文文文文文
              </p>
            </div>
            <div class="greetng">
                <h4>お祝いの言葉</h4>
                <div class="card" style="background-color: #8edcd540">
                  <p>
                    ◯◯語の挨拶 <br>
                    （カタカナ表記） <br>
                    意味 
                  </p>
                </div>
            </div>
            
          </div>
      </div>
      
  </div>
@endsection

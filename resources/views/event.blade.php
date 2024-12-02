@extends('layouts.app')

@section('body-class', 'view_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/event.css')}}">
@endsection

@section('title', 'Event')
    
@section('content')
  <div class="event_container">
      <div class="back_button mt-2">
        <a href="javascript:history.go(-1)">< Back</a>
      </div>
      <div class="card_container">
          <div class="card">
            <div class="row title">
              {{-- イベント名 --}}
              <h2 class="col">{{ $event->event_name }}</h2>
              <div class="country_name col">
                <a href="{{ route('countries.show', $event->country->id) }}">
                  <h5 class="text-end align-items-center">{{ $event->country->country_name }}</h5>
                </a>
              </div>
            </div>
            
            <div class="d-flex justify-content-center">
              <img src="{{ asset('storage/' . $event->event_image) }}" alt="Event Image">
            </div>
            
            <div class="event_date row">
                <h4>イベントの日付・期間</h4>
                <p>{{ \Carbon\Carbon::parse($event->start_date)->format('Y/m/d') }} 〜 
                  {{ \Carbon\Carbon::parse($event->end_date)->format('Y/m/d') }}</p>
            </div>
            <div class="event_desc">
                <h4>イベントの概要</h4>
                <p>{{ $event->description }}</p>
            </div>
            <div class="greetng">
                <h4>お祝いの言葉</h4>
                <div class="card" style="background-color: #8edcd540">
                  <p>{{ $event->greeting }}</p>
                </div>
            </div>
            
          </div>
      </div>
      
  </div>
@endsection

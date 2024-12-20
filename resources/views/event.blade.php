@extends('layouts.app')

@section('body-class', 'view_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/event.css')}}">
@endsection

@section('title', 'Event')
    
@section('content')
  <div class="event_container">
      <div class="card_container">
          <div class="card">
            {{-- イベント名 --}}
            <div class="row title">
              <h2 class="col">{{ $event->event_name }}</h2>
            </div>
            {{-- 国名 --}}
            <div class="country_name row">
              <a href="{{ route('countries.show', $event->country->id) }}">
                <h5 class="text-end align-items-center">{{ $event->country->country_name }}</h5>
              </a>
            </div>
            
            
            <div class="d-flex justify-content-center">
              @if($event->event_image)
                  <img src="{{ asset('storage/' . $event->event_image) }}" alt="Event Image">
                @else
                  <p>No image</p>
        @endif
            </div>
            
            <div class="event_date row">
                <h4>イベントの日付・期間</h4>
                @if($event->end_date)
                    <p>{{ \Carbon\Carbon::parse($event->start_date)->format('Y/m/d') }} 〜 
                      {{ \Carbon\Carbon::parse($event->end_date)->format('Y/m/d') }}</p>
                @else
                    <p>{{ \Carbon\Carbon::parse($event->start_date)->format('Y/m/d') }}</p>
                @endif
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

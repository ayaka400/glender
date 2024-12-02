@extends('layouts.app')

@section('body-class', 'view_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css')}}">
@endsection

@section('title', 'Welcome')
    
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
        {{-- 選択中の国表示--}}
        <div class="selected_countries row">
            <div class="col-auto pe-0 ps-3">
                 <p class="me-0 d-flex">選択中の国：</p>
            </div>
             <div class="col-auto country_badge">
                 {{-- 選択された国をバッジとして表示 --}}
                 @foreach ($countries as $country)
                     <a href="{{ route('countries.show', $country->id) }}">
                         <span class="badge bg-white rounded-pill shadow-sm text-start me-2 fs-6">{{ $country->country_name }}</span>
                     </a>
                 @endforeach
             </div>
         </div>

        {{-- 今月のイベント --}}
            <div class="card border-0 shadow-sm upcoming_events">
                <div class="card-body">
                   <p class="title mb-0 fw-bold">今月のイベント(祝日・行事)</p>
                   @if ($thisMonthEvents->isEmpty())
                        <p class="text-muted ms-2">登録済みのイベントはありません。</p>
                    @else
                        @foreach ($thisMonthEvents as $event)
                            <p class="event_date my-0 py-0">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('Y/m/d') }}
                            </p>
                            <p class="event_name mb-0 pb-0 fw-bold">
                                {{ $event->event_name }}
                                <span>{{ $event->country->country_name }}</span>
                            </p>
                        @endforeach
                    @endif
                </div>
            </div>

        {{-- 月表示バー --}}
            <div class="month_bar p-0 ms-auto d-flex align-items-center justify-content-center">
                <div class="calnder_select">
                    {{-- <i class="fa-solid fa-calendar-days fa-2x text-secondary ms-3 calender_button"></i> --}}
                </div>
                <div class="this_month">
                    <h3 class="my-auto">
                        {{-- <span><i class="fa-solid fa-caret-left"></i></span> --}}
                        イベント一覧
                        {{-- &nbsp; 11月 &nbsp; --}}
                        {{-- <span><i class="fa-solid fa-caret-right"></i></span> --}}
                    </h3>
                </div>
        
      
                    
        
            </div>

        {{-- イベント一覧 --}}
        <div class="small_events" style="max-height: 500px; overflow-y: auto;" id="event-list">
            @foreach ($events as $event)
                <div class="card border-0 shadow-sm d-flex justify-content-between mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="event_name col">
                                <a href="{{ route('events.show', $event->id) }}" class="col my-1">
                                    <h5>{{ $event->event_name }}</h5>
                                </a>
                            </div>
                            <div class="country_name col-auto">
                                <a href="{{ route('countries.show', $event->country->id) }}" class="">
                                    <h5 class="event_country my-1 align-items-end">
                                        {{ $event->country->country_name }}
                                    </h5>
                                </a>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col event_left">
                                <p class="event_date my-0 py-0">
                                  {{ \Carbon\Carbon::parse($event->start_date)->format('Y/m/d') }} 〜 
                                  {{ \Carbon\Carbon::parse($event->end_date)->format('Y/m/d') }}
                              </p>
                                </p>                              
                            </div>
                            <div class="col-auto event_picture d-flex flex-column align-items-end">
                                <a href="{{ route('events.show', $event->id) }}">
                                    @if($event->event_image)
                                        <img src="{{ asset('storage/' . $event->event_image) }}" alt="Event Image">
                                    @else
                                        <p class="text-black">No image</p>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
            
        </div>
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // 現在以降のイベント要素を取得
        const currentEvent = document.querySelector('.current-event');
        if (currentEvent) {
            // スクロール対象のリストを取得
            const eventList = document.getElementById('event-list');
            // 現在以降のイベントにスクロール
            eventList.scrollTop = currentEvent.offsetTop - eventList.offsetTop;
        }
    });
</script> --}}

@endsection

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
            <div class="selected_categories row">
               <div class="col-auto pe-0 ps-3">
                    <p class="me-0 d-flex">選択中の国：</p>
               </div>
                <div class="col-auto country_badge">
                    @foreach (range(1, 2) as $i) 
                    <a href="#">
                        <span class="badge bg-white rounded-pill shadow-sm text-start me-2 fs-6">country{{ $i }}</span>
                    </a>
                    @endforeach
                </div>
            </div>

        {{-- 間近の祝日 --}}
            <div class="card border-0 shadow-sm upcoming_events">
                <div class="card-body">
                   <p class="title mb-0">今後2週間の祝日・行事</p>
                   @foreach (range(1, 2) as $i)
                        <p class="event_date my-0 py-0">2024/11/20</p>
                        <p class="event_name mb-0 pb-0 fw-bold">〜〜祭り<span> （国{{ $i }}) </span></p>
                   @endforeach
                </div>
            </div>

        {{-- 月選択バー --}}
            <div class="month_bar p-0 ms-auto d-flex align-items-center justify-content-center">
                <div class="calnder_select">
                    <i class="fa-solid fa-calendar-days fa-2x text-secondary ms-3 calender_button"></i>
                </div>
                <div class="this_month">
                    <h3 class="my-auto">
                        <span><i class="fa-solid fa-caret-left"></i></span>
                        &nbsp; 11月 &nbsp;
                        <span><i class="fa-solid fa-caret-right"></i></span>
                    </h3>
                </div>
        
      
                    
        
            </div>

        {{-- 月のイベント一覧 --}}
            <div class="small_events">
                @foreach (range(1, 3) as $i)
                    <div class="card border-0 shadow-sm d-flex justify-content-between">
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
    </div>
</div>
@endsection

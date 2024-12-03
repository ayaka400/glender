@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_events.css')}}">
@endsection

@section('title', 'Select Event')
    
@section('content')
    <div class="select_event_countainer mt-4">
        <div class="back_button mt-2">
          <a href="javascript:history.go(-1)">< Back</a>
        </div>
        <h2 class="ms-2 mb-0">イベントの編集</h2>
        <p class="ms-3 mt-4 ">編集したいイベントを選択してください。</p>

        <div class="filter_container">
            <form action="{{ route('events.select') }}" method="GET" class="mt-3 mb-4">
                <label for="country_id">国を選択：</label>
                <select name="country_id" id="country_id" onchange="this.form.submit()">
                    <option value="">全ての国</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" 
                            {{ isset($countryId) && $countryId == $country->id ? 'selected' : '' }}>
                            {{ $country->country_name }}
                        </option>
                    @endforeach
                </select>
            </form>

        <div class="small_events">
          @foreach ($events as $event)
            <a href="{{route('events.edit', $event->id )}}">
                <div class="card border-0 shadow-sm d-flex justify-content-between mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="event_name col">
                                {{-- <a href="#" class="col my-1"> --}}
                                    <h5>{{ $event->event_name }}</h5>
                                {{-- </a> --}}
                            </div>
                            <div class="country_name col-auto">
                                <h5 class="event_country my-1 align-items-end">
                                {{ $event->country->country_name }}
                                </h5>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col event_left">
                                <p class="event_date my-0 py-0">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('Y/m/d') }} 〜 
                                {{ \Carbon\Carbon::parse($event->end_date)->format('Y/m/d') }}
                            </p>
                                </p>
                                <p class="event_desc">
                                {{ Str::limit($event->description, 20) }}
                                </p>
                            </div>
                            <div class="col-auto event_picture d-flex flex-column align-items-end">
                                @if($event->event_image)
                                    <img src="{{ asset('storage/' . $event->event_image) }}" alt="{{ $event->event_name }}">
                                @else
                                    <p>No image</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </a>
          @endforeach
      </div>


    </div>
@endsection
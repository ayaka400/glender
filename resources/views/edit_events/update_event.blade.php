@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_events.css')}}">
@endsection

@section('title', 'Update Event')
    
@section('content')
    <div class="update_event_container">
      <div class="back_button mt-2">
        <a href="javascript:history.go(-1)">< Back</a>
      </div>
      <h2 class="ms-3 mb-0">イベントの編集・削除</h2>

      <div class="form_container">
          <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('PATCH')

            <div class="form_md">
              <label for="country_id" class="required">国名：</label>
              <select name="country_id" id="country_id">
                <option value="">選択してください</option>
                  @foreach ($countries as $country)
                      <option value="{{ $country->id }}" 
                          {{ old('country_id', $event->country_id) == $country->id ? 'selected' : '' }}>
                          {{ $country->country_name }}
                      </option>
                  @endforeach
              </select>
              @error('country_name')
                <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div class="form_md mb-4">
              <label for="event_name" class="required">イベント名：</label>
              <input type="text" name="event_name" id="event_name" value="{{ old('event_name', $event->event_name) }}" required>
              @error('event_name')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div class="form_img mb-4">
              <label for="event_image">イベント画像：</label>
              <input type="file" name="event_image" id="event_image">
              @if($event->event_image)
                  <p>現在の画像: <img src="{{ asset('storage/' . $event->event_image) }}" alt="event image" style="max-height: 100px;" class="mt-4"></p>
              @endif
              @error('event_image')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div class="form_md">
                <label for="start_date" class="required">日付・期間：</label>
                <div class="row">
                  <div class="col-5">
                      <input type="date" name="start_date" id="start_date" 
                          value="{{ old('start_date', $event->start_date) }}" required>
                      @error('start_date')
                          <p style="color: red;">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="col-1"><span>〜</span></div>
                  <div class="col-5">
                      <input type="date" name="end_date" id="end_date" 
                          value="{{ old('end_date', $event->end_date) }}">
                      @error('end_date')
                          <p style="color: red;">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
            </div>

            <div class="form_md">
                <label for="">イベントの概要：</label>
                <textarea name="description" id="description" cols="30" rows="3">{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form_md">
              <label for="">あいさつ：</label>
              <textarea name="greeting" id="greeting" cols="30" rows="3">{{ old('greeting', $event->greeting) }}</textarea>
              @error('greeting')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="row mt-2">
              <div class="col-6">
                  <div class="button_white_sm mt-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#delete-event-{{ $event->id }}">削除</button>
                  </div>
              </div>

              <div class="col-6">
                  <div class="button_green_sm mt-3">
                    <button type="submit">保存</button>
                  </div>
              </div>
            </div>
          </form>

          @include('modals.delete_event_modal')


      </div>
      
    </div>
@endsection
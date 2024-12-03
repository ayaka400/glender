@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_events.css')}}">
@endsection

@section('title', 'Add Event')
    
@section('content')
    <div class="add_event_container">
      <div class="back_button mt-2">
        <a href="javascript:history.go(-1)">< Back</a>
      </div>
      <h2 class="ms-3 mb-0">新しいイベントの追加</h2>

      <div class="form_container">
          <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf

            <div class="form_md">
              <label for="country_id" class="required">国名：</label>
              <select name="country_id" id="country_id" required>
                <option value="">選択してください</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}"
                      {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->country_name }}
                    </option>
                @endforeach
              </select>
              @error('country_name')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div class="form_md mb-4">
              <label for="event_name" class="required">イベント名：</label>
              <input type="text" name="event_name" id="event_name"  value="{{ old('event_name') }}" required>
              @error('event_name')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div class="form_img mb-4">
              <label for="event_image">イベント画像：</label>
              <input type="file" name="event_image" id="event_image">
              @error('event_image')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <div class="form_md">
                <label for="start_date" class="required">日付・期間：</label>
                <div class="row">
                  <div class="col-5">
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                    @error('start_date')
                      <p> style="color: red;”>{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="col-1"><span>〜</span></div>
                  <div class="col-5">
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
                    @error('end_date')
                      <p style="color: red;">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
            </div>

            <div class="form_md">
                <label for="description">イベントの概要：</label>
                <textarea name="description" id="description" cols="30" rows="3">{{ old('description') }}</textarea>
                @error('description')
                  <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="form_md">
              <label for="greeting">あいさつ：</label>
              <textarea name="greeting" id="greeting" cols="30" rows="3">{{ old('greeting') }}</textarea>
              @error('greeting')
                <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="button_green mt-4 text-center">
              <button type="submit">保存</button>
            </div>
            
          </form>
      </div>
      
    </div>
@endsection
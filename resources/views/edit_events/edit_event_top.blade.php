@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit_events.css')}}">
@endsection

@section('title', 'Edit Event')
    
@section('content')
    <div class="edit_event_container">
      <div class="page_title">
          <div class="back_button mt-2">
            <a href="javascript:history.go(-1)">< Back</a>
          </div>
          <h2 class="ms-3 fs-1">
            <i class="fa-solid fa-gear text-white"></i> イベントの編集
          </h2>
      </div>
      <div class="edit_event_selection">
          <div class="row mb-4">
              <a href="#" class=" d-flex justify-content-center button_green">
                <button type="button">新しいイベントの追加</button>
              </a>
              
          </div>
          <div class="row mt-4">
              <a href="#" class=" d-flex justify-content-center button_white">
                  <button type="button">作成したイベントの編集</button>
              </a>
        </div>
      </div>
    </div>
@endsection
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
          <form class="mt-3">
            <div class="form_md">
              <label for="" class="required">国名：</label>
              <select name="" id=""></select>
            </div>

            <div class="form_md mb-4">
              <label for="" class="required">イベント名：</label>
              <input type="text" name="country_name" id="">
            </div>

            <div class="form_img mb-4">
              <label for="">イベント画像：</label>
              <input type="file" name="" id="">
            </div>

            <div class="form_md">
                <label for="" class="required">日付・期間：</label>
                <input type="date" name="" id="">
            </div>

            <div class="form_md">
                <label for="">イベントの概要：</label>
                <textarea name="" id="" cols="30" rows="3"></textarea>
            </div>

            <div class="form_md">
              <label for="">あいさつ：</label>
              <textarea name="" id="" cols="30" rows="3"></textarea>
            </div>
            
            <div class="row mt-2">
              <div class="col-6">
                  <div class="button_white_sm mt-3">
                    <button type="submit">削除</button>
                  </div>
              </div>
              <div class="col-6">
                  <div class="button_green_sm mt-3">
                    <button type="submit">保存</button>
                  </div>
              </div>
          </div>
            
          </form>
      </div>
      
    </div>
@endsection
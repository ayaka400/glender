@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/countries.css')}}">
@endsection

@section('title', 'Add Country')
    
@section('content')
    <div class="add_country_container">
        <div class="back_button mt-2">
          <a href="#">< Back</a>
        </div>
        <h2 class="ms-3 mb-0"> 国の追加</h2>

        <div class="form_container">
            <form class="mt-3">
              <div class="form_md">
                <label for="" class="required">国名：</label>
                <input type="text" name="country_name" id="" required>
              </div>

              <div class="form_md">
                <label for="">首都：</label>
                <input type="text" name="country_name" id="">
              </div>

              <div class="form_md">
                <label for="">言語・宗教：</label>
                <input type="text" name="country_name" id="">
              </div>

              <div class="form_md">
                  <label for="">有名な観光地：</label>
                  <input type="text" name="" id="">
              </div>

              <div class="form_md">
                  <label for="">その他の説明：</label>
                  <textarea name="" id="" cols="30" rows="3"></textarea>
              </div>

              <div class="form_md">
                <label for="">あいさつ：</label>
                <textarea name="" id="" cols="30" rows="3"></textarea>
              </div>

              <div class="form_img">
                <label for="">国旗の画像：</label>
                <input type="file" name="" id="">
              </div>
              
              <div class="button_green mt-4 text-center">
                <button type="submit">保存</button>
              </div>
              
            </form>
        </div>
        
    </div>

@endsection

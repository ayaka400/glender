@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/countries.css')}}">
@endsection

@section('title', 'Add Country')
    
@section('content')
    <div class="add_country_container">
        <div class="back_button mt-2">
          <a href="javascript:history.go(-1)">< Back</a>
        </div>
        <h2 class="ms-3 mb-0"> 国の追加</h2>

        <div class="form_container">
            <form action="{{ route('countries.store') }}" method="POST" class="mt-3" enctype="multipart/form-data">
              @csrf

              <div class="form_md">
                <label for="country_name" class="required">国名：</label>
                <input type="text" name="country_name" id="country_name" value="{{ old('country_name') }}" required>
                @error('country_name')
                  <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>

              <div class="form_md">
                <label for="capital">首都：</label>
                <input type="text" name="capital" id="capital" value="{{ old('capital') }}">
                @error('capital')
                  <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>

              <div class="form_md">
                <label for="lang">言語：</label>
                <input type="text" name="lang" id="lang" value="{{ old('lang') }}">
                @error('lang')
                  <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>
              
              <div class="form_md">
                <label for="relig">宗教：</label>
                <input type="text" name="relig" id="relig" value="{{ old('relig') }}">
                @error('relig')
                  <p style="color: red;">{{ $message }}</p>
                @enderror
              </div>
              
              <div class="form_md">
                  <label for="tourist_spot">有名な観光地：</label>
                  <input type="text" name="tourist_spot" id="tourist_spot" value="{{ old('tourist_spot') }}">
                  @error('tourist_spot')
                    <p style="color: red;">{{ $message }}</p>
                  @enderror
              </div>

              <div class="form_md">
                  <label for="other_desc">その他の説明：</label>
                  <textarea name="other_desc" id="other_desc" cols="30" rows="3">{{ old('other_desc') }}</textarea>
                  @error('other_desc')
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
              

              <div class="form_img">
                <label for="flag_image">国旗の画像：</label>
                <input type="file" name="flag_image" id="flag_image" >
                @error('flag_image')
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

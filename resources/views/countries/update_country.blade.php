@extends('layouts.app')

@section('body-class', 'set_edit_bg')

@section('css')
<link rel="stylesheet" href="{{ asset('css/countries.css')}}">
@endsection

@section('title', 'Update Country')
    
@section('content')
    <div class="add_country_container">
      <div class="back_button mt-2">
        <a href="javascript:history.go(-1)">< Back</a>
      </div>
      <h2 class="ms-3 mb-0"> 国の編集・削除</h2>

      <div class="form_container">
          <form action="{{ route('countries.update', ['id' => $country->id]) }}"  method="POST" class="mt-3" enctype="multipart/form-data">
            @csrf
            @method('PATCH') 
            <div class="form_md">
              <label for="" class="required">国名：</label>
              <input type="text" name="country_name" id="country_name" value="{{ old('country_name', $country->country_name) }}" class="form-control" required>
            </div>

            <div class="form_md">
              <label for="capital">首都：</label>
              <input type="text" name="capital" id="capital" value="{{ old('capital', $country->capital) }}" class="form-control">
            </div>

            <div class="form_md">
              <label for="lang">言語：</label>
              <input type="text" name="lang" id="lang" value="{{ old('lang', $country->lang) }}" class="form-control">
            </div>

            <div class="form_md">
              <label for="relig">宗教：</label>
              <input type="text" name="relig" id="relig" value="{{ old('relig', $country->relig) }}" class="form-control">
            </div>

            <div class="form_md">
                <label for="">有名な観光地：</label>
                <input type="text" name="tourist_spot" id="tourist_spot" value="{{ old('tourist_spot', $country->tourist_spot) }}" class="form-control">
            </div>

            <div class="form_md">
                <label for="other_desc">その他の説明：</label>
                <textarea name="other_desc" id="other_desc" cols="30" rows="3" class="form-control">{{ old('other_desc', $country->other_desc) }}</textarea>
            </div>

            <div class="form_md">
              <label for="greeting">あいさつ：</label>
              <textarea name="greeting" id="greeting" cols="30" rows="3" class="form-control">{{ old('greeting', $country->greeting) }}</textarea>
            </div>

            <div class="form_img">
              <label for="flag_image">国旗の画像：</label>
              <input type="file" name="flag_image" id="flag_image" class="form-control">
              @if($country->flag_image)
                <div class="mt-2">
                  <img src="{{ asset('storage/' . $country->flag_image) }}" alt="Current Flag" style="width: 100px; height: auto;">
                </div>
              @endif
            </div>
            
            <div class="row mt-2">
                <div class="col-6">
                    <div class="button_white_sm mt-3">
                      <button type="button" data-bs-toggle="modal" data-bs-target="#delete-country-{{ $country->id }}">削除</button>
                    </div>
                </div>

                <div class="col-6">
                    <div class="button_green_sm mt-3">
                      <button type="submit">保存</button>
                    </div>
                </div>
            </div>
          </form>
        
          @include('modals.delete_country_modal')

        </div>
      
    </div>

@endsection

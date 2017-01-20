@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-heading">{{ $ad->user->username }}</div>
        <div class="panel-body">
          <h3>{{ $ad->title }}</h3>
          {{ $ad->description }}
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">Advertisements Media</div>
        <div class="panel-body">
          @include('Ads.partials.mediaSlide')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

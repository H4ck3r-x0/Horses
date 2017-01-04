@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h1>All Ads</h1>
          <p class="text-muted">You can watch and view all the advertisements.</p>
          @foreach ($ads as $ad)
            <div class="media">
              <div class="media-left media-middle">
                @foreach ($ad->adMedia as $media)
                  @foreach (unserialize($media->media) as $key => $image)
                    @if ($key > 0)
                      <a href="#">
                        <img class="media-object img-thumbnail img-responsive" width="200" src="{{ asset('storage/' . $image) }}" alt="">
                      </a>
                      @break
                    @endif
                  @endforeach
                @endforeach
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{ $ad->title }}</h4>
                {{ $ad->description }}
              </div>
            </div>

          @endforeach

        </div>
    </div>
</div>
@endsection

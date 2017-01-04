@extends('layouts.app')
<link rel="stylesheet" href="/css/dropzone.min.css">
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Add Media to your Advertisement</div>
                <div class="panel-body">
                  <h3>Choose a Photo for your advertisement.</h3>
                    <form id="dropzoneID" class="form-horizontal dropzone" role="form" method="POST" action="{{ route('storeMedia') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="ad_id" value="{{ $ad_id }}">
                    </form>
                    <button id="submit-all" class="btn btn-primary">Submit all files</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/dropzone.js"></script>
    <!-- Scripts -->
    <script>

      Dropzone.options.dropzoneID = {
        autoProcessQueue: false,
        uploadMultiple: true,
        maxFilesize: 2,
        addRemoveLinks: true,
        parallelUploads: 10,
        init: function () {
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;
            submitButton.addEventListener("click", function () {
                myDropzone.processQueue();
            });
            this.on("success", function(file){
                console.log(file.xhr.response);
            });
          }
      };

    </script>
</div>
@endsection

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
                    <form id="dropzoneID" class="form-horizontal dropzone" role="form" method="POST" action="{{ route('storeMedia') }}">
                        {{ csrf_field() }}
                    </form>
                    <button id="submit-all" class="btn btn-primary">Submit all files</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/dropzone.js"></script>
    <!-- Scripts -->
    <script>
      var cleanFilename = function (name) {
        var randomh= Math.random().toString(36).substr(2, 9);
        name = name.replace(/^.*[\\\/]([^\\\/]*)$/i,"$1");
        name = name.replace(/\s/g,"");
        name = name.toLowerCase();
        name = name.trim();
        return randomh + name;
      };
      Dropzone.options.dropzoneID = {
        maxFilesize: 2,
        addRemoveLinks: true,
        renameFilename: cleanFilename,
      };

    </script>
</div>
@endsection

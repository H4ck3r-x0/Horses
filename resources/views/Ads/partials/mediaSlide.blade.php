<div class="row">
  <div class="panel-heading">Photos</div>
  @foreach ($ad->adMedia as $media)
    @foreach (unserialize($media->media) as $key => $image)
     <div class="col-md-4" style="min-height:111px;">
       <div class="thumbnail" >
         <a data-toggle="modal" href="#media-{{ $key }}">
           <img src="{{ asset('storage/' . $image) }}" class="img-responsive">
         </a>
       </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="media-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title">Modal title</h4>
           </div>
           <div class="modal-body">
               <img class="img-responsive" src="{{ asset('storage/' . $image) }}" alt="image" />
           </div>
         </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
   @endforeach
 @endforeach
</div>

@extends('layouts.app')
@section('content')
<div class="box-typical box-typical-padding">
{{-- 							<article class="panel">
							<div class="panel-heading" role="tab" id="headingOne">
								<a data-toggle="collapse"
								   data-parent="#accordion"
								   href="#collapseOne"
								   aria-expanded="true"
								   aria-controls="collapseOne">
									Collapsible Group Item #1
									<i class="font-icon font-icon-arrow-down"></i>
								</a>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-collapse-in">
									<div class="user-card-row">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-photo">
												<a href="#">
													<img src="img/photo-64-2.jpg" alt="">
												</a>
											</div>
											<div class="tbl-cell">
												<p class="user-card-row-name"><a href="#">Maurico Estrella</a></p>
												<p class="user-card-row-location">Associate Creative Director @EF</p>
											</div>
										</div>
									</div>
									<header class="title">How a password changed my life</header>
									<p>«How could she do something like this to me?» said a voice in my head. All the time. Every day... <a href="#">More</a></p>
								</div>
							</div>
						</article>
 --}}
    <div>
        <center>
          <h3>Rapat {{$data['rapat']->title}}</h3>  
        </center>
    </div>
 	<article class="panel">
 		<div class="panel-heading" role="tab" id="headingOne">
			<a class="btn btn-rounded" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				 Informasi Rapat <i class="fa fa-angle-down ml-2 mr-1"></i>
			</a>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
		<div class="panel-collapse-in">
        <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="mb-2">Judul Rapat</label>
    			<input class="form-control" type="text" name="title" value="{{$data['rapat']->title}}" required="" readonly="">
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Level Rapat</label>
				<input class="form-control" type="text" name="level" value="{{$data['rapat']->level}}" required="" readonly="">
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Waktu Rapat</label>
                <input class="form-control" type="text" name="waktu" value="{{$data['rapat']->waktu}}" required="" readonly="">
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Tempat Rapat</label>
    			<input class="form-control" type="text" name="tempat" value="{{$data['rapat']->tempat}}" required="" readonly="">    			
    		</div>
    	</div>
    	<div class="col-md-6">
            <div class="form-group">
                <label class="mb-2">Peserta</label>
    			<select class="select2 form-control disabled" multiple="multiple" name="peserta[]" required="">
                    @foreach($data['peserta'] as $peserta)
                    	@if($peserta->peserta_aktif == 0)
                        	<option data-icon="font-icon-home" selected="" value="{{$peserta->id}}">{{$peserta->name}}</option>
                        @endif
                    @endforeach
    			</select>
            </div>
            <div class="form-group">
                <label class="mb-2">Notulen</label>
    			<select class="select2 form-control disabled" multiple="multiple" name="peserta[]" required="">
                    @foreach($data['peserta'] as $peserta)
                    	@if($peserta->peserta_aktif == 1)
                        	<option data-icon="font-icon-home" selected="" value="{{$peserta->id}}">{{$peserta->name}}</option>
                        @endif
                    @endforeach
    			</select>
            </div>      
            <div class="form-group">
                <label class="mb-2">Tags</label>
                <textarea id="tags-editor-textarea" rows="1" class="form-control" name="tags" readonly="">{{$data['rapat']->tag}}</textarea>
            </div>
    	</div>
    </div>
    </div>
	</div>
    </article>
</div>
<div class="box-typical box-typical-padding">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
	<div class="summernote-theme-1">
		<textarea class="summernote" rows="10" name="name">{{$data['rapat']->isi}}</textarea>
	</div>
</div>
<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script>

	function autosave(){
		var token = $('#token').val();
		var data = $('.summernote').val();
		$.ajax({
			type:'POST',
			url: "{!! URL::to('autosave-notulensi') !!}",
			dataType: 'JSON',
			data: {
                "_method": 'POST',
                "_token": token,
                "rapat_id" : {!! $data['rapat']->id !!},
                "isi" : data
			},
			success: function(return_value){
				console.log(return_value);
				if(return_value.status === "success"){
					console.log(return_value);
				}else if(return_value.status === "error"){
					console.log('0');
				}
			}
		});
	}

    $(document).ready(function() {
        $('.summernote').summernote({
            height : "500px",
            maxHeight : null,
            focus: true,
            placeholder: 'write here...',
            maximumImageFileSize: 524288 * 2,
            callbacks: {
                onKeyup: function(e) {
                    autosave();
                }
            }
        });
    });
    </script>

@endsection
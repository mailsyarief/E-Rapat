@extends('layouts.app')
@section('content')
<div class="box-typical box-typical-padding">
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

            <div class="form-group">
                <br>
                <button id="btnGroupDrop1" type="button" class="btn btn-default-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Attachment</button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    @foreach($data['rapat']->att as $att)
                        <a class="dropdown-item" href="{{ url('att-download/'.$att->id) }}">{{ $att->at_title }}</a>
                    @endforeach
                </div>                
            </div>            
    	</div>
    </div>
    </div>
	</div>
    <button id="bn-success" type="button" class="btn btn-success fade hidden">Success</button>
    </article>
</div>
<div class="box-typical box-typical-padding">
    <form action="/manualsave-notulensi" method="POST">
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="rapat_id" id="token" value="{{ $data['rapat']->id }}">
	<div class="summernote-theme-1">
		<textarea class="summernote" rows="10" name="isi">{{$data['rapat']->isi}}</textarea>
	</div>
    
    <input type="submit" class="btn btn-success btn-rounded float-right" name="" value="simpan">

    </form>
</div>

<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>

<script>

        var inactivityTime = function () {
        var t;
        window.onload = resetTimer;
        // DOM Events
        // document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;

        function logout() {
            autosave();
            $('#bn-success').click();
        }

        function resetTimer() {
            clearTimeout(t);
            t = setTimeout(logout, 5000)
            // 1000 milisec = 1 sec
        }
        };

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
				if(return_value === "success"){
					console.log('1');
				}else if(return_value === "error"){
					console.log('0');
				}
			}
		});
	}

    $(document).ready(function() {
        inactivityTime();
        $('.summernote').summernote({
            height : "500px",
            maxHeight : null,
            focus: true,
            placeholder: 'write here...',
            maximumImageFileSize: 324288,
        });
    });
    </script>

@endsection
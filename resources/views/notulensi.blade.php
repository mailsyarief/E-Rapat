@extends('layouts.app')
@section('content')
<div class="box-typical box-typical-padding">
    <div>
        <center>
          <h3>Rapat {{$data['rapat']->title}}</h3>  
        </center>
    </div>
    <hr>
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
<hr>
<div class="box-typical box-typical-padding">
	<div class="summernote-theme-1">
		<textarea class="summernote" name="name"></textarea>
	</div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="box-typical box-typical-padding">
    <div>
        <center>
          <h3>Rapat Baru</h3>  
        </center>
    </div>
    
    @if (session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif
    
    <form action="{{ url('/new-rapat') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
    	<div class="col-md-6">
    		<div class="form-group">
    			<label class="mb-2">Judul Rapat</label>
    			<input class="form-control" type="text" name="title" value="" required="">
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Level Rapat</label>
                <select class="select2-arrow manual select2-no-search-arrow" name="level" required="">
                    <option></option>
                    <option value="Fakultas">Fakultas</option>
                    <option value="Departemen">Departemen</option>
                    <option value="Prodi">Prodi</option>
                    <option value="RMK">RMK</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Waktu Rapat</label>
                <input id="flatpickr" class="form-control" data-enable-time="true" data-time_24hr="true" name="waktu" value="" required="">
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Tempat Rapat</label>
    			<input class="form-control" type="text" name="tempat" value="" required="">    			
    		</div>
    	</div>
    	<div class="col-md-6">
            <div class="form-group">
                <label class="mb-2">Peserta</label>
    			<select class="select2 form-control" multiple="multiple" name="peserta[]" required="">
                    @foreach($user as $peserta)
                        <option data-icon="font-icon-home" value="{{$peserta->id}}">{{$peserta->name}}</option>
                    @endforeach
    			</select>
            </div>
            <div class="form-group">
                <label class="mb-2">Notulen</label>
                <select class="select2 form-control" multiple="multiple" name="notulen[]" required="">
                    @foreach($user as $notul)
                        <option data-icon="font-icon-home" value="{{$notul->id}}">{{$notul->name}}</option>
                    @endforeach
                </select>
            </div>      
            <div class="form-group">
                <label class="mb-2">Tags</label>
                <textarea id="tags-editor-textarea" rows="1" class="form-control" name="tags"></textarea>
            </div>
            <div class="form-group">
                <label class="mb-2">Attachment</label>
                <input type="file" class="form-control" name="filename[]" multiple="">
            </div>
    	</div>
    </div>  
    <input class="btn btn-success btn-rounded float-right" type="submit" value="Buat Rapat"> 
    </form>
    
</div>
    <script src="js/lib/jquery/jquery-3.2.1.min.js"></script>

    <script>
        $(function() {
            $('#tags-editor-textarea').tagEditor();
        });
    </script>


@endsection

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
    	<div class="col-md-6 col-lg-6">
    		<div class="form-group">
    			<label class="mb-2">Judul Rapat</label>
    			<input class="form-control" type="text" name="title" value="" required="">
    		</div>            
    		<div class="form-group">
    			<label class="mb-2">Waktu Rapat</label>
                <input id="flatpickr" class="form-control" data-enable-time="true" data-time_24hr="true" name="waktu" value="" required="">
    		</div>
    		<div class="form-group">
    			<label class="mb-2">Tempat Rapat</label>
    			<input class="form-control" type="text" name="tempat" value="" required="">    			
    		</div>
            <div class="form-group">
                <label class="mb-2">Tags</label>
                <textarea id="tags-editor-textarea" rows="1" class="form-control" name="tags"></textarea>
            </div>           
    	</div>
    	<div class="col-md-6 col-lg-6">
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
                <label class="mb-2">Level Rapat</label>
                <select class="select2-arrow manual select2-no-search-arrow" name="level" required="" onchange="showfield(this.options[this.selectedIndex].value)">
                    <option></option>
                    <option value="Fakultas">Fakultas</option>
                    <option value="Departemen">Departemen</option>
                    <option value="Prodi">Prodi</option>
                    <option value="RMK">RMK</option>
                    <option value="Other" >Lain-Lain</option>
                </select>
                <div id="div1"><input class="form-control" type="text" name="level"/>
            </div>

            <div class="form-group"><br>
                <label class="mb-2">Attachment</label>
                <input type="file" class="form-control" name="filename[]" multiple="">
            </div>
            <div class="checkbox-toggle">
                <input type="checkbox" id="check-toggle-1"/>
                <label for="check-toggle-1">Private</label>
                <input type="hidden" name="isprivate" id="isPrivate" value="0">
            </div>
    	</div>
        <hr>

    </div>      
</div>
    <button class="btn btn-success float-right" type="submit" style="margin-top: -30px"><i class="fa fa-plus mr-1"></i> Buat Rapat</button>
    </form>

    <script src="js/lib/jquery/jquery-3.2.1.min.js"></script>

    <script type="text/javascript">
    $("#check-toggle-1").click(function() {
        if($("#check-toggle-1").is(':checked'))
            $('#isPrivate').val(1);
        else
            $('#isPrivate').val(0);
            
    });        
    </script>

    <script>
        $(function() {
            $('#tags-editor-textarea').tagEditor();
        });
    </script>


@endsection

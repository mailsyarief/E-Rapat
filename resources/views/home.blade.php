@extends('layouts.app')

@section('content')
<a href="{{ url('/rapat-saya') }}" class="btn btn-sm btn-info m-2"><i class="fa fa-book mr-2"></i>Rapat Saya</a>
<div class="box-typical box-typical-padding">
    <div>
        <center>
          <h3>Daftar Rapat</h3>  
        </center>
    </div>
    @if (session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif    
    <div>
        <table id="example" class="display table table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tfoot>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            <tbody>
                @foreach($data as $data)
                <tr>
                    <td><a href="{{ url('/notulensi/'. $data->id) }}">{{$data->title}}</a></td>
                    <td>{{$data->waktu}}</td>                    
                    <td>{{$data->tempat}}</td>
                    <td>{{$data->level}}</td>
                    <th>
                        @if($data->creator_id == Auth::id())
                            <a href="{{ url('/delete/'. $data->id) }}" class="btn btn-sm btn-warning swal-btn-cancel"><i class="fa fa-trash"></i></a>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>        
    </div>  
</div>

<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>

<script>
    $(function() {
        $('#example').DataTable({
            responsive: true
        });
    });

            $('.swal-btn-cancel').click(function(e){
                e.preventDefault();
                swal({
                            title: "Hapus Rapat?",
                            text: "Rapat akan terhapus secara permanen!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Ya, Saya yakin!",
                            cancelButtonText: "Tidak Jadi!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                swal({
                                    title: "Deleted!",
                                    text: "Rapat berhasil dihapus.",
                                    type: "success",
                                    confirmButtonClass: "btn-success"
                                }
                                );
                            } else {
                                swal({
                                    title: "Cancelled",
                                    text: "Gak Jadiii :)",
                                    type: "error",
                                    confirmButtonClass: "btn-danger"
                                });
                            }
                        });
            });    
</script>



@endsection

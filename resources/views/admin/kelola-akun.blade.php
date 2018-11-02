@extends('layouts.app')

@section('content')

<div class="box-typical box-typical-padding">
    <div>
        <center>
          <h3>Daftar Akun</h3>  
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Admin</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            <tbody>
                @foreach($data['user'] as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>                    
                    <td>{{$data->jabatan}}</td>
                    <td>{{$data->role}}</td>
                    <th>
                        <a href="{{ url('/delete/'. $data->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
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
</script>

@endsection

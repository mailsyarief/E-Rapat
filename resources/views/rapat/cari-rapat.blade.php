@extends('layouts.app')

@section('content')

<div class="box-typical box-typical-padding">
    <th>Nama</th>    
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

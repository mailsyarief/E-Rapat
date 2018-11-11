@extends('layouts.app')

@section('content')
<a href="{{ url('/rapat-saya') }}" class="btn btn-sm btn-info m-2"><i class="fa fa-book mr-2"></i>Rapat Saya</a>
<div class="box-typical box-typical-padding">
    @if (session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif 
    <div>
    	<p>
    		<pre>Dengan Hormat,
    		<pre>Sehubungan dengan diadakannya rapat {{ $rapat->title}} dengan tingkat {{ $rapat->Level}}. Kami mengundang Saudara untuk dapat menghadiri rapat tersebut yang akan diadakan pada :
    		<pre>Tanggal : {{ $rapat->waktu }} 
    		<pre>Tempat	: {{ $rapat->tempat }} 
    		<pre>Demikianlah undangan ini kami buat, diharapkan Saudara dapat hadir dalam acara tersebut. Atas perhatian dan partisipasinya kami mengucapkan terimakasih.


    	</p>       
    </div>  
</div>
@endsection

@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<br>
			<br>
			<br>
			<br>
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pemesanan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <br>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Tanggal Pengambilan</label>	
			  			<input type="date" name="tanggal_pengambilan" class="form-control" value="{{ $pemesanan->tanggal_pengambilan }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Tanggal Pengembalian</label>
						<input type="date" name="tanggal_pengembalian" class="form-control" value="{{ $pemesanan->tanggal_pengembalian }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Mobil</label>
						<input type="text" name="title" class="form-control" value="{{ $pemesanan->Mobil->nama_mobil }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Customer</label>
						<input type="text" name="title" class="form-control" value="{{ $pemesanan->Customer->nama }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Supir</label>
						<input type="text" name="title" class="form-control" value="{{ $pemesanan->Supir->nama }}"  readonly>
			  		</div>
			  		
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Merk 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $supir->nama }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">alamat</label>	
			  			<input type="text" name="alamat" class="form-control" value="{{ $supir->alamat }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">umur</label>	
			  			<input type="text" name="umur" class="form-control" value="{{ $supir->umur }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">harga</label>	
			  			<input type="text" name="harga" class="form-control" value="{{ $supir->harga }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection
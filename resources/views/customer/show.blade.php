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
			  			<input type="text" name="nama" class="form-control" value="{{ $customer->nama }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">alamat</label>	
			  			<input type="text" name="alamat" class="form-control" value="{{ $customer->alamat }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">no_nik</label>	
			  			<input type="text" name="no_nik" class="form-control" value="{{ $customer->no_nik }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">no_hp</label>	
			  			<input type="text" name="no_hp" class="form-control" value="{{ $customer->no_hp }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection
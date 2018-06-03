@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Dosen
			  	<div class="panel-title pull-right"><a href="{{ route('mobil.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama</th>
					  <th>Jenis Mobil</th>
					  <th>No Plat</th>
					  <th>Tahun Keluaran</th>
					  <th>Warna</th>
					  <th>Kapasitas</th>
					  <th>Perseneling</th>
					  <th>Stock</th>
					  <th>Harga</th>
					  <th>Merk</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($mobil as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama_mobil }}</td>
				    	<td>{{ $data->jenis_mobil }}</td>
				    	<td>{{ $data->no_plat }}</td>
				    	<td>{{ $data->tahun_keluaran }}</td>
				    	<td>{{ $data->warna }}</td>
				    	<td>{{ $data->kapasitas }}</td>
				    	<td>{{ $data->perseneling }}</td>
				    	<td>{{ $data->stock }}</td>
				    	<td>{{ $data->harga }}</td>
				    	<td>{{ $data->Merk->nama_merk }}</td>
				    	</li></td>
<td>
	<a class="btn btn-warning" href="{{ route('mobil.edit',$data->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('mobil.show',$data->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('mobil.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
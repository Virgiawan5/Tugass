@extends('layout.layout')

@section('title', 'Obat Dan Perlengkapan')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Obat Dan Perlengkapan</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
							    <a href="/tambah_obat" class="btn btn-success mb-3">Tambah</a>
								<div class="table-responsive">
								    
								    @if(session('sukses'))
								    <div class="alert alert-success my-4">
								        {{session('sukses')}}
								    </div>
								    @endif
								    
								    @if(session('hapus'))
								    <div class="alert alert-warning my-4">
								        {{session('hapus')}}
								    </div>
								    @endif
								    
								    @if(session('update'))
								    <div class="alert alert-info my-4">
								        {{session('update')}}
								    </div>
								    @endif
								    
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Jenis</th>
												<th>Stok</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php 
						//rumus: ($obat->currentPage()*data per halaman) - (data per halaman - 1)
						$i=($obat->currentPage()*10) - 9
						?>				    
						@foreach($obat as $o)					<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$o->nama}}</td>
												<td>{{$o->jenis}}</td>
												<td>{{$o->stok}}</td>
												<td>
                            <a href="/edit_obat/{{$o->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_obat">
                                @csrf
                                <input type="hidden" name="id" value="{{$o->id}}">
                                <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
							</form>					</td>
											</tr>
						@endforeach				</tbody>
									</table>
								</div><!-- bd -->
							{{$obat->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
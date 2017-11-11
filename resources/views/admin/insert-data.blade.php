@extends('layouts.app')

@section('content')

<div class="row"></div>

<div class="container" style="margin-top: 70px">
	<div class="col-md-12">
		<h1>Pencatatan</h1>
	</div>

	<div class="col-md-12">
		<div class="menu-header">
			<a href="/admin" @if(\Request::is('admin')) class="active" @endif><span class="fa fa-book"> </span> Lihat Data</a>
			<a href="/admin/insert" @if(\Request::is('admin/insert')) class="active" @endif><span class="fa fa-pencil"> </span>Data Baru</a>

			<div class="menu-header-border"></div>
		</div>

		<div style="border:solid 2px;border-top:none">
			<div class="col-md-3"></div>

			<div class="col-md-6">
				<div class="form-input" style="margin-top: 20px">
					@if(session('success'))
						<div class="text-center">
							<div class="panel panel-success">
				              <div class="panel-heading notification text-center">{{session('success')}}</div>
				            </div>
						</div>
	        		@endif

					<form class="form-horizontal" method="POST" action="{{ route('admin.insertProcess') }}" role="form" id="editForm">
	                    {!! csrf_field() !!}
						<div class="form-group">
			                <label for="editMaterialLength" class="col-md-4 control-label text-left">Nama Toko</label>

			                <div class="col-md-8">
			                    <input id="shopName" name="shopName" type="text" class="form-control" placeholder="Masukkan Nama Toko" required>
			                </div>
			            </div>

			            <div class="form-group">
			                <label for="editMaterialLength" class="col-md-4 control-label">Nama Barang</label>

			                <div class="col-md-8">
			                    <input id="shopStuff" type="text" name="shopStuff" class="form-control" placeholder="Masukkan Nama Barang" required>
			                </div>
			            </div>

			            <div class="form-group">
			                <label for="editMaterialLength" class="col-md-4 control-label">Jumlah</label>

			                <div class="col-md-8">
			                    <input id="shopTotal" name="shopTotal" type="text" class="form-control" placeholder="Masukkan Jumlah" required>
			                </div>
			            </div>

			            <div class="form-group">
			                <label for="editMaterialLength" class="col-md-4 control-label">Keterangan</label>

			                <div class="col-md-8">
			                    <textarea id="shopDescription" name="shopDescription" class="form-control" placeholder="Masukkan Keterangan" required style="resize: none;"></textarea>
			                </div>
			            </div>

			            <div class="form-group">
			            	<div class="col-md-12">
			            		<div class="pull-right">
			            		<button type="button" class="btn btn-default" id="clearForm"><span class="fa fa-close"></span> Hapus Form</button>
	                			<button type="submit" class="btn btn-primary" form="editForm"><span class="fa fa-save"></span> Simpan</button>
	                		</div>
			            	</div>
			            </div>
			        </form>
				</div>
			</div>
			<div class="row"></div>
		</div>

		<div class="col-md-3"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// $('#shopDate').datepicker({
  //           dateFormat: 'yy-mm-dd',
  //           regional: 'id',
  //           orientation: "auto"
  //       });

        $("#shopTotal").keypress(function (e) {
            if (e.which < 48 || 57 < e.which)
                e.preventDefault();
        });

        $('#clearForm').click(function(){
        	$('#shopName').val('');
        	$('#shopTotal').val('');
        	$('#shopDescription').val('');
        	$('#shopStuff').val('');
        });
	});
</script>

@endsection
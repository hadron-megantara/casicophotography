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

        @if(session('success'))
            <div class="text-center">
                <div class="panel panel-success">
                  <div class="panel-heading notification text-center">{{session('success')}}</div>
                </div>
            </div>
        @endif

        <div class="filterArea" style="border-left:solid 2px;border-right:solid 2px">
            <div class="form-group" style="height: 100%;margin-bottom: 0;">
                <div class="col-md-3">&nbsp;</div>

                <div class="col-md-2" style="padding-top:20px">
                    <select id="filterBy" class="form-control">
                        <option value="0" @if(!isset($_GET['status']) || $_GET['status'] == 0) selected="" @endif>Belum Selesai</option>
                        <option value="1" @if(isset($_GET['status']) && $_GET['status'] == 1) selected="" @endif>Telah Selesai</option>
                    </select>
                </div>

                <div class="col-md-2" style="padding-top:20px">
                    <input id="filterDateFrom" type="text" class="form-control" name="filterDateFrom" placeholder="Pilih Tanggal" style="position: relative; z-index: 100" @if(isset($_GET['dateFrom']) && $_GET['dateFrom'] != '') value="{{$_GET['dateFrom']}}" @endif />
                </div>

                <div class="col-md-2" style="padding-top:20px">
                    <input type="text" id ="filterDateTo" class="form-control filterDateTo" name="filterDateTo" placeholder="Pilih Tanggal" style="position: relative; z-index: 100" @if(isset($_GET['dateTo']) && $_GET['dateTo'] != '') value="{{$_GET['dateTo']}}" @endif />
                </div>

                <div class="col-md-2" style="padding-top:20px">
                    <button type="button" id="filterProcess" class="btn btn-primary" style="width: 100%"><span class="fa fa-search"> </span>Cari</button>
                </div>
                <div class="row" style="margin-top: -20px;margin-bottom: 0"></div>
            </div>
        </div>

        <div class="row"></div>

        <div style="border:solid 2px; border-top: none;padding-bottom: 30px">
    		<div class="table-responsive" style="margin: 0 20px;">
            	<table id="listTable" class="table-bordered">
            		<thead>
            			<tr>
            				<th class="text-center">Nama Toko</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center" style="width:50px">Jumlah</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Keterangan</th>
            				<th class="actions-column text-center">Aksi</th>
            			</tr>
            		</thead>
            		<tbody>
            		</tbody>
            	</table>
            </div>
        </div>
	</div>
</div>

<div id="modalEdit" class="modal fade" role="dialog" style="margin-top:1%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 24px;font-weight: bold">Ubah Data</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.editProcess') }}" role="form" id="editForm">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="editShopName" class="col-md-4 control-label">Nama Toko</label>

                        <div class="col-md-6">
                            <input id="editShopName" type="text" class="form-control" required placeholder="Masukkan Nama Toko" name="shopName">
                            <input id="editShopId" type="hidden" name="shopId" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editShopStuff" class="col-md-4 control-label">Nama Barang</label>

                        <div class="col-md-6">
                            <input id="editShopStuff" type="text" class="form-control" required placeholder="Masukkan Nama Barang" name="shopStuff">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editShopTotal" class="col-md-4 control-label">Jumlah Barang</label>

                        <div class="col-md-6">
                            <input id="editShopTotal" type="text" class="form-control" required placeholder="Masukkan Jumlah Barang" name="shopTotal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editShopDescription" class="col-md-4 control-label">Keterangan</label>

                        <div class="col-md-6">
                            <textarea id="editShopDescription" class="form-control" required placeholder="Masukkan Keterangan" name="shopDescription" style="resize: none"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                <button type="submit" class="btn btn-success" form="editForm"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </div>
    </div>
</div>

<div id="modalDelete" class="modal fade" role="dialog" style="margin-top:1%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 24px;font-weight: bold">Hapus Data</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.deleteProcess') }}" role="form" id="deleteForm">
                    {!! csrf_field() !!}

                    <label>Anda yakin ingin menghapus data ?</label>
                    
                    <p style="font-size: 14px;">
                        Nama Toko : <span id="deleteShopName"></span> <br/>
                        Nama Barang : <span id="deleteShopStuff"></span> <br/>
                        Jumlah : <span id="deleteShopTotal"></span> <br/>
                        Tanggal : <span id="deleteShopDate"></span> <br/>
                        Keterangan : <span id="deleteShopDescription"></span>
                    </p>

                    <input id="deleteShopId" type="hidden" class="form-control" name="shopId">
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                <button type="submit" class="btn btn-danger" form="deleteForm"><span class="fa fa-trash"></span> Hapus</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var t = $('#listTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.getData') }}'+"?status={{$status}}&dateFrom={{$dateFrom}}&dateTo={{$dateTo}}",
            columns: [
                { data: 'shop_name', name: 'shop_name' },
                { data: 'name', name: 'name'},
                { data: 'total', name: 'total'},

                { data: 'created_at', name: 'created_at', render: function(data, type, full){
                        var year = data.substring(0,4);
                        var month = data.substring(5,7);
                        var date = data.substring(8,10);
                        var dateTime = new Date(Date.UTC(year, month - 1, date));
                        var options = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
                        data = dateTime.toLocaleString("in-ID", options);
                        return data;
                    }
                },

                { data: 'description', name: 'description'},
                { data: 'id', name: 'id', orderable: false, render: function(data, type, full) {
                        var dataReturn = '<div class="text-center"><a class="btn btn-success editData" id="edit_'+data+'" href="#modalEdit" data-toggle="modal" title="Ubah Data" style="margin-right:10px"><span class="fa fa-pencil"></span></a><a class="btn btn-danger deleteData" id="delete_'+data+'" href="#modalDelete" data-toggle="modal" title="Hapus Data"><span class="fa fa-trash"></span></a>';

                        if(full.status == 0){
                            dataReturn = dataReturn + '<a class="btn btn-success activeData" id="check_'+data+'" href="{{ route('admin.checkProcess')}}?id='+data+'" title="Tandai Selesai" style="margin-left:10px"><span class="fa fa-check"></span></a>';
                        }

                        dataReturn = dataReturn + '<input type="hidden" id="shopName_'+data+'" value="'+full.shop_name+'" /><input type="hidden" id="shopStuff_'+data+'" value="'+full.name+'" /><input type="hidden" id="shopTotal_'+data+'" value="'+full.total+'" /><input type="hidden" id="shopDescription_'+data+'" value="'+full.description+'" /><input type="hidden" id="shopStatus_'+data+'" value="'+full.status+'" /><input type="hidden" id="shopDate_'+data+'" value="'+full.created_at+'" /></div>';

                        return dataReturn;
                    }
                }
            ],
            "oLanguage": {
                "sProcessing": "Memproses...",
                "sZeroRecords": "Tidak ada data untuk ditampilkan..."
            },
        });

        $("#listTable").on("click", ".editData", function(){
            var id = this.id;
            id = id.substring(5);

            $('#editShopId').val(id);
            $('#editShopName').val($('#shopName_'+id).val());
            $('#editShopStuff').val($('#shopStuff_'+id).val());
            $('#editShopDescription').val($('#shopDescription_'+id).val());
            $('#editShopTotal').val($('#shopTotal_'+id).val());
        });

        $("#listTable").on("click", ".deleteData", function(){
            var id = this.id;
            id = id.substring(7);

            $('#deleteShopId').val(id);
            $('#deleteShopName').html($('#shopName_'+id).val());
            $('#deleteShopStuff').html($('#shopStuff_'+id).val());
            $('#deleteShopDescription').html($('#shopDescription_'+id).val());
            $('#deleteShopTotal').html($('#shopTotal_'+id).val());
            $('#deleteShopDate').html($('#shopDate_'+id).val());
        });

        $("#listTable").on("click", ".activeData", function(){
            var id = this.id;
            id = id.substring(6);

            window.location = "{{ route('admin.index')}}" + '?status='+$("#filterBy").val()+'&dateFrom='+$("#filterDateFrom").val()+'&dateTo='+$("#filterDateTo").val();
        });

        $('#filterDateFrom').datepicker({
            dateFormat: 'yy-mm-dd',
            regional: 'id',
            orientation: "auto"
        });

        $('#filterDateTo').datepicker({
            dateFormat: 'yy-mm-dd',
            regional: 'id',
            orientation: "auto"
        });

        $('#filterProcess').click(function(){
            window.location = "{{ route('admin.index')}}" + '?status='+$("#filterBy").val()+'&dateFrom='+$("#filterDateFrom").val()+'&dateTo='+$("#filterDateTo").val();
        });
	});
</script>

@endsection
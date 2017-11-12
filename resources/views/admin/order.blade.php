@extends('layouts.app')

@section('content')

<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Pembukuan</h3>
            <div class="pull-right" style="margin-top: 5px">
                <a href="#modalAdd" class="btn btn-success btnAdd" data-toggle="modal"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
        </div>

        @if(session('success'))
            <div class="text-center">
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{session('success')}}
                </div>
            </div>
        @endif

        <div class="filterArea">
            <div class="form-group" style="height: 100%;margin-bottom: 0;">
                <div class="col-md-4">&nbsp;</div>

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

                <div class="row"></div>
            </div>
        </div>

        <div class="row"></div>

        <div class="table-responsive">
            <table id="listTable" class="table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nama Toko</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center" style="width:50px">Jumlah</th>
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

<div id="modalAdd" class="modal fade" role="dialog" style="margin-top:1%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 24px;font-weight: bold">Tambah Data Pembukuan</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.insertProcess') }}" role="form" id="addForm">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="editMaterialLength" class="col-md-4 control-label">Nama Toko</label>

                        <div class="col-md-6">
                            <input id="shopName" name="shopName" type="text" class="form-control" placeholder="Masukkan Nama Toko" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editMaterialLength" class="col-md-4 control-label">Nama Barang</label>

                        <div class="col-md-6">
                            <input id="shopStuff" type="text" name="shopStuff" class="form-control" placeholder="Masukkan Nama Barang" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editMaterialLength" class="col-md-4 control-label">Jumlah</label>

                        <div class="col-md-6">
                            <input id="shopTotal" name="shopTotal" type="text" class="form-control" placeholder="Masukkan Jumlah" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editMaterialLength" class="col-md-4 control-label">Keterangan</label>

                        <div class="col-md-6">
                            <textarea id="shopDescription" name="shopDescription" class="form-control" placeholder="Masukkan Keterangan" required style="resize: none;"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                <button type="submit" class="btn btn-success" form="addForm"><span class="fa fa-save"></span> Simpan</button>
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
                { data: 'shop_name', name: 'shop_name' },
                { data: 'name', name: 'name'},
                { data: 'total', name: 'total'},
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
            "order": [[ 0, "desc" ]],
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

            window.location = "{{ route('admin.order')}}" + '?status='+$("#filterBy").val()+'&dateFrom='+$("#filterDateFrom").val()+'&dateTo='+$("#filterDateTo").val();
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
            window.location = "{{ route('admin.order')}}" + '?status='+$("#filterBy").val()+'&dateFrom='+$("#filterDateFrom").val()+'&dateTo='+$("#filterDateTo").val();
        });

        $("#shopTotal").keypress(function (e) {
            if (e.which < 48 || 57 < e.which)
                e.preventDefault();
        });

        $('.btnAdd').click(function(){
            $('#shopName').val('');
            $('#shopTotal').val('');
            $('#shopDescription').val('');
            $('#shopStuff').val('');
        });
	});
</script>

@endsection
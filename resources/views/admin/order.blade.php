@extends('layouts.app')

@section('content')

<div class="page-content">
    <div class="content">
        <div class="page-title">
            <h3>Pembukuan</h3>
            <div class="pull-right" style="margin-top: 5px">
                <a href="#modalAdd" class="btn btn-success btnAdd" data-toggle="modal" style="font-weight: bold;"><span class="fa fa-plus"></span> Tambah Data</a>
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

                <div class="col-md-2" style="padding-top:20px;padding-right: 0">
                    <button type="button" id="filterProcess" class="btn btn-primary" style="width: 100%; font-weight: bold;"><span class="fa fa-search"> </span>Cari</button>
                </div>

                <div class="row"></div>
            </div>
        </div>

        <div class="row"></div>

        <div class="table-responsive">
            <table id="listTable" class="table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px">Tanggal</th>
                        <th class="text-center">Nama Toko</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center" style="width:30px">Jumlah</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center" style="width: 50px">Harga Satuan</th>
                        <th class="text-center">Total Harga</th>
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
    <div class="modal-dialog" style="width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 24px;font-weight: bold">Tambah Data Pembukuan</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.insertProcess') }}" role="form" id="addForm">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="editMaterialLength" class="col-md-12 control-label">Nama Toko</label>

                            <div class="col-md-12">
                                <input id="shopName" name="shopName" type="text" class="form-control" placeholder="Masukkan Nama Toko" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="editMaterialLength" class="col-md-12 control-label">Nama Barang</label>

                            <div class="col-md-12">
                                <input id="shopStuff" type="text" name="shopStuff" class="form-control" placeholder="Masukkan Nama Barang" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                             <label for="editMaterialLength" class="col-md-12 control-label">Jumlah</label>

                            <div class="col-md-12">
                                <input id="shopTotal" name="shopTotal" type="text" class="form-control" placeholder="Masukkan Jumlah" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="shopCustomerType" class="col-md-12 control-label">Tipe Pelanggan</label>

                            <div class="col-md-12">
                                <select id="shopCustomerType" name="shopCustomerType" class="form-control" required>
                                    <option value="">Pilih Tipe Pelanggan</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="studio">Studio</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                             <label for="shopModel" class="col-md-12 control-label">Model</label>

                            <div class="col-md-12">
                                <input id="shopModel" name="shopModel" type="text" class="form-control" placeholder="Masukkan Model" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="shopDescription" class="col-md-12 control-label">Keterangan</label>

                            <div class="col-md-12">
                                <textarea id="shopDescription" name="shopDescription" class="form-control" placeholder="Masukkan Keterangan" required style="resize: none;" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="shopPrice" class="col-md-12 control-label">Harga</label>

                            <div class="col-md-12">
                                <input id="shopPrice" type="text" class="form-control" placeholder="Masukkan Harga" required>
                                <input id="shopPriceHidden" type="hidden" name="shopPrice" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="shopPrice" class="col-md-12 control-label">Total Harga</label>

                            <div class="col-md-12">
                                <input id="shopTotalPrice" type="text" class="form-control" placeholder="Rp 0" required>
                                <input id="shopTotalPriceHidden" type="hidden" name="shopTotalPrice" required>
                            </div>
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

<div id="modalEdit" class="modal fade" role="dialog" style="margin-top:1%;">
    <div class="modal-dialog" style="width: 900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="font-size: 24px;font-weight: bold">Detail Data Pembukuan</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.editProcess') }}" role="form" id="editForm">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="editS" class="col-md-12 control-label">Nama Toko</label>

                            <div class="col-md-12">
                                <input id="editShopName" name="shopName" type="text" class="form-control" placeholder="Masukkan Nama Toko" required>
                                <input id="editShopId" name="shopId" type="hidden">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="editShopStuff" class="col-md-12 control-label">Nama Barang</label>

                            <div class="col-md-12">
                                <input id="editShopStuff" type="text" name="shopStuff" class="form-control" placeholder="Masukkan Nama Barang" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                             <label for="editShopTotal" class="col-md-12 control-label">Jumlah</label>

                            <div class="col-md-12">
                                <input id="editShopTotal" name="shopTotal" type="text" class="form-control" placeholder="Masukkan Jumlah" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="editShopCustomerType" class="col-md-12 control-label">Tipe Pelanggan</label>

                            <div class="col-md-12">
                                <select id="editShopCustomerType" name="shopCustomerType" class="form-control" required>
                                    <option value="">Pilih Tipe Pelanggan</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="studio">Studio</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6">
                             <label for="editShopModel" class="col-md-12 control-label">Model</label>

                            <div class="col-md-12">
                                <input id="editShopModel" name="shopModel" type="text" class="form-control" placeholder="Masukkan Model" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="editShopDescription" class="col-md-12 control-label">Keterangan</label>

                            <div class="col-md-12">
                                <textarea id="editShopDescription" name="shopDescription" class="form-control" placeholder="Masukkan Keterangan" required style="resize: none;" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="editShopPrice" class="col-md-12 control-label">Harga</label>

                            <div class="col-md-12">
                                <input id="editShopPrice" type="text" class="form-control" placeholder="Masukkan Harga" required>
                                <input id="editShopPriceHidden" type="hidden" name="shopPrice" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="editShopTotalPrice" class="col-md-12 control-label">Total Harga</label>

                            <div class="col-md-12">
                                <input id="editShopTotalPrice" type="text" class="form-control" placeholder="Rp 0" required>
                                <input id="editShopTotalPriceHidden" type="hidden" name="shopTotalPrice" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
                <button type="submit" class="btn btn-success" form="editForm"><span class="fa fa-pencil"></span> Ubah</button>
                <a class="btn btn-primary" id="setAsDone"><span class="fa fa-check"></span> Tandai Selesai</a>
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

                    <div class="text-center">
                        <div class="alert alert-danger text-center" style="font-size: 18px">
                            Anda yakin ingin menghapus data ?
                        </div>
                    </div>
                    
                    <p style="font-size: 14px;">
                        Nama Toko : <span id="deleteShopName"></span> <br/>
                        Nama Barang : <span id="deleteShopStuff"></span> <br/>
                        Jumlah : <span id="deleteShopTotal"></span> <br/>
                        Tanggal : <span id="deleteShopDate"></span> <br/>
                        Tipe Pelanggan : <span id="deleteShopCustomerType"></span> <br/>
                        Model : <span id="deleteShopModel"></span> <br/>
                        Keterangan : <span id="deleteShopDescription"></span> <br/>
                        Harga Satuan : <span id="deleteShopPrice"></span> <br/>
                        Total Harga : <span id="deleteShopTotalPrice"></span>
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
                { data: 'shop_name', name: 'shop_name', render: function(data, type, full){
                        return "<div class='text-center'>"+data+"</div>";
                    }
                },
                { data: 'name', name: 'name', render: function(data, type, full){
                        return "<div class='text-center'>"+data+"</div>";
                    }
                },
                { data: 'total', name: 'total', render: function(data, type, full){
                        return "<div class='text-center'>"+data+"</div>";
                    }
                },
                { data: 'description', name: 'description'},
                { data: 'price', name: 'price', render: function(data, type, full) {
                        data = data.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        return "<div class='text-center'>Rp "+data+"</div>";
                    } 
                },
                { data: 'total_price', name: 'total_price', render: function(data, type, full) {
                        data = data.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        return "<div class='text-center'>Rp "+data+"</div>";
                    } 
                },
                { data: 'id', name: 'id', orderable: false, render: function(data, type, full) {
                        var dataReturn = '<div class=""><a class="btn btn-success editData" id="edit_'+data+'" href="#modalEdit" data-toggle="modal" title="Lihat Data" style="margin-right:5px"><span class="fa fa-search"></span></a><a class="btn btn-danger deleteData" id="delete_'+data+'" href="#modalDelete" data-toggle="modal" title="Hapus Data"><span class="fa fa-trash"></span></a>';

                        dataReturn = dataReturn + '<input type="hidden" id="shopName_'+data+'" value="'+full.shop_name+'" /><input type="hidden" id="shopStuff_'+data+'" value="'+full.name+'" /><input type="hidden" id="shopTotal_'+data+'" value="'+full.total+'" /><input type="hidden" id="shopDescription_'+data+'" value="'+full.description+'" /><input type="hidden" id="shopStatus_'+data+'" value="'+full.status+'" /><input type="hidden" id="shopDate_'+data+'" value="'+full.created_at+'" /><input type="hidden" id="shopPrice_'+data+'" value="'+full.price+'" /><input type="hidden" id="shopTotalPrice_'+data+'" value="'+full.total_price+'" /><input type="hidden" id="shopCustomerType_'+data+'" value="'+full.customer_type+'" /><input type="hidden" id="shopModel_'+data+'" value="'+full.model+'" /></div>';

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
            $('#editShopCustomerType').val($('#shopCustomerType_'+id).val());
            $('#editShopModel').val($('#shopModel_'+id).val());
            $('#editShopTotal').val($('#shopTotal_'+id).val());
            $('#editShopPrice').val($('#shopPrice_'+id).val());
            $('#editShopPriceHidden').val($('#shopPrice_'+id).val());
            $('#editShopTotalPrice').val($('#shopTotalPrice_'+id).val());
            $('#editShopTotalPriceHidden').val($('#shopTotalPrice_'+id).val());
            $('#editShopCustomerType').val($('#shopCustomerType_'+id).val());
            $('#editShopModel').val($('#shopModel_'+id).val());

            $('#editShopPrice').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });

            $('#editShopTotalPrice').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });
        });

        $("#listTable").on("click", ".deleteData", function(){
            var id = this.id;
            id = id.substring(7);

            $('#deleteShopId').val(id);
            $('#deleteShopName').html($('#shopName_'+id).val());
            $('#deleteShopStuff').html($('#shopStuff_'+id).val());
            $('#deleteShopDescription').html($('#shopDescription_'+id).val());
            $('#deleteShopCustomerType').html($('#shopCustomerType_'+id).val());
            $('#deleteShopModel').html($('#shopModel_'+id).val());
            $('#deleteShopTotal').html($('#shopTotal_'+id).val());
            $('#deleteShopDate').html($('#shopDate_'+id).val());
            $('#deleteShopPrice').html($('#shopPrice_'+id).val());
            $('#deleteShopTotalPrice').html($('#shopTotalPrice_'+id).val());

        });

        $("#listTable").on("click", ".activeData", function(){
            var id = this.id;
            id = id.substring(6);

            window.location = "{{ route('admin.order')}}" + '?status='+$("#filterBy").val()+'&dateFrom='+$("#filterDateFrom").val()+'&dateTo='+$("#filterDateTo").val();
        });

        $('#setAsDone').click(function(){
            window.location = "{{ route('admin.checkProcess')}}" + '?id='+$("#editShopId").val();
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

        $("#shopTotalPrice").keypress(function (e) {
            e.preventDefault();
        });

        $('#shopTotal').keyup(function(){
            var number = $('#shopPrice').val().split('.').join("");
            number = number.replace(/Rp /gi,'');

            $('#shopTotalPrice').val(number*$(this).val());
            
            $('#shopTotalPrice').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });
            
            $('#shopTotalPriceHidden').val(number*$('#shopTotal').val());
        });

        $('#editShopTotal').keyup(function(){
            var number = $('#editShopPrice').val().split('.').join("");
            number = number.replace(/Rp /gi,'');

            $('#editShopTotalPrice').val(number*$(this).val());
            
            $('#editShopTotalPrice').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });
            
            $('#editShopTotalPriceHidden').val(number*$('#editShopTotal').val());
        });

        $('.btnAdd').click(function(){
            $('#shopName').val('');
            $('#shopTotal').val('');
            $('#shopDescription').val('');
            $('#shopStuff').val('');
        });

        $('#shopPrice').keyup(function(){
            var number = $(this).val().split('.').join("");
            number = number.replace(/Rp /gi,'');
            $('#shopPriceHidden').val(number);

            $('#shopTotalPrice').val(number*$('#shopTotal').val());
                $('#shopTotalPrice').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });

            $('#shopTotalPriceHidden').val(number*$('#shopTotal').val());
        });

        $('#editShopPrice').keyup(function(){
            var number = $(this).val().split('.').join("");
            number = number.replace(/Rp /gi,'');
            $('#editShopPriceHidden').val(number);

            $('#editShopTotalPrice').val(number*$('#editShopTotal').val());
                $('#editShopTotalPrice').priceFormat({
                prefix: 'Rp ',
                centsLimit: 0,
                thousandsSeparator: '.'
            });

            $('#editShopTotalPriceHidden').val(number*$('#editShopTotal').val());
        });

        $('#shopPrice').priceFormat({
            prefix: 'Rp ',
            centsLimit: 0,
            thousandsSeparator: '.'
        });
	});
</script>

@endsection
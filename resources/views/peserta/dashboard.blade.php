@extends('layout.dashboard-template')

@section('title')
    Dashboard - ITCC 2018
@endsection

@section('content')
<div class="container-fluid">
    <!-- OVERVIEW -->
    
    <!-- END OVERVIEW -->
    <div class="row">
        <div class="col-md-6">
            <!-- DATA TIM -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Tim</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><b>Kode</b></td>
                                <td><b>{{Auth::user()->id}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Tim</b></td>
                                <td><b>{{Auth::user()->group_name}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Asal Institusi</b></td>
                                <td><b>{{Auth::user()->institution}}</b></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td>@if(Auth::user()->verified==1)
                                    Telah Terverifikasi <i class="glyphicon glyphicon-ok" style="color:green"></i>
                                    @else
                                    Belum Terverifikasi <i class="glyphicon glyphicon-remove" style="color:red"></i><br>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DATA TIM -->
        </div>
        <div class="col-md-6">
            <!-- PEMBERITAHUAN -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Pemberitahuan!</h3>
                    <div class="right">
                        <button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="alert alert-warning">
                        <p style="font-weight:bold">Hai, {{Auth::user()->group_name}}.</p>
                        <p style="text-align: justify;text-justify: inter-word;">Pastikan Anda telah melengkapi data peserta, biaya pendaftaran dan memverifikasikan data ke panitia ITCC 2018. Salam hangat dari admin ITCC 2018. Semangat dan sukses ! </p>
                     </div>
                </div>
            </div>
            <!-- END PEMBERITAHUAN -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- DATA ANGGOTA -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Data Anggota Tim</center></h3>
                </div>
                <div class="panel-body">
                    
                    <!--Pemberitahuan Tambah Anggota-->
                    <div class="alert alert-danger">
                        <p>Hai, <i>nama tim</i> pastikan jumlah anggota tim anda telah lengkap. Silakan tambahkan data anggota tim anda melalui tombol berikut</p><br>
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalTambah">Tambah Anggota Tim</button>
                    </div>
                    <!--End Pemberitahuan Tambah Anggota-->

                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>Kartu Identitas</th>
                               <th>Nomor Peserta</th>
                               <th>Nama Lengkap</th>
                               <th>Tanggal Lahir</th>
                               <th>Email</th>
                               <th>Nomer Kontak</th>
                               <th>Veget</th>
                               <th>Kaos</th>
                               <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participants as $participant)
                            <tr>
                                <td>{{$participant->id}}</td>
                                <td>{{($participant->code=='')?"Belum Verifikasi":$participant->code}}</td>
                                <td>{{$participant->full_name}}</td>
                                <td>{{$participant->birthdate}}</td>
                                <td>{{$participant->email}}</td>
                                <td>{{$participant->contact}}</td>
                                <td>{{($participant->vegetarian==1)?"Ya":"Tidak"}}</td>
                                <td>{{($participant->buy_shirt==1)?"Ya":"Tidak"}}</td>
                                <td><a class="btn btn-warning btn-sm edit" title="Edit" style="margin:2px;" data-toggle="modal" type="button" data-target="#modalEdit"><i class="glyphicon glyphicon-pencil"></i></a> 
                                    <a class="btn btn-danger btn-sm" style="margin:2px;" title="Hapus" data-toggle="modal" type="button" data-target="#modalDelete"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DATA ANGGOTA -->
        </div>
    </div>

    <!--Modal Tambah Anggota-->
    <div class="modal fade" id="modalTambah" role="dialog">
        <div class="modal-dialog"> 
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Daftar Anggota Tim</center></h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="form-horizontal" accept-charset="utf-8">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" name="fullname" class="form-control" placeholder="ex. 'Nama Brata'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="birthday" placeholder="ex. '1995/12/27'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="ex. 'mail@site.com'" name="email" required="required" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Kontak</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="ex. '081632111111'" name="contact" required="required" type="number" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Vegetarian</label>
                            <div class="col-md-9">
                                <label><input type="radio" value="Y" name="vegetarian" required="required"> Ya </label> <label><input type="radio" value="N" name="vegetarian" required="required"> Tidak</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kartu Identitas</label>
                            <div class="col-md-9">
                                <input name="photo" type="file" class="form-control" accept="image/*">
                                <small>Gambar dalam bentuk file .jpg</small>                      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Baju Peserta</label>
                            <div class="col-md-9">
                                <label><input {{ old('buy_shirt')=="1"?"checked":"" }} type="radio" id="baju-yes" value="1" name="buy_shirt"> Ya </label> <label><input {{ old('buy_shirt')=="0"?"checked":"" }} type="radio" id="baju-no" value="0" name="buy_shirt"> Tidak</label><br>
                                <small>Apabila Anda membeli baju peserta, akan dikenakan biaya tambahan sebesar Rp....</small>
                            </div>
                        </div>
                        <div class="form-group" id="ukuran-baju" style="display: none;">
                            <label class="control-label col-md-3">Ukuran Baju</label>
                            <div class="col-md-9">
                                <select id="select-ukuran" name="size" class="form-control" >
                                    <option disabled selected>Pilih Ukuran Baju</option>
                                    <option value="s">Small</option>
                                    <option value="m">Medium</option> 
                                    <option value="l">Large</option>
                                    <option value="xl">Extra Large</option>          
                                </select>
                                <small>*peserta yang lolos babak penyisihan akan mendapatkan baju official ITCC 2017. Size Chart dapat dilihat</small> <a data-toggle="modal" data-target="#sizeChart">DISINI</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Tambah Anggota-->

    <!--Modal Edit Anggota-->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog"> 
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Edit Data Anggota Tim</center></h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="form-horizontal" accept-charset="utf-8">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" name="fullname" class="form-control" placeholder="ex. 'Nama Brata'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-9">
                                <input class="form-control" type="date" name="birthday" placeholder="ex. '1995/12/27'">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="ex. 'mail@site.com'" name="email" required="required" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nomor Kontak</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="ex. '081632111111'" name="contact" required="required" type="number" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Vegetarian</label>
                            <div class="col-md-9">
                                <label><input type="radio" value="Y" name="vegetarian" required="required"> Ya </label> <label><input type="radio" value="N" name="vegetarian" required="required"> Tidak</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Kartu Identitas</label>
                            <div class="col-md-9">
                                <input name="photo" type="file" class="form-control" accept="image/*">
                                <small>Gambar dalam bentuk file .jpg</small>                      
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Baju Peserta</label>
                            <div class="col-md-9">
                                <label><input {{ old('buy_shirt')=="1"?"checked":"" }} type="radio" id="baju-yes" value="1" name="buy_shirt"> Ya </label> <label><input {{ old('buy_shirt')=="0"?"checked":"" }} type="radio" id="baju-no" value="0" name="buy_shirt"> Tidak</label><br>
                                <small>Apabila Anda membeli baju peserta, akan dikenakan biaya tambahan sebesar Rp....</small>
                            </div>
                        </div>
                        <div class="form-group" id="ukuran-baju" style="display: none;">
                            <label class="control-label col-md-3">Ukuran Baju</label>
                            <div class="col-md-9">
                                <select id="select-ukuran" name="size" class="form-control" >
                                    <option disabled selected>Pilih Ukuran Baju</option>
                                    <option value="s">Small</option>
                                    <option value="m">Medium</option> 
                                    <option value="l">Large</option>
                                    <option value="xl">Extra Large</option>          
                                </select>
                                <small>*peserta yang lolos babak penyisihan akan mendapatkan baju official ITCC 2017. Size Chart dapat dilihat</small> <a data-toggle="modal" data-target="#sizeChart">DISINI</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Edit Anggota-->

    <!-- Modal Delete -->
    <div id="modalDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Konfirmasi</center></h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="#">
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal Delete -->

</div>
@endsection


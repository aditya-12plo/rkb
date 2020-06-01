<style>

</style>
@extends('layouts.client')

@section('content-client')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft" style="text-align:center; font-size:3em; ">@if(Config::get('app.locale') == 'id') Riwayat Deposit @elseif(Config::get('app.locale') == 'cn') 存款记录 @else Deposit History @endif</h3>
            </div>
        </div>
    </div>

   <div class="col-md-12 padding-5">
       <div class="panel">
          <div class="panel-body">
              <div class="col-md-12">
                    <div class="col-sm-12 col-md-6">
                        <div id="zero_configuration_table_length" class="dataTables_length">
                            <div class="row row-xs">
                                <div class="col-md-6">
                                    <label>
                                            @if(Config::get('app.locale') == 'id') Mulai Tanggal : @elseif(Config::get('app.locale') == 'cn')  起始日期： @else Date From : @endif</label>
                                    <div>
                                    <input type="text" placeholder="YYYY-MM-DD" autocomplete="off">  
                                    </div>  
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <label>@if(Config::get('app.locale') == 'id') Sampai Tanggal : @elseif(Config::get('app.locale') == 'cn') 截止日期： @else Date To : @endif</label>
                                    <div>
                                        <input type="text" placeholder="YYYY-MM-DD" autocomplete="off">  
                                    </div>    
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <label>@if(Config::get('app.locale') == 'cn') 搜索 ： @else Search for :  @endif</label>
                                    <input type="text" placeholder="@if(Config::get('app.locale') == 'id') ID Akun @elseif(Config::get('app.locale') == 'cn') 帐户ID @else Account ID @endif" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-12">
                                    <br> 
                                    <button class="btn btn-primary m-1"><i class="fa fa-search"></i> @if(Config::get('app.locale') == 'id') Cari @elseif(Config::get('app.locale') == 'cn') 寻找它 @else Search @endif</button> <button class="btn btn-warning m-1"><i class="fa fa-retweet"></i>@if(Config::get('app.locale') == 'id')  Ulangi Pencarian @elseif(Config::get('app.locale') == 'cn') 重复搜寻 @else Repeat search @endif</button> 
                                    <button type="button" class="btn btn-info m-1"><i class="fa fa-plus"></i>@if(Config::get('app.locale') == 'id')  Tambah Deposit @elseif(Config::get('app.locale') == 'cn') 添加存款 @else Add Deposit  @endif</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                            <div id="DataTables_Table_0_length" class="dataTables_length">
                                    <label>
                                        @if(Config::get('app.locale') == 'cn') 每页 :@else Per Page :@endif <br>
                                        <select  name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                    </div>
              </div>
              <div class="col-md-12">
                <table id="realaccount_table" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>@if(Config::get('app.locale') == 'cn') 数 @else No @endif</th>
                            <th>@if(Config::get('app.locale') == 'id') ID Akun @elseif(Config::get('app.locale') == 'cn') 帐户ID @else Account ID @endif</th>
                            <th>@if(Config::get('app.locale') == 'id') Jumlah Deposit @elseif(Config::get('app.locale') == 'cn') 存款金额 @else Deposit Amount @endif</th>
                            <th>@if(Config::get('app.locale') == 'id') Download Lampiran @elseif(Config::get('app.locale') == 'cn') 下载附件 @else Download Attachments @endif</th>
                            <th>@if(Config::get('app.locale') == 'id') Pesan @elseif(Config::get('app.locale') == 'cn') 信息 @else Mail @endif</th>
                            <th>@if(Config::get('app.locale') == 'cn') 状态 @else Status @endif</th>
                            <th>@if(Config::get('app.locale') == 'id') Tanggal Pengajuan @elseif(Config::get('app.locale') == 'cn') 申请日期 @else Date of Filing @endif</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    </table>
            </div>
          </div>
       </div>
   </div>

@endsection
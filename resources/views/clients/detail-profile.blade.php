<style>

</style>
@extends('layouts.client')

@section('content-client')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft" style="text-align:center; font-size:3em; ">@if(Config::get('app.locale') == 'id') Perubahan Detail Kontak @elseif(Config::get('app.locale') == 'cn') 更改联系方式 @else Change in Contact Details @endif</h3>
            </div>
        </div>
    </div>
    <form method="POST"><div class="col-md-12 padding-0">
        <div class="panel form-element-padding">
            <div class="panel-body" style="padding-bottom: 30px;">
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Negara <span style="color: red;">*</span> @elseif(Config::get('app.locale') == 'cn') 国家<span style="color: red;">*</span> @else Country <span style="color: red;">*</span>@endif</label> 
                    <select required="required" aria-required="true" class="form-control" name="negara"></select>
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Provinsi <span style="color: red;">*</span> @elseif(Config::get('app.locale') == 'cn') 省 <span style="color: red;">*</span>@else Province <span style="color: red;">*</span>@endif</label> 
                    <input type="text" required="required" aria-required="true" class="form-control" name="provinsi">
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Kota <span style="color: red;">*</span> @elseif(Config::get('app.locale') == 'cn') 市 <span style="color: red;">*</span>@else City <span style="color: red;">*</span>  @endif</label> 
                    <input type="text" required="required" aria-required="true" class="form-control">
                </div> 
                <div class="form-group col-lg-12"><label for="input1">@if(Config::get('app.locale') == 'id') Kecamatan @elseif(Config::get('app.locale') == 'cn') 分地区 @else Sub-district @endif</label> 
                    <input type="text" required="required" class="form-control">
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Kelurahan @elseif(Config::get('app.locale') == 'cn') 城市村 @else Urban Village @endif</label> 
                    <input type="text" class="form-control">
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Kode Pos @elseif(Config::get('app.locale') == 'cn') 邮政编码 @else Postal Code @endif</label> 
                    <input type="text" minlength="2" maxlength="6" class="form-control">
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Desa @elseif(Config::get('app.locale') == 'cn') 村 @else Village @endif</label> 
                    <input type="text" class="form-control">
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Alamat Lengkap @elseif(Config::get('app.locale') == 'cn') 完整地址 @else Full address @endif <span style="color: red;">*</span></label> 
                    <textarea aria-required="true" class="form-control"></textarea>
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Waktu Perubahan Pertama : @elseif(Config::get('app.locale') == 'cn') 首次更改时间： @else Time of First Change: @endif </label>
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Waktu Perubahan terakhir :  @elseif(Config::get('app.locale') == 'cn') 最后修改时间： @else Time of Last Amendment: @endif</label>
                </div> 
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-info pd-x-20">@if(Config::get('app.locale') == 'id') Simpan @elseif(Config::get('app.locale') == 'cn') 救 @else Save @endif</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
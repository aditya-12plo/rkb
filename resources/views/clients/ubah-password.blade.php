<style>

</style>
@extends('layouts.client')

@section('content-client')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft" style="text-align:center; font-size:3em; ">@if(Config::get('app.locale') == 'id') Perubahan Password @elseif(Config::get('app.locale') == 'cn') 密码变更 @else Change Password @endif</h3>
            </div>
        </div>
    </div>
    <form method="POST"><div class="col-md-12 padding-0">
        <div class="panel form-element-padding">
            <div class="panel-body" style="padding-bottom: 30px;">
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Password <span style="color: red;">*</span> @elseif(Config::get('app.locale') == 'cn') 密码<span style="color: red;">*</span> @else Password <span style="color: red;">*</span>@endif</label> 
                    <select required="required" aria-required="true" class="form-control" name="negara"></select>
                </div> 
                <div class="form-group col-lg-12">
                    <label for="input1">@if(Config::get('app.locale') == 'id') Password Konfirmasi <span style="color: red;">*</span> @elseif(Config::get('app.locale') == 'cn') 确认密码 <span style="color: red;">*</span>@else Password Confirmation <span style="color: red;">*</span>@endif</label> 
                    <input type="text" required="required" aria-required="true" class="form-control" name="provinsi">
                </div> 
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-info pd-x-20">@if(Config::get('app.locale') == 'id') Simpan @elseif(Config::get('app.locale') == 'cn') 救 @else Save @endif</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
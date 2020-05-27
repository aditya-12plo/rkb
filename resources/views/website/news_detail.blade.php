@extends('layouts.website')
@section('content-website')

<div class="feed-content blog-single" style="padding-top:70px !important;">
            <div class="container content-single-art">
                <div class="row">


                <div class="col-md-8 box-blog-single">
                    <div class="box-article">
                    <img src="/public/news/{{$news->seo_img}}" style="width: 600px;height:250px;" alt="{{$news->title_id}}" />
                            <?php echo $news->content_id;?>
                    </div>
                </div>


                <div class="col-md-4 box-right-blog">
                        <div class="right-column">
                            <div class="component-1">
                                <div class="title-right-component">
                                    <h3>@if(Config::get('app.locale') == 'id') Butuh Bantuan ? @elseif(Config::get('app.locale') == 'cn') 需要帮忙 ？ @else Need Help ? @endif</h3>
                                </div>
                                <div class="body-right-component">
                                <p>@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话 @else Phone @endif :  +6222 2058 5060</p>
                                <p>@if(Config::get('app.locale') == 'cn') 传真: +62 222 0582 219 @else Fax : +62 222 0582 219 @endif</p>
                                <p>@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif : INFO@RAJAWALIKAPITAL.CO.ID</p>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

</div>

@endsection
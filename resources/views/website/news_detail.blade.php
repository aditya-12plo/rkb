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
                                    <h3>Butuh Bantuan ?</h3>
                                </div>
                                <div class="body-right-component">
                                <p>Telepon : +62 222 0585 060</p>
                                <p>Fax : +62 222 0582 219</p>
                                <p>Email : INFO@RAJAWALIKAPITAL.CO.ID</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

</div>

@endsection
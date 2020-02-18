@extends('layouts.website')
@section('content-website')

<div class="feed-content blog" style="padding-top:70px !important;">
            <div class="container">
                <div class="row">


                <div class="col-md-8 box-body-blog">
                @foreach($news as $b)
                    <div class="box-comment box-blog">
                        <div class="gdlr-core-zoom-on-hover">
                            <img src="/public/news/{{$b->seo_img}}" style="width: 600px;height:250px;" alt="{{$b->title_id}}" />
                        </div>
                            <h3>{{$b->title_id}}</h3>
                            <p>
                                {{$b->description_id}}
                            </p>
                            <a href="/berita-pasar/{{$b->slug_id}}" class="btn btn-more">Lanjut baca</a>
                    </div>
                @endforeach
										<div class="col-md-12">
											{{$news->render()}}
                                            </div>
                                            <br><br>
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
@extends("home.layout")
@section("container")
    <div class="col-md-9 technology-left">
        <div class="blog">

            <h2 class="w3">{{$field->name}}</h2>
            <div class="blog-grids1">
                @foreach($field->topic as $item)
                    <div class="col-md-6 blog-grid">
                        <div class="blog-grid-left1">
                            <a href="{{route("home.blog.topic",["url_field" => $field->url,"topic" => $item->url])}}"><img src="{{asset('storage/'.$item->avatar)}}" alt=" " class="img-responsive"></a>
                        </div>
                        <div class="blog-grid-right1">
                            <a href="{{route("home.blog.topic",["url_field" => $field->url,"topic" => $item->url])}}">{{$item->title}}</a>
                            <h4>{{date("d-m-Y", strtotime($item->created_at))}}</h4> Người đăng: <span style="color: #ff3180">{{$item->user->name}}</span>
                            <p>{{$item->summary}}</p>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="more m1">
                            <a class="btn effect6" style="background-color: #ff6761;color: #0a0a0a;font-size: 13px;font-weight: bold" href="{{route("home.blog.topic",["url_field" => $field->url,"topic" => $item->url])}}">Đọc Thêm</a>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>

            <nav class="paging">
                <ul class="pagination pagination-lg">
                    <li><a href="#" aria-label="Previous"><span aria-hidden="true"><<</span></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true">>></span></a></li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- technology-right -->
    <div class="col-md-3 technology-right">


        <div class="blo-top1">

            <div class="tech-btm">
                <div class="search-1">
                    <form action="#" method="post">
                        <input type="search" name="Search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                        <input type="submit" value=" ">
                    </form>
                </div>
                <h4>Popular Posts </h4>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="{{asset("images/t2.jpg")}}" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="{{asset("images/m2.jpg")}}" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="{{asset("images/f2.jpg")}}" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="{{asset("images/t3.jpg")}}" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="{{asset("images/m3.jpg")}}" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="insta">
                    <h4>Instagram</h4>
                    <ul>

                        <li><a href="singlepage.html"><img src="{{asset("images/t1.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/m1.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/f1.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/m2.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/f2.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/t2.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/f3.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/t3.jpg")}}" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="{{asset("images/m3.jpg")}}" class="img-responsive" alt=""></a></li>
                    </ul>
                </div>

                <p>Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur, at pro</p>
                <div class="twt">

                    <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-hashtag-button twitter-hashtag-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.b7de008f493a5185d8df1aedd62d77c6.en.html#button_hashtag=TwitterStories&amp;dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=https%3A%2F%2Fp.w3layouts.com%2Fdemos%2Fduplex%2Fweb%2F&amp;size=l&amp;time=1467721486626&amp;type=hashtag" style="position: static; visibility: visible; width: 166px; height: 28px;" data-hashtag="TwitterStories"></iframe>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>
            </div>



        </div>


    </div>
    <div class="clearfix"></div>
@endsection
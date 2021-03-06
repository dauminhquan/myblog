@extends("home.layout")
@section("container")
    <div class="col-md-9 technology-left">
        <div class="agileinfo topic-title">

            <h2 class="w3">{{$topic->title}}</h2>
            <div class="single">
                <img src="{{asset('storage/'.$topic->url)}}" class="img-responsive" alt="">
                <div class="b-bottom">
                    {!! $topic->content !!}
                </div>
            </div>


            <div class="response">
                <h4>Nhận xét</h4>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img src="images/sin1.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>Jun 21, 2016</li>
                            <li><a href="#">Reply</a></li>
                        </ul>
                        <div class="media response-info">
                            <div class="media-left response-text-left">
                                <a href="#">
                                    <img src="images/sin2.jpg" class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="media-body response-text-right">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <ul>
                                    <li>July 17, 2016</li>
                                    <li><a href="#">Reply</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img src="images/sin1.jpg" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>Jul 22, 2016</li>
                            <li><a href="#">Reply</a></li>
                        </ul>
                        <div class="media response-info">
                            <div class="media-left response-text-left">
                                <a href="#">
                                    <img src="images/sin2.jpg" class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="media-body response-text-right">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <ul>
                                    <li>Aug 01, 2016</li>
                                    <li><a href="#">Reply</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="coment-form">
                <h4>Leave your comment</h4>
                <form action="#" method="post">
                    <input type="text" value="Name " name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                    <input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="text" value="Website" name="websie" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
                    <textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
                    <input type="submit" value="Submit Comment">
                </form>
            </div>
            <div class="clearfix"></div>
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
                        <a href="singlepage.html"><img src="images/t2.jpg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="images/m2.jpg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="images/f2.jpg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="images/t3.jpg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="blog-grids">
                    <div class="blog-grid-left">
                        <a href="singlepage.html"><img src="images/m3.jpg" class="img-responsive" alt=""></a>
                    </div>
                    <div class="blog-grid-right">

                        <h5><a href="singlepage.html">Pellentesque dui Maecenas male</a> </h5>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="insta">
                    <h4>Instagram</h4>
                    <ul>

                        <li><a href="singlepage.html"><img src="images/t1.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/m1.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/f1.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/m2.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/f2.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/t2.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/f3.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/t3.jpg" class="img-responsive" alt=""></a></li>
                        <li><a href="singlepage.html"><img src="images/m3.jpg" class="img-responsive" alt=""></a></li>
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
    <!-- technology-right -->
@endsection
@section("css")
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
    @endsection
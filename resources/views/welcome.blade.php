
@extends('layouts.header')
@section('content')
<div class="content-block">
    <!-- Our Services -->
    <div class="section-area content-inner service-info-bx">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-bx">
                        <div class="action-box">
                            <img src="{{asset('assets/images/our-services/pic1.jpg')}}" alt="">
                        </div>
                        <div class="info-bx text-center">
                            <div class="feature-box-sm radius bg-white">
                                <i class="fa fa-bank text-primary"></i>
                            </div>
                            <h4><a href="#">Best Industry Leaders</a></h4>
                            <a href="#" class="btn radius-xl">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="service-bx">
                        <div class="action-box">
                            <img src="{{asset('assets/images/our-services/pic2.jpg')}}" alt="">
                        </div>
                        <div class="info-bx text-center">
                            <div class="feature-box-sm radius bg-white">
                                <i class="fa fa-book text-primary"></i>
                            </div>
                            <h4><a href="#">Learn Courses Online</a></h4>
                            <a href="#" class="btn radius-xl">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="service-bx m-b0">
                        <div class="action-box">
                            <img src="{{asset('assets/images/our-services/pic3.jpg')}}" alt="">
                        </div>
                        <div class="info-bx text-center">
                            <div class="feature-box-sm radius bg-white">
                                <i class="fa fa-file-text-o text-primary"></i>
                            </div>
                            <h4><a href="#">Book Library & Store</a></h4>
                            <a href="#" class="btn radius-xl">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services END -->

    <!-- Popular Courses -->
    <div class="section-area section-sp2 popular-courses-bx">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    <h2 class="title-head">Popular <span>Courses</span></h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                </div>
            </div>
            <div class="row">
                <div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                    <div class="item">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/courses/pic1.jpg')}}" alt="">
                                <a href="#" class="btn">Read More</a>
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="#">Introduction EduChamp – LMS plugin</a></h5>
                                <span>Programming</span>
                            </div>
                            <div class="cours-more-info">
                                <div class="review">
                                    <span>3 Review</span>
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del>$190</del>
                                    <h5>$120</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/courses/pic2.jpg')}}" alt="">
                                <a href="#" class="btn">Read More</a>
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="#">Introduction Engineering – LMS plugin</a></h5>
                                <span>Programming</span>
                            </div>
                            <div class="cours-more-info">
                                <div class="review">
                                    <span>3 Review</span>
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del>$190</del>
                                    <h5>$120</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/courses/pic3.jpg')}}" alt="">
                                <a href="#" class="btn">Read More</a>
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="#">Introduction Engineering – LMS plugin</a></h5>
                                <span>Programming</span>
                            </div>
                            <div class="cours-more-info">
                                <div class="review">
                                    <span>3 Review</span>
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del>$190</del>
                                    <h5>$120</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="cours-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/courses/pic4.jpg')}}" alt="">
                                <a href="#" class="btn">Read More</a>
                            </div>
                            <div class="info-bx text-center">
                                <h5><a href="#">Introduction Engineering – LMS plugin</a></h5>
                                <span>Programming</span>
                            </div>
                            <div class="cours-more-info">
                                <div class="review">
                                    <span>3 Review</span>
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del>$190</del>
                                    <h5>$120</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Courses END -->

    <!-- Form -->
    <div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url({{asset('assets/images/background/bg1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-white">
                    <h2>Online Courses To Learn</h2>
                    <h5>Own Your Feature Learning New Skills Online</h5>
                    <form class="cours-search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="What do you want to learn today?	">
                            <div class="input-group-append">
                                <button class="btn" type="submit">Search</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mw800 m-auto">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="cours-search-bx m-b30">
                            <div class="icon-box">
                                <h3><i class="ti-user"></i><span class="counter">5</span>M</h3>
                            </div>
                            <span class="cours-search-text">Over 5 million student</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="cours-search-bx m-b30">
                            <div class="icon-box">
                                <h3><i class="ti-book"></i><span class="counter">30</span>K</h3>
                            </div>
                            <span class="cours-search-text">30,000 Courses.</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="cours-search-bx m-b30">
                            <div class="icon-box">
                                <h3><i class="ti-layout-list-post"></i><span class="counter">20</span>K</h3>
                            </div>
                            <span class="cours-search-text">Learn Anythink Online.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form END -->
    <div class="section-area section-sp2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center heading-bx">
                    <h2 class="title-head m-b0">Upcoming <span>Events</span></h2>
                    <p class="m-b0">Upcoming Education Events To Feed Brain. </p>
                </div>
            </div>
            <div class="row">
                <div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
                    <div class="item">
                        <div class="event-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/event/pic4.jpg')}}" alt="">
                            </div>
                            <div class="info-bx d-flex">
                                <div>
                                    <div class="event-time">
                                        <div class="event-date">29</div>
                                        <div class="event-month">October</div>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="event-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/event/pic3.jpg')}}" alt="">
                            </div>
                            <div class="info-bx d-flex">
                                <div>
                                    <div class="event-time">
                                        <div class="event-date">29</div>
                                        <div class="event-month">October</div>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="event-bx">
                            <div class="action-box">
                                <img src="{{asset('assets/images/event/pic2.jpg')}}" alt="">
                            </div>
                            <div class="info-bx d-flex">
                                <div>
                                    <div class="event-time">
                                        <div class="event-date">29</div>
                                        <div class="event-month">October</div>
                                    </div>
                                </div>
                                <div class="event-info">
                                    <h4 class="event-title"><a href="#">Education Autumn Tour 2019</a></h4>
                                    <ul class="media-post">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> 7:00am 8:00am</a></li>
                                        <li><a href="#"><i class="fa fa-map-marker"></i> Berlin, Germany</a></li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn">View All Event</a>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="section-area section-sp2 bg-fix ovbl-dark" style="background-image:url({{asset('assets/images/background/bg1.jpg')}};">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-white heading-bx left">
                    <h2 class="title-head text-uppercase">what people <span>say</span></h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                </div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                <div class="item">
                    <div class="testimonial-bx">
                        <div class="testimonial-thumb">
                            <img src="{{asset('assets/images/testimonials/pic1.jpg')}}" alt="">
                        </div>
                        <div class="testimonial-info">
                            <h5 class="name">Peter Packer</h5>
                            <p>-Art Director</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimonial-bx">
                        <div class="testimonial-thumb">
                            <img src="{{asset('assets/images/testimonials/pic2.jpg')}}" alt="">
                        </div>
                        <div class="testimonial-info">
                            <h5 class="name">Peter Packer</h5>
                            <p>-Art Director</p>
                        </div>
                        <div class="testimonial-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials END -->

    <!-- Recent News -->
    <div class="section-area section-sp2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx left">
                    <h2 class="title-head">Recent <span>News</span></h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                </div>
            </div>
            <div class="recent-news-carousel owl-carousel owl-btn-1 col-12 p-lr0">
                <div class="item">
                    <div class="recent-news">
                        <div class="action-box">
                            <img src="{{asset('assets/images/blog/latest-blog/pic1.jpg')}}" alt="">
                        </div>
                        <div class="info-bx">
                            <ul class="media-post">
                                <li><a href="#"><i class="fa fa-calendar"></i>Jan 02 2019</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>By William</a></li>
                            </ul>
                            <h5 class="post-title"><a href="blog-details.html">This Story Behind Education Will Haunt You Forever.</a></h5>
                            <p>Knowing that, you’ve optimised your pages countless amount of times, written tons.</p>
                            <div class="post-extra">
                                <a href="#" class="btn-link">READ MORE</a>
                                <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>20 Comment</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="recent-news">
                        <div class="action-box">
                            <img src="{{asset('assets/images/blog/latest-blog/pic2.jpg')}}" alt="">
                        </div>
                        <div class="info-bx">
                            <ul class="media-post">
                                <li><a href="#"><i class="fa fa-calendar"></i>Feb 05 2019</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>By John</a></li>
                            </ul>
                            <h5 class="post-title"><a href="blog-details.html">What Will Education Be Like In The Next 50 Years?</a></h5>
                            <p>As desperate as you are right now, you have done everything you can on your.</p>
                            <div class="post-extra">
                                <a href="#" class="btn-link">READ MORE</a>
                                <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>14 Comment</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="recent-news">
                        <div class="action-box">
                            <img src="{{asset('assets/images/blog/latest-blog/pic3.jpg')}}" alt="">
                        </div>
                        <div class="info-bx">
                            <ul class="media-post">
                                <li><a href="#"><i class="fa fa-calendar"></i>April 14 2019</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>By George</a></li>
                            </ul>
                            <h5 class="post-title"><a href="blog-details.html">Master The Skills Of Education And Be.</a></h5>
                            <p>You will see in the guide all my years of valuable experience together with.</p>
                            <div class="post-extra">
                                <a href="#" class="btn-link">READ MORE</a>
                                <a href="#" class="comments-bx"><i class="fa fa-comments-o"></i>23 Comment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent News End -->

</div>
@endsection
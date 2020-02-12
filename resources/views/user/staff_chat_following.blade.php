@extends('user.header')
@section('content')





<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Staff</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Staff</li>
        </ul>
    </div>	
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Staff Users</h4>  
                    <div id="app">
                        @include('layouts.flash-message')
                    </div>
                </div>
                <div class="widget-inner">
                    <?php foreach ($users_staff as $user): ?>
                        <div class="card-courses-list bookmarks-bx">
                            <div class="card-courses-media">
                                <img src="{{asset('assets/images/courses/pic6.jpg')}}" alt=""/>
                            </div>
                            <div class="card-courses-full-dec">
                                <div class="card-courses-title">
                                    <h4 class="m-b5"><?= $user->firstname . ' ' . $user->lastname ?></h4>
                                </div>
                                <div class="card-courses-list-bx">
                                    <ul class="card-courses-view">
                                        <li class="card-courses-categories">
                                            <h5>Categories</h5>
                                            <h4><?= $user->branch->branch ?></h4>
                                        </li>
                                        <li class="card-courses-review">
                                            <h5>3 Review</h5>
                                            <ul class="cours-star">
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li class="active"><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </li>
                                        <li class="card-courses-price">

                                            <h5 class="text-primary m-b0"><?= $user->academicrang ?></h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row card-courses-dec">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et. Sea ut nullam aperiam, mei cu tollit salutatus delicatissimi. </p>	
                                    </div>
                                    <div class="col-md-12">
                                        <span class="new-users-btn">
                                            <a href="#" class="btn button-sm outline">View profile</a>
                                        </span>
                                        <?php if (auth()->user()->isFollowing($user->id)): ?>
                                            <span style="float:right;">
                                                <form class="new-users-btn" action="<?= route('users.unfollow', $user->id) ?>" method="POST">
                                                    <?= csrf_field() ?>
                                                    <?= method_field('DELETE') ?>
                                                    <button type="submit" class="btn button-sm outline "><i class="fa fa-btn fa-user"></i> UnFollow</button>
                                                </form>

                                            </span>
                                        <?php else: ?>
                                            <span style="float:right;">
                                                <form  class="new-users-btn" action="<?= route('users.follow', $user->id) ?>" method="POST">
                                                    <?= csrf_field() ?>
                                                    <button type="submit" class="btn button-sm outline"><i class="fa fa-btn fa-user"></i> Follow</button>
                                                </form>
                                            </span>
                                        <?php endif; ?>
                                        <span class="new-users-btn">
                                            <a href="#" class="btn button-sm outline">Message</a>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Your Profile Views Chart END-->
    </div>
</div>


<!-- contact area END -->
@endsection

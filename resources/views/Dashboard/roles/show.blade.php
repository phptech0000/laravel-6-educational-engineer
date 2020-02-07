@extends('Dashboard.main.header')
@section('content')
  
        <div class="container-fluid">
            <div class="db-breadcrumb">
                <h4 class="breadcrumb-title">Roles</h4>
                <ul class="db-breadcrumb-list">
                    <li><a href="#"><i class="fa fa-home"></i>Role</a></li>
                    <li>{{$role->name}} Role </li>
                </ul>
            </div>	
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4> {{$role->name}}  Role</h4>
                    </div>

                    <div class="col-12">
                        <h4>{{$role->name}} Permissions </h4>
                    </div>

                    <div class="feature-filters clearfix center m-b40">
                        <div class="grid-container">
                            <?php if (!empty($role_has_permissions)): ?>
                                <?php foreach ($role_has_permissions as $permission): ?>
                                    <div class="grid-item">
                                        <ul class="filter" data-toggle="buttons"  >
                                            <li data-filter="happening" class="btn" >
                                                <a class="" href="">
                                                    <?= $permission->name ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12  text-left">
                        <div class=" form-group col-12">

                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
            <!-- Your Profile Views Chart END-->
@endsection
    
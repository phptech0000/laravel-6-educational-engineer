@extends('Dashboard.main.header')
@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Users</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Role Mangment</a></li>
            <li>Edit Role</li>
        </ul>
    </div>	
    <div class="col-lg-12 m-b30">
        <div class="widget-box">
            <div class="wc-title">
                <h4>Roles Edit</h4>
            </div>


            <div class="widget-inner">
                <form method="POST" action="{{route('roles.update', $role->id)}}">
                    @csrf
                    @method('PATCH')        

                    <div class="col-12">
                        <div class="ml-auto">
                            <h4> Role Name</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input class="form-control" type="text"  value="{{$role->name}}" name="role_name"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="ml-auto">
                            <h4> Permissions</h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <input class="form-control" type="text"  value="{{$role->name}}" name="role_name"/>
                        </div>
                    </div>
                    <div class="feature-filters clearfix center m-b40">
                        <div class="grid-container">
                            <?php foreach ($permissions as $permission): ?>
                                <div class="grid-item">
                                    <ul class="filter" data-toggle="buttons" >

                                        <li data-filter="happening" class="btn ">
                                            <a href="">
                                                <input type="checkbox" name="permission[]"  value ="{{$permission->id}}" class="badgebox" <?php if (in_array($permission->id, $roles_has_permissions)): ?>checked <?php endif; ?> >
                                                <span class="badge">&check;</span>
                                                <?= $permission->name ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12  text-right">
                        <div class=" form-group col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection       

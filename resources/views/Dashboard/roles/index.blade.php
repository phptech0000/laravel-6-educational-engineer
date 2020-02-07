@extends('Dashboard.main.header')
@section('content')

<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Roles</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Roles Mangment</a></li>
            <li>Roles</li>
        </ul>
    </div>	
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Roles</h4>
                </div>

                <div class="container-fluid">

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        <?php foreach ($roles as $role): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $role->name ?></td>
                                <td>

                                    <a class="btn btn-info" href="{{route('roles.show' , $role->id)}}">Show</a>
                                    @can('role-edit')
                                    <a class="btn btn-primary" href="{{route('roles.edit' , $role->id)}}">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                    <form method="POST" action="{{route('roles.destroy' , $role->id)}}" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12  text-left">
                    <div class=" form-group col-12">
                        @can('role-create')
                        <a class="btn btn-success" href="{{route('roles.create')}}"> Create New Role</a>
                        @endcan
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

                    </div>
                </div>
            </div>
        </div>









        <?php $roles->render(); ?>



    </div>
</div>
<!-- Your Profile Views Chart END-->
</div>
</div>
@endsection
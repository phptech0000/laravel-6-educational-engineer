
@extends('Dashboard.main.header')
@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Users</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Users</li>
        </ul>
    </div>	
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="wc-title">
                    <h4>Users</h4>
                </div>

                <div class="pull-left">
                    <a class="btn btn-success" href=""> Create New User</a>
                </div>
            </div>
        </div>




        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th width="280px">Action</th>
            </tr>
            <?php foreach ($data as $user): ?>
                <tr> 
                    <td><?= ++$i ?></td>
                    <td><?= $user->firstname . ' ' . $user->lastname ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <?php if (!empty($user->getRoleNames())): ?> 
                            <?php foreach ($user->getRoleNames() as $value): ?>
                                <label class="badge badge-success"><?= $value ?></label>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </td>
                    <td>
                        <a class="btn btn-info" href="">Show</a>
                        <a class="btn btn-primary" href="">Edit</a>
                        <form method="DELETE" action="" style="display: inline">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
@endsection



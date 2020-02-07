@extends('Dashboard.main.header')
@section('content')
            <div class="container-fluid">
                <div class="db-breadcrumb">
                    <h4 class="breadcrumb-title">Add Department</h4>
                    <ul class="db-breadcrumb-list">
                        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                        <li>Add Department</li>
                    </ul>
                </div>	
                <div class="row">
                    <!-- Your Profile Views Chart -->
                    <div class="col-lg-12 m-b30">
                        <div class="widget-box">
                            <div class="wc-title">
                                <h4>Add Department</h4>
                            </div>
                            <div class="widget-inner">
                                <form class="edit-profile m-b30"  action="{{route('store_deps')}}" method="POST" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="ml-auto">
                                                <h3>1. Basic info</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="col-form-label">Department Name</label>
                                            <div>
                                                <input class="form-control"  name="name" required=""  type="text" value="">
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="col-form-label">Year Founded</label>
                                            <div>
                                                <input class="form-control" type="text"  required="" name="year_found" value="">
                                            </div>
                                        </div>

                                        <div class="seperator"></div>

                                        <div class="col-12 m-t20">
                                            <div class="ml-auto m-b5">
                                                <h3>2. Description</h3>
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="col-form-label">Department Description</label>
                                            <div>
                                                <textarea name="descirptions" required="" class="form-control"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 m-t20">
                                            <div class="ml-auto">
                                                <h3 class="m-form__section">3. Add Branch</h3>
                                            </div>
                                        </div>
                                        <div class=" form-group col-12">
                                            <table id="item-add" style="width:100%;">
                                                <tr class="list-item">
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="col-form-label">Branch  Name</label>
                                                                <div>
                                                                    <input class="form-control" required="" name="branchs[]" type="text" value="" multiple="">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="col-form-label">Close</label>
                                                                <div class="form-group">
                                                                    <a class="delete" href="#"><i class="fa fa-close"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group col-12 ">
                                            <button type="button" class="btn-secondry add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>Add Item</button>
                                            <button type="submit" class="btn">Save changes</button>
                                        </div>


                                        <!--Main container start -->
                                        <div class="form-group mail-list-container">
                                            <div class=" col-12">
                                                <input type="file" accept="image/*,video/*" name="media[]" multiple>
                                            </div>
                                            <div class="seperator"> </div>
                                       
                                    </div>
                  
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Your Profile Views Chart END-->
            </div>
        </div>
@endsection 


    


@extends('admin.layout.index')
@section('content')
 <div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Contact <small>List Contact</small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List <small>Contact</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                        </p>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <!-- In thong bao -->
                        @if(session('notify'))
                            <div class="alert alert-success">
                                {{session('notify')}}
                            </div>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Contact ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Created_at</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contact as $ct)
                                <tr>
                                    <td>{{$ct->id}}</td>
                                    <td>{{$ct->name}}</td>
                                    <td>{{$ct->email}}</td>
                                    <td>{!!$ct->content!!}</td>
                                    <td>{{$ct->created_at}}</td>
                                    <td>
                                        <a href="admin/contact/edit/{{$ct->id}}" style="padding: 5px; background: #11aac4; font-weight: bold; color: white;text-decoration: none;"><span class="fa fa-pencil-square"></span> Edit</a>
                                        <a href="admin/contact/delete/{{$ct->id}}" style="padding: 5px; background: #e81f3f; font-weight: bold; color: white;text-decoration: none;"><span class="fa fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layouts.master')

@section('contents')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bordered Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Joining Date</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                    @foreach($data['users'] as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td><img src="{{$user->image}}" alt="{{$user->name}}" style="width:50px;" class="img-responsive img-thumbnail" /></td>
                      <td valign="middle"><a href="{{url('profile/'.$user->id)}}" target="_blank">{{$user->name}}</a></td>
                      <td>{{$user->email}}</td>
                      <td>{{ucfirst($user->role)}}</td>
                      <td>{{date('M d, Y', strtotime($user->created_at))}}</td>


                      <td>
                          <a href="{{url('admin/users/edit/'.$user->id)}}" class="btn btn-info btn-xs">Edit</a>
                          <a href="{{url('admin/users/block/'.$user->id)}}" class="btn btn-danger btn-xs del">Block</a>
                          <div class="btn-group">
                              <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Change Role <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="{{url('admin/users/role/'.$user->id.'/user')}}">User</a></li>
                                <li><a href="{{url('admin/users/role/'.$user->id.'/author')}}">Author</a></li>
                                <li><a href="{{url('admin/users/role/'.$user->id.'/admin')}}">Admin</a></li>

                              </ul>
                            </div>


                      </td>
                    </tr>
                      @endforeach

                  </tbody></table>
                </div><!-- /.box-body -->

                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                      @if($data['users']->previousPageUrl())

                        <li><a class="next page-numbers" href="{{$data['users']->previousPageUrl()}}"><< Previous</a></li>

                      @endif

                      @if($data['users']->hasMorePages())

                        <li><a class="next page-numbers" href="{{$data['users']->nextPageUrl()}}">Next >></a></li>

                      @endif
                  </ul>
                </div>

              </div>
        </div>
    </div>

@endsection

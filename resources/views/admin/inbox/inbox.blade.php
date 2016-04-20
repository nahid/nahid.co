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
                      <th>Send At</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                    @foreach($data['inboxes'] as $inbox)
                    <tr>
                      <td>{{$inbox->id}}</td>
                      <td><img src="{{$inbox->image}}" alt="{{$inbox->name}}" style="width:50px;" class="img-responsive img-thumbnail" /></td>
                      <td valign="middle"><a href="{{url('admin/inbox/read/'.$inbox->id)}}" >{{$inbox->name}}</a></td>
                      <td>{{$inbox->email}}</td>
                      <td>{{date('M d, Y', strtotime($inbox->created_at))}}</td>


                      <td>
                          <a href="{{url('admin/users/edit/'.$inbox->id)}}" class="btn btn-info btn-xs">Reply</a>



                      </td>
                    </tr>
                      @endforeach

                  </tbody></table>
                </div><!-- /.box-body -->


              </div>
        </div>
    </div>

@endsection

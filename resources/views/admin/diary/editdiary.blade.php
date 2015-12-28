@extends('admin.layouts.master')

@section('contents')
@if(count($errors)>0)
<div class="alert alert-danger">
  @foreach($errors->all() as $err)
    <li>{{$err}}</li>
  @endforeach
</div>
@endif
@if(session('msg')=='ok')
<div class="alert alert-success">
  Successfully Saved Diary
</div>
@endif
<form action="" method="post" enctype="multipart/form-data">
    <input name="title" type="text" value="{{$data['diary']->title}}" placeholder="Write diary title" class="form-control" style="height:40px;"  /><br/>
		<label for="">Select Category</label><br/>
		<select class="form-control" name="category"  style="height:40px; margin-bottom:5px;">
			@foreach($data['category'] as $cat)
				<option @if($data['diary']->category_id==$cat->id) {{"selected"}} @endif value="{{$cat->id}}">{{$cat->category_name}}</option>
			@endforeach
		</select><br/>
    <textarea id="textarea" name="content" data-height="600" rows="10" data-iconlibrary="fa">{{$data['diary']->note}}</textarea>
		<br/>
		<label for="">Add Featured Photo</label>
		<input type="file" name="featured_image" class="form-control" value="" style="border:none; box-shadow:none; height:100%;">
        <input type="text" name="tags" class="tags" value="" />
        <!-- <input type="text" name="tags" class="tags" /> -->
        <div class="accordion ">
           <div class="accordion-group">


           </div>
         </div>
    <label class="checkbox">
      <input name="publish" value="1" @if($data['diary']->status==1) {{"checked"}} @endif type="checkbox"> Publish
    </label>
    <hr/>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <button type="submit" class="btn btn-success btn-lg">Save</button>
  </form>
<script type="text/javascript">
    var TagsData=<?php echo json_encode($data['diary']->tags); ?>;
</script>
@stop

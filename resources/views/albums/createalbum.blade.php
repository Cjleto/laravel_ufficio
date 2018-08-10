@extends('template.layout')
@section('content')
    <h1>NEW ALBUM</h1>

    @include('partials.inputerrors')

    <form action="{{route('album.save')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" required name="name" id="name" value="{{old('name')}}" placeholder="Album Name" >
        </div>
        @include('albums.partial.fileupload')
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" required name="description" id="description" placeholder="Album Description">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
@stop

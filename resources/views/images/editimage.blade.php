@extends('template.layout')
@section('content')
    <h1>EDIT PHOTO</h1>

    <form action="{{route('photos.update', $photo->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$photo->name}}"  placeholder="Img Name" >
        </div>
        <input type="hidden" name="album_id" value="{{$photo->album_id}}" >
        @include('images.partial.fileupload')
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Img Description">{{$photo->description}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
@stop

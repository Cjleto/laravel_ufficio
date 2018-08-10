<div class="form-group">
    <label for="">Album Thumb</label>
    <input type="file" class="form-control" name="album_thumb" id="album_thumb" >
</div>

@if($album->album_thumb)
    <div class="form-group">
        <img src="{{asset($album->path)}}" title="{{$album->album_name}}" width="300">
    </div>
@endif
@extends('template.layout')
@section('content')
<table class="table">
    <tr>
        <th>ID</th>
        <th>Data creazione</th>
        <th>Title</th>
        <th>Album</th>
        <th>Thumbnail</th>
        <th> - </th>
    </tr>
    @forelse($images as $image)
        <tr>
            <td>{{$image->id}}</td>
            <td>{{$image->created_at}}</td>
            <td>{{$image->name}}</td>
            <td>{{$album->album_name}}</td>
            <td>
                <img src="{{asset($image->img_path)}}" width="150" >
            </td>
            <td>
                <a href="{{route('photos.destroy',$image->id)}}" class="btn btn-danger">DELETE</a>
                <a href="{{route('photos.edit',$image->id)}}" class="btn btn-primary">MODIFY</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">
                Nessuna immagine trovata
            </td>
        </tr>
    @endforelse
</table>
@stop
@section('footer')
    @parent
    <script>
        $('document').ready(function () {

            //$('div.alert').fadeOut(3000);

            $('table').on('click','a.btn-danger',function(ele){
                ele.preventDefault();
                var urlImg = $(this).attr('href');
                var tr = ele.target.parentNode.parentNode;
                //console.log(urlImg);
                $.ajax(
                    urlImg,
                    {
                        method: 'DELETE',
                        data: {
                            '_token': '{{csrf_token()}}'
                        },
                        complete: function (resp) {
                            console.log(resp);
                            if(resp.responseText == 1){
                                tr.parentNode.removeChild(tr);
                            } else {
                                alert('Problema ajax albumsimages.blade');
                            }
                        }
                    }
                ) //fine ajax

            });
        });
    </script>
@endsection
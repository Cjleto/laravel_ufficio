@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-lg-8 push-4">
        <div class="alert alert-danger">
            <h1>Accesso Negato</h1>
            @if($exception->getMessage())
                {{ $exception->getMessage() }}
            @else
                Nessun messaggio da parte dell'amministratore
            @endif
            <br>
            <a href="{{route('albums')}}">Torna alla Home</a>
        </div>
    </div>
</div>
@endsection
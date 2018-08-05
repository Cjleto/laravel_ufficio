<?php

use App\Models\Album;
use App\Models\Photo;
use App\User;

Route::get('/', function(){
    $msg = "<a href='".route('albums')."' >Albums</a>";
    return $msg;
});




Route::group(
    [
        'middleware' => 'auth'
    ]
    ,
    function () {
        Route::get('/', 'AlbumsController@index')
            ->name('albums');

        Route::get('/albums/create', 'AlbumsController@create')
            ->name('album.create');

        Route::get('/albums', 'AlbumsController@index')
            ->name('albums');

        Route::get('/albums/{album}', 'AlbumsController@show')
            ->where('id', '[0-9]+');

        Route::get('/albums/{id}/edit', 'AlbumsController@edit')
            ->where('id', '[0-9]+')
            ->name('album.edit');

        Route::delete('/albums/{album}', 'AlbumsController@delete')
            ->name('album.delete')
            ->where('album', '[0-9]+');

//Route::post('/albums/{id}','AlbumsController@store');
        Route::patch('/albums/{id}', 'AlbumsController@store')->name('album.patch');

        Route::post('/albums', 'AlbumsController@save')->name('album.save');

        Route::get('/albums/{album}/images', 'AlbumsController@getImages')
            ->name('album.getimages')
            ->where('album', '[0-9]+');

        Route::get('photos', function () {
            return Photo::all();
        });

        Route::get('usersnoalbums', function () {
            $usersnoalbum = DB::table('users  as u')
                ->leftJoin('albums as a', 'u.id', 'a.user_id')
                ->select('u.id', 'email', 'name', 'album_name')->
                whereRaw('album_name is null')
                ->get();
            $usersnoalbum = DB::table('users  as u')
                ->select('u.id', 'email', 'name')->
                whereRaw('NOT EXISTS (SELECT user_id from albums where user_id= u.id)')
                ->get();
            return $usersnoalbum;
        });

        Route::resource('photos', 'PhotosController');
        Route::resource('categories', 'AlbumCategoryController');
    }
);

Route::get('sql_test', function(){
    $sql = DB::table('albums')
        ->select('user_id', 'users.name', DB::raw('count(0) as total'))
        ->join('users','users.id','=','albums.user_id')
        ->groupBy('user_id')
        ->get();
    return $sql;
});



//images, dato che ho creato il controller tramite artisan con parametro --resource
//posso dichiararlo senza specificare il metodo. vedi documentazione
//assegna direttamente il nome
//php artisan route:list per verificare



Auth::routes();
Route::redirect('home', '/');


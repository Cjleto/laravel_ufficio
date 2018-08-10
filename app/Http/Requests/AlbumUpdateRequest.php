<?php

namespace App\Http\Requests;

use App\Models\Album;
use Illuminate\Foundation\Http\FormRequest;

class AlbumUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dato che nella rotta ho già una l'id di album, possso richiamarla con $this
        
        $album = Album::find($this->id);
        if(\Gate::denies('manage-album',$album)){
            abort(401, 'Tu Non Poi modificare gli album');
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required'
            //'album_thumb' => 'required|image',
            // 'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ' Il nome dell\'album è obbligatorio',
            'name.unique' => 'Il nome esiste già',
            //'album_thumb.image' => 'La miniatura dell\'album deve essere un\'immagine',
            //'album_thumb.required' => ' L\'immagine  dell\'album è obbligatoria',
            'description.required' => ' La descrizione  dell\'album è obbligatoria',
        ];
    }
}

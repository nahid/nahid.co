<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Response;
use Auth;

class DiaryCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check() && (Auth::user()->role=='admin' || Auth::user()->role=='author')){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title'=>['required'],
             'content'=>['required'],
             'category'=>['required'],
             'featured_image'=>['required', 'image']
          ];
    }

    public function forbiddenResponse()
    {
        // Optionally, send a custom response on authorize failure
        // (default is to just redirect to initial page with errors)
        //
        // Can return a response, a view, a redirect, or whatever else
        return redirect('login');
    }
}

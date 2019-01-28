<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SellerReview;

class CreateSellerReviewRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        switch($this->method()){
            case 'POST' :
                $rules['rating'] = 'required';
                // $rules['comment'] = 'required';
                // $rules['img1'] = 'required';
                // $rules['img2'] = 'required';
                return $rules;
                break;
            default :
                break;
        }
        return SellerReview::$rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'hus_father' => 'required|string|max:255',
            'mother' => 'required|string|max:255',
            'email' => 'nullable|email',
            'birthday' => 'required|string|max:255',
            'nid' => 'nullable|numeric|min:17',
            'profession' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'nationality' => 'required|string|max:255',
            'present_address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'mobile' => 'required|string|max:15|min:11',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2800',
            'member_id' => 'required|numeric'
        ];
    }
}

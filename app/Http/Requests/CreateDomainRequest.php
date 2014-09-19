<?php namespace Codeboard\Http\Requests;

use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Foundation\Http\FormRequest;

class CreateDomainRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required|unique:domains'
		];
	}

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param \Illuminate\Contracts\Auth\Authenticator $auth
     * @return bool
     */
	public function authorize(Authenticator $auth)
	{
		return $auth->check();
	}

}

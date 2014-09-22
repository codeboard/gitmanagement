<?php namespace Codeboard\Http\Requests;

use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Foundation\Http\FormRequest;

class AddNewWorkerRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'connection' => 'required',
            'queue' => 'required',
            'maximum_seconds_per_job' => 'required',
            'rest_when_empty' => 'required'
		];
	}

    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Authenticator $auth
     * @return bool
     */
	public function authorize(Authenticator $auth)
	{
		return $auth->check();
	}

}

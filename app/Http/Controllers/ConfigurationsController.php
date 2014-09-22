<?php namespace Codeboard\Http\Controllers;

use Codeboard\Http\Requests\SetConfigurationRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ConfigurationsController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('pages.settings');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param \Codeboard\Http\Requests\SetConfigurationRequest $request
     * @return Response
     */
	public function store(SetConfigurationRequest $request)
	{
        $inputData = $request->all();
        $data = view('configuration.envoy', $inputData)->render();
        File::put(base_path().'/Envoy.blade.php', $data);
        return redirect()->route('settings');
	}

}

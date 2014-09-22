<?php namespace Codeboard\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Routing\Controller;

class PagesController extends Controller {

    /**
     * Default Page
     * @param \Illuminate\Contracts\Auth\Authenticator $auth
     * @return \Illuminate\View\View
     */
    public function defaultPage(Authenticator $auth)
    {
        if($auth->check())
            return $this->redirect();
        return view('pages.default');
    }

    /**
     * Redirect to the Dashboard
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        return redirect()->route('dashboard');
    }

    /**
     * Show Dashboard
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function settings()
    {
        return view('pages.settings');
    }

}

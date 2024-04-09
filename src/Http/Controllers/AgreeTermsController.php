<?php

namespace Masuresh124\AgreeTerms\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Masuresh124\AgreeTerms\Service\AgreeService;

class AgreeTermsController
{

    protected $agreeService;
    public function __construct(AgreeService $agreeService)
    {
        $this->agreeService = $agreeService;

    }
    public function show()
    {
        $formView = config('agree-terms.view');
        return view($formView);
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_agreed' => 'required',
        ]);

        $user = $request->user();
        if (!$user) {
            throw new Exception('Client not found');
        }

        $this->agreeService->agree($user);
        if (session()->has('url.intended')) {
            $url = session('url.intended');
            session()->forget('url.intended');
            return redirect()->to($url);
        }

        return redirect()->to(RouteServiceProvider::HOME);
    }

}

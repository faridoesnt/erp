<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MyAccount\MyAccountService;

class AppController extends Controller
{
    protected $myAccountService;

    public function __construct(MyAccountService $myAccountService)
    {
        $this->myAccountService = $myAccountService;
    }

    public function index()
    {
        return view('pages.app.index');
    }

    public function my_account()
    {
        $account = $this->myAccountService->myAccount();

        return view('pages.app.account', [
            'account' => $account
        ]);
    }
}

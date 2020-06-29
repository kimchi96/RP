<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MyUsersModel;
use App\ClientModel;
use App\CodeModel;
use App\TokenModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use JWTAuth;
use JWTFactory;
use Tymon\JWTAuth\Claims\Issuer;
use Tymon\JWTAuth\Claims\IssuedAt;
use Tymon\JWTAuth\Claims\Expiration;
use Tymon\JWTAuth\Claims\NotBefore;
use Tymon\JWTAuth\Claims\Subject;
use Carbon\Carbon;

class MyController extends Controller
{
    public function getView_RP()
    {    
        return view ('rp');
    }

    public function postView_RP()
    {
        return view ('rp');
    }

    public function getCallBack_RP(Request $request)
    {    
        $code          =   $request->input('code'); 
        $error         =   $request->input('error');
        $state         =   $request->input('state');
        if($error !== null)
        {
            return view('error');  
        }
        return view ('callback');

    }
    public function postCallBack_RP(Request $request)
    {
        $code          =   $request->input('code'); 
        $error         =   $request->input('error');
        $state         =   $request->input('state');
        if($error !== null)
        {
            return redirect()->route('rp'); 
        }
        return redirect()->route('userinfo');
    }

    public function getLogin_RP()
    {    
        return view ('rplogin');
    }

    public function postLogin_RP()
    {
        return view ('rplogin');
    }

    public function getUser_RP()
    {    
        return view ('userinfo');
    }

}
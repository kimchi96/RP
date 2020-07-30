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

    public function getError()
    {
        return view ('error');
    }

    public function getCallBack_RP(Request $request)
    {    
        $code          =   $request->input('code'); 
        $error         =   $request->input('error');
        $state         =   $request->input('state');
        if($error !== null)
        {
            return response()->view('error'); 
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

    public function checkToken(Request $request)
    {
        // get the local secret key
        $key = rtrim(strtr(base64_encode('157073'), '+/', '-_'), '=');

        // split the token
        $token = $request->post();
        $id_token = $token['token'];
        $tokenParts = explode('.', $id_token);

        $header = base64_decode(strtr($tokenParts[0], '-_', '+/'));
        $payload = base64_decode(strtr($tokenParts[1], '-_', '+/'));
        $signatureProvided = $tokenParts[2];
    
        // build a signature based on the header and payload using the secret
        $base64url_Header = rtrim(strtr(base64_encode($header), '+/', '-_'), '='); 
        $base64url_Payload = rtrim(strtr(base64_encode($payload), '+/', '-_'), '=');
        $signature = hash_hmac('sha256', $base64url_Header . "." . $base64url_Payload, $key, true);
        $base64url_Signature = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');
        
        // verify it matches the signature provided in the token
        $signatureValid = ($base64url_Signature === $signatureProvided);

        if ($signatureValid) {
            $name = explode('"',$payload);
            $name_info = $name[9];
        
            return response($name_info,200);
        } else {
            $error = 'Đăng nhập không thành công';
            return response($error,401);
        }
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
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
        Auth::user()->device_token =  $request->token;
        // dd();

        Auth::user()->save();

        return response()->json(['Token successfully stored.']);

        // $user = User::find($request->user_id);
        // $user->device_token = $request->fcm_token;
        // $user->save();

        // if ($user)
        //     return response()->json([
        //         'message' => 'User token updated'
        //     ]);

        // return response()->json([
        //     'message' => 'Error!'
        // ]);
    }

    public function sendNotification(Request $request)
    {
        // $url = 'https://fcm.googleapis.com/fcm/send';

        // $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        // $serverKey = 'AAAAbYL4eig:APA91bG5Bbvv_BcpltuyccyRupQnn5HpKDPir94tnzB5eBwRWoSSlFjPB02oTloIsPI2gpSNAi5LAOInxCqlleZ3e5FVA52Ugn1enVA7Uz2u9tf3hRxnPrN57bprAozcro_7NGmxi-JN'; // ADD SERVER KEY HERE PROVIDED BY FCM

        // $data = [
        //     "registration_ids" => $FcmToken,
        //     "notification" => [
        //         "title" => $request->title,
        //         "body" => $request->body,
        //     ]
        // ];
        // $encodedData = json_encode($data);

        // $headers = [
        //     'Authorization:key=' . $serverKey,
        //     'Content-Type: application/json',
        // ];

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // // Disabling SSL Certificate support temporarly
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // // Execute post
        // $result = curl_exec($ch);
        // if ($result === FALSE) {
        //     die('Curl failed: ' . curl_error($ch));
        // }
        // // Close connection
        // curl_close($ch);
        // // FCM response
        // // dd($result);
        // return redirect()->back();


        $user = User::find($request->id);
        // dd($user);
        $serverKey = 'AAAAbYL4eig:APA91bG5Bbvv_BcpltuyccyRupQnn5HpKDPir94tnzB5eBwRWoSSlFjPB02oTloIsPI2gpSNAi5LAOInxCqlleZ3e5FVA52Ugn1enVA7Uz2u9tf3hRxnPrN57bprAozcro_7NGmxi-JN';
        $data = [
            "to" => $user->device_token,
            "notification" =>
            [
                "title" => auth()->guard()->user()->name,
                "body" => $user->name . " je napravio porudzbinu",
                "icon" => url('/logo.png')
            ],
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $serverKey,
            'Content-Type: application/json',
        ];
        // $headers = [
        //     'Authorization:key=' . $serverKey,
        //     'Content-Type: application/json',
        // ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        curl_exec($ch);

        return redirect()->back();
    }
}

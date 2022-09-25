<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
use App\Models\UserInfo;


class HomeController extends Controller
{
    //
    public function biodata(Request $request)
    {
        // dd($request);
        $userInfoObj = new UserInfo();

        $getIp = UserSystemInfoHelper::get_ip();
        $getBrowser = UserSystemInfoHelper::get_browsers();
        $getDevice = UserSystemInfoHelper::get_device();
        $getOS = UserSystemInfoHelper::get_os();
        $userName = get_current_user();

        $userInfoObj->ip = $getIp;
        $userInfoObj->device_name = $getDevice;
        $userInfoObj->browser_name = $getBrowser;
        $userInfoObj->user_name = $userName;
        $userInfoObj->os = $getOS;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $jsonResult = curl_exec($ch);
        $result = json_decode($jsonResult);

        if ($result->status == 'success') {
            $userInfoObj->country = $result->country;
            $userInfoObj->state = $result->regionName;
            $userInfoObj->city = $result->city;
            $userInfoObj->zip = $result->zip;
            if (isset($request->lat) && isset($result->lon)) {
                $userInfoObj->lat = $result->lat;
                $userInfoObj->lon = $result->lon;
            }
            $userInfoObj->timezone = $result->timezone;
            $userInfoObj->isp = $result->isp;
            $userInfoObj->info_json = $jsonResult;
        }

        $userInfoObj->save();
        // echo "<center>$getip <br> $getdevice <br> $getbrowser <br> $getos <br> $userName</center>";

        return view('biodata');
    }

    public function saingSheet(Request $request)
    {
        return view('saing-sheet');
    }
}

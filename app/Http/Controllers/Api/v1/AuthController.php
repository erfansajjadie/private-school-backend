<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Requests\Api\v1\SendOtpRequest;
use App\Http\Requests\Api\v1\VerifyOtpRequest;
use App\Http\Resources\Api\v1\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kavenegar;

class AuthController extends Controller
{

    public function sendOtp(SendOtpRequest $request)
    {
        $items = $request->validated();

        $code = mt_rand(10000 , 99999);


        $items['otp'] = Hash::make($code);

        /// send sms_code
        try{
            $receptor = $request->phone;
            $result = Kavenegar::VerifyLookup($receptor, $code , $request->signature ,null  , 'verify');
        }
        catch(\Kavenegar\Exceptions\ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            return response()->json([
                'status' => "401",
                'message' => "مشکلی در ارسال کد فعالسازی پیش آمده است",
                "error" => $request->phone
            ], 200);
        }

        $user =  User::updateOrCreate([
            'phone' => $items['phone']
        ], $items);
        $user->touch();


        return [
            'success' => true,
            'message' => 'کد فعالسازی ارسال شد'
        ];
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        $items = $request->validated();

        $user = User::where('phone', $request->phone)->first();

        if(!Hash::check($request->otp, $user->otp)) {
            return response()->json([
                'success' => false,
                'message' => 'کد فعالسازی اشتباه وارد شده است'
            ], 400);
        }

        /* check if the time that otp created is not greater than 2 seconds */
        $time_diff = Carbon::now()->diffInSeconds($user->updated_at);
        if($time_diff > 120) {
            return response()->json([
                'success' => false,
                'message' => "کد فعالسازی منقضی شده است"
            ], 400);
        }

        $user->update([
            'phone_verified' => 1
        ]);

        $token = $user->createToken('api-token', ['user-access'])->plainTextToken;

        return [
            'success' => true,
            'message' => 'با موفقیت وارد شدید',
            'token' => $token,
            'profile_complete' => $user->user_name !== null,
            'user' => new UserResource($user)
        ];
    }
}

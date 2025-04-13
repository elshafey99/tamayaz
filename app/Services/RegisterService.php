<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\OTPEmail;
use App\Models\Father;
use App\Traits\HasImage;
use App\Helpers\OTPHelper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\StudentResource;
use App\Exceptions\InsuranceNotFoundException;

class RegisterService
{
    use HasImage;
    public function __construct(public User $user , public Father $father)
    {}


    public function register($data)
{
    if (isset($data['image'])) {
        $data['image'] = $this->saveImage($data['image'], 'user');
    } else {
        $data['image'] = asset('default/default.png');
    }

    if ($data['type'] == 'student') {
        do {
            $data['code_student'] = rand(100000, 999999);
        } while (User::where('code_student', $data['code_student'])->exists());
    }

    $data['password'] = Hash::make($data['password']);
    $data['code'] = rand(1000, 9999);
    $data['expire_at'] = Carbon::now()->addMinutes(1);
    $studentUser = User::where('type','student')
    ->where('code_student', $data['code_student'])
    ->whereNotNull('parent_id')
    ->first();
    if($studentUser)
    {
        throw new InsuranceNotFoundException(__('You student alreedy parent', [], request()->header('Accept-language')), 400);

    }
    if($data['type'] == 'student')
    {
        $register = $this->user->create($data);
    }elseif($data['type'] == 'parent'){
        $register = $this->father->create($data);
    }



    if (isset($data['type']) && $data['type'] === 'parent' && !empty($data['code_student'])) {
        $studentUser = User::where('type','student')
        ->where('code_student', $data['code_student'])
        ->whereNull('parent_id')
        ->first();

                if ($studentUser && !$studentUser->parent_id) {
            $studentUser->parent_id = $register->id;
            $studentUser->save();
        }
    }


    return $register;
}



    public function verify($data)
    {
        $user = User::where('email', $data['email'])->first() ?? Father::where('email', $data['email'])->first();


        if (!$user) {
            throw new InsuranceNotFoundException(__('Email not registered', [], request()->header('Accept-language')), 400);

        }

        if ($user->email_verified_at) {
            throw new InsuranceNotFoundException(__('The user account has already been verified', [], request()->header('Accept-language')), 400);
        }

        if ($user->code !== $data['otp']) {
            throw new InsuranceNotFoundException(__('Wrong OTP code', [], request()->header('Accept-language')), 400);
        }

        if (Carbon::parse($user->expire_at)->lt(Carbon::now())) {
            throw new InsuranceNotFoundException(__('The OTP code has expired', [], request()->header('Accept-language')), 400);
        }

        $token = $user->createToken("API TOKEN")->plainTextToken;
        $user->update([
            'email_verified_at' => Carbon::now(),
            'active' => 1,
            'code' => null,
            'expire_at' => null
        ]);

        Auth::login($user);

        return[$user , $token];
    }

    public function otp($data)
{
    $user = User::where('email', $data['email'])
                ->whereNotNull('code')
                ->whereNotNull('expire_at')
                ->first();

    if (!$user) {
        $user = Father::where('email', $data['email'])
                      ->whereNotNull('code')
                      ->whereNotNull('expire_at')
                      ->first();
    }
    if (!$user) {
        throw new InsuranceNotFoundException(__('Email not registered', [], request()->header('Accept-language')), 400);
    }

    if ($user && now()->greaterThan($user->expire_at)) {
        $newCode = rand(1000, 9999);
        $user->update([
            'code' => $newCode,
            'expire_at' => now()->addMinutes(1),
        ]);
    }

    return $user;
}





}

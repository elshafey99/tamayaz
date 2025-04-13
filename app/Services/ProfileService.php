<?php
namespace App\Services;

use App\Models\User;

use App\Traits\HasImage;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\InsuranceNotFoundException;


class ProfileService
{
    use HasImage;
    public function profile()
    {
        $user = auth('sanctum')->user();
        return $user;
    }

    public function updateProfile($data)
    {
        $user = auth('sanctum')->user();
        if (isset($data['image'])) {
            $data['image'] = $this->saveImage($data['image'], 'user');
        }
        if (isset($user->type) && $user->type === 'parent' && !empty($data['code_student'])) {
            $studentUser = User::where('type','student')
                ->where('code_student', $data['code_student'])
                ->whereNull('parent_id') 
                ->first();

            if ($studentUser) {
                $studentUser->parent_id = $user->id;
                $studentUser->save();
            }
        }

        $user->update($data);
        return $user;
    }

}

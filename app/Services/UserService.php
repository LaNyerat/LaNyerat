<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UserService 
{
    /**
     * Find user data and if not exists create new
     *
     * @param object $user (user details)
     * @param string $provider (provider used)
     * @return mixed
     */
    public function findOrCreate($user, $provider)
    {
        $authUser = User::where('username', $user->nickname)->first();
        if($authUser) {
            return $authUser;
        } else {
            $fileAvatar = file_get_contents($user->getAvatar());
            $path = 'public/avatar';
            $avatar = $user->getId() . '.jpg';
            $img = $this->cropAvatar($fileAvatar);

            Storage::disk('local')->put($path . '/' . $avatar, $img['460'], 'public');
            Storage::disk('local')->put($path . '/460/' . $avatar, $img['460'], 'public');
            $user = User::create([
                'name' => $user->name ?? $user->nickname,
                'email' => $user->getEmail() ?? '',
                'username' => $user->nickname,
                'avatar' => $avatar,
                'bio' => $user->user['bio'] ?? $user->user['description'],
                'provider' => $provider,
                'provider_id' => $user->id,
                'social_link' => $user->user['html_url'] ?? 'https://twitter.com/' . $user->nickname
            ]);

            User::find($user->id)->assignRole('admin');

            return $user;
        }
    }

    /**
     * Crop avatar to 460px and 80 px
     *
     * @param string|bool $image (image file)
     * @return array
     */
    public function cropAvatar($image)
    {
        $img = Image::make($image);
        $img->fit(460);
        $img460 = $img->stream()->detach();
        $img->fit(80);
        $img80 = $img->stream()->detach();

        return ['460' => $img460, '80' => $img80];
    }
}
<?php

namespace App\DTO\User;

use App\Http\Requests\User\UserUpdateRequest;

class UpdateUserDTO
{

    public function __construct(
        public string|int $id,
        public string $name,
        public string $email,
        public string | null $password, 
        public string | null $telephone,
        public string | null $genre_film,
        public string | null $genre_music,
        public string | null $genre_sport,
        public string | null $description,
        public string|array|null $avatar_file)
    {
    }

    public static function makeFromRequest(UserUpdateRequest $request)
    {
        return new self(
            $request->id,
            $request->name,
            $request->email,
            $request->password,
            $request->telephone,
            $request->genre_film,
            $request->genre_music,
            $request->genre_sport,
            $request->description,
            [
                'file'        => $request->file('avatar'),
                'file_name'   => $request->file('avatar') ? $request->file('avatar')->getClientOriginalName() : ''
            ]
        );
    }

}
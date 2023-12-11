<?php

namespace Database\Seeders;

use App\DTO\User\CreateUserDTO;
use App\Models\User;
use Illuminate\Database\Seeder;

use App\Services\UserService;

class DatabaseSeeder extends Seeder
{
    public $data_users = [
        ['name' => 'Naruto Uzumaki', 'email' => 'naruto@uzumaki.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Sasuke Uchiha', 'email' => 'sasuke@uchiha.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Sakura Haruno', 'email' => 'sakura@haruno.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Kakashi Hatake', 'email' => 'kakashi@hatake.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Hinata Hyuga', 'email' => 'hinata@hyuga.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Minato Namikaze', 'email' => 'minato@namikaze.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Obito Uchiha', 'email' => 'obito@uchiha.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Jiraiya', 'email' => 'jiraya@jiraya.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Orochimaru', 'email' => 'orochimaru@orochimaru.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Gaara', 'email' => 'gaara@gaara.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Tsunade Senju', 'email' => 'tsunade@senju.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Deidara', 'email' => 'deidara@deidara.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Shikamaru Nara', 'email' => 'shikamaru@nara.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Kushina Uzumaki', 'email' => 'kushina@uzumaki.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
        ['name' => 'Temari', 'email' => 'temari@temari.com.br', 'password' => 'teste123', 'telephone' => '(99) 99999-9999', 'genre_film' => 'Comédia', 'genre_music' => 'Rock', 'genre_sport' => 'Skate', 'description'=>'Clube do Naruto'],
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $repository = new User;
        foreach ($this->data_users as $user) {
            $repository->create($user);
        }
    }
}

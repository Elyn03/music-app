<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Track;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'admin' => 1,
        ]);

        Track::factory(2)->create();

        Track::factory()->create([
            'title' => 'The Albatross',
            'image' => 'tracks/images/trk-a0559a83-94cb-4826-ba74-5198fe5d1063.jpg',
            'music' => 'tracks/musics/trk-2e1ae80c-925f-4656-8300-5e5e7bf82a18.mp3',
        ]);
        Track::factory()->create([
            'title' => 'If This Was A Movie (Taylors Version)',
            'image' => 'tracks/images/trk-6cc03781-3fa5-4b4d-8063-21d103042657.jpg',
            'music' => 'tracks/musics/trk-6cc03781-3fa5-4b4d-8063-21d103042657.mp3',
        ]);
        Track::factory()->create([
            'title' => 'loml',
            'image' => 'tracks/images/trk-2e1ae80c-925f-4656-8300-5e5e7bf82a18.jpg',
            'music' => 'tracks/musics/trk-95fa16ba-17e1-4007-b2b6-2ecfce09b419.mp3',
        ]);
        Track::factory()->create([
            'title' => 'My Boy Only Breaks His Favorite Toys',
            'image' => 'tracks/images/trk-2e1ae80c-925f-4656-8300-5e5e7bf82a18.jpg',
            'music' => 'tracks/musics/trk-7519d422-5082-488b-926d-b1ccd1790c8e.mp3',
        ]);
        Track::factory()->create([
            'title' => 'You\'re Losing Me (From The Vault)',
            'image' => 'tracks/images/trk-a555fa81-072d-4047-9737-771f00e4c77f.jpg',
            'music' => 'tracks/musics/trk-a555fa81-072d-4047-9737-771f00e4c77f.mp3',
        ]);
        Track::factory()->create([
            'title' => 'No Body No Crime',
            'image' => 'tracks/images/trk-ae4ecf8c-9256-44e7-b155-b30e4fc3b98f.jpg',
            'music' => 'tracks/musics/trk-ae4ecf8c-9256-44e7-b155-b30e4fc3b98f.mp3',
        ]);
        Track::factory()->create([
            'title' => 'Down Bad',
            'image' => 'tracks/images/trk-2e1ae80c-925f-4656-8300-5e5e7bf82a18.jpg',
            'music' => 'tracks/musics/trk-d8a33e6c-2689-4b66-bd98-4dbc4e4a0f8b.mp3',
        ]);
        Track::factory()->create([
            'title' => 'The Bolter',
            'image' => 'tracks/images/trk-a0559a83-94cb-4826-ba74-5198fe5d1063.jpg',
            'music' => 'tracks/musics/TheBolter.mp3',
        ]);
    }
}

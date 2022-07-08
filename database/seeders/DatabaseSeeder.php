<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\App;
use App\Models\Criteria;
use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $app = App::create([
            'name' => 'Budidaya Ikan',
            'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'status' => 'exist'
        ]);

        $alt1 = Alternative::create([
            'app_id' => $app->id,
            'name' => 'Papuyu'
        ]);
        $alt2 = Alternative::create([
            'app_id' => $app->id,
            'name' => 'Haruan'
        ]);
        $alt3 = Alternative::create([
            'app_id' => $app->id,
            'name' => 'Patin'
        ]);
        $alt4 = Alternative::create([
            'app_id' => $app->id,
            'name' => 'Saluang'
        ]);
        $alt5 = Alternative::create([
            'app_id' => $app->id,
            'name' => 'Sapat'
        ]);

        $c1 = Criteria::create([
            'app_id' => $app->id,
            'code' => 'C1',
            'name' => 'PH Air',
            'weight' => 25,
            'type' => 'benefit'
        ]);
        $c2 = Criteria::create([
            'app_id' => $app->id,
            'code' => 'C2',
            'name' => 'Suhu',
            'weight' => 15,
            'type' => 'benefit'
        ]);
        $c3 = Criteria::create([
            'app_id' => $app->id,
            'code' => 'C3',
            'name' => 'Oksigen Terlarut',
            'weight' => 15,
            'type' => 'benefit'
        ]);
        $c4 = Criteria::create([
            'app_id' => $app->id,
            'code' => 'C4',
            'name' => 'Amoniak',
            'weight' => 15,
            'type' => 'benefit'
        ]);
        $c5 = Criteria::create([
            'app_id' => $app->id,
            'code' => 'C5',
            'name' => 'Nitrit',
            'weight' => 10,
            'type' => 'benefit'
        ]);
        $c6 = Criteria::create([
            'app_id' => $app->id,
            'code' => 'C6',
            'name' => 'Kecerahan Air',
            'weight' => 10,
            'type' => 'benefit'
        ]);

        Score::create([
            'alternative_id' => $alt1->id,
            'criteria_id' => $c1->id,
            'score' => '5'
        ]);
        Score::create([
            'alternative_id' => $alt1->id,
            'criteria_id' => $c2->id,
            'score' => '26'
        ]);
        Score::create([
            'alternative_id' => $alt1->id,
            'criteria_id' => $c3->id,
            'score' => '2'
        ]);
        Score::create([
            'alternative_id' => $alt1->id,
            'criteria_id' => $c4->id,
            'score' => '0.1'
        ]);
        Score::create([
            'alternative_id' => $alt1->id,
            'criteria_id' => $c5->id,
            'score' => '1'
        ]);
        Score::create([
            'alternative_id' => $alt1->id,
            'criteria_id' => $c6->id,
            'score' => '20'
        ]);

        Score::create([
            'alternative_id' => $alt2->id,
            'criteria_id' => $c1->id,
            'score' => '6'
        ]);
        Score::create([
            'alternative_id' => $alt2->id,
            'criteria_id' => $c2->id,
            'score' => '25'
        ]);
        Score::create([
            'alternative_id' => $alt2->id,
            'criteria_id' => $c3->id,
            'score' => '2'
        ]);
        Score::create([
            'alternative_id' => $alt2->id,
            'criteria_id' => $c4->id,
            'score' => '0.1'
        ]);
        Score::create([
            'alternative_id' => $alt2->id,
            'criteria_id' => $c5->id,
            'score' => '1'
        ]);
        Score::create([
            'alternative_id' => $alt2->id,
            'criteria_id' => $c6->id,
            'score' => '20'
        ]);

        Score::create([
            'alternative_id' => $alt3->id,
            'criteria_id' => $c1->id,
            'score' => '6.5'
        ]);
        Score::create([
            'alternative_id' => $alt3->id,
            'criteria_id' => $c2->id,
            'score' => '27'
        ]);
        Score::create([
            'alternative_id' => $alt3->id,
            'criteria_id' => $c3->id,
            'score' => '3'
        ]);
        Score::create([
            'alternative_id' => $alt3->id,
            'criteria_id' => $c4->id,
            'score' => '0.1'
        ]);
        Score::create([
            'alternative_id' => $alt3->id,
            'criteria_id' => $c5->id,
            'score' => '1'
        ]);
        Score::create([
            'alternative_id' => $alt3->id,
            'criteria_id' => $c6->id,
            'score' => '50'
        ]);

        Score::create([
            'alternative_id' => $alt4->id,
            'criteria_id' => $c1->id,
            'score' => '6.5'
        ]);
        Score::create([
            'alternative_id' => $alt4->id,
            'criteria_id' => $c2->id,
            'score' => '24'
        ]);
        Score::create([
            'alternative_id' => $alt4->id,
            'criteria_id' => $c3->id,
            'score' => '3'
        ]);
        Score::create([
            'alternative_id' => $alt4->id,
            'criteria_id' => $c4->id,
            'score' => '0.1'
        ]);
        Score::create([
            'alternative_id' => $alt4->id,
            'criteria_id' => $c5->id,
            'score' => '1'
        ]);
        Score::create([
            'alternative_id' => $alt4->id,
            'criteria_id' => $c6->id,
            'score' => '20'
        ]);

        Score::create([
            'alternative_id' => $alt5->id,
            'criteria_id' => $c1->id,
            'score' => '6'
        ]);
        Score::create([
            'alternative_id' => $alt5->id,
            'criteria_id' => $c2->id,
            'score' => '24'
        ]);
        Score::create([
            'alternative_id' => $alt5->id,
            'criteria_id' => $c3->id,
            'score' => '3'
        ]);
        Score::create([
            'alternative_id' => $alt5->id,
            'criteria_id' => $c4->id,
            'score' => '0.1'
        ]);
        Score::create([
            'alternative_id' => $alt5->id,
            'criteria_id' => $c5->id,
            'score' => '1'
        ]);
        Score::create([
            'alternative_id' => $alt5->id,
            'criteria_id' => $c6->id,
            'score' => '20'
        ]);
    }
}

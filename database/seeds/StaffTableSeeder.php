<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        function fullNameGen() {
            $surname = ['Abakumov','Aksakov','Aksenchuk', 'Aksyonov', 'Akulov','Aleyev', 'Alexandrov', 'Alexeyev', 'Alenin', 'Alekhin', 'Alyokhin', 'Aliyev', 'Alistratov', 'Alliluyev',
                'Alogrin', 'Amaliyev', 'Amelin', 'Babanin','Babikov','Babichev','Babkin','Baburin','Babykin','Bagrov','Bazhanov','Bazhenov','Bazanov','Bazarov','Bazin','Balabanov','Balakin','Balakirev','Balandin',
                'Glebov','Grinin','Dorokhin','Yelizarov','Zharkov','Zaytsev','Ignatyev','Izmaylov','Kedrov','Konev','Konnikov','Konovalov','Kopeykin',
                'Kopsov','Koptsev','Korablyov','Korablin','Korenev','Korzhakov','Korzhev','Kornev','Lebedinsky','Lebedintsev','Lebed','Levin','Levkin','Ledovskoy',
                'Lelukh','Leonidov','Leonov','Lepyokhin','Lermontov','Leskov','Lesnichy','Letov','Leshev','Leshchyov','Lyovkin','Lidin','Menshchikov','Merkulov',
                'Merkushev','Mesyats','Mekhantyev','Meshcheryakov','Migunov','Milyokhin','Miloradov','Milyukov','Milyutin','Minayev','Mineyev','Minin','Minkin',
                'Minkovsky','Mirnov','Mirov','Mironov','Mirokhin','Mirsky','Nechayev','Nizamutdinov','Nikitin','Nikiforov','Nikishin','Nikolayev','Nikonov',
                'Pirogov','Pirozhkov','Pichugin','Pichushkin','Pishchalnikov','Plaksin','Platonov','Plemyannikov','Plisetsky','Pogodin','Pogrebnov','Poda','Podshivalov',
                'Pozharsky','Pozdnyakov','Pokrovsky','Polivanov','Polishchuk','Polnaryov','Polovtsev','Polotentsev','Poltanov','Poltorak','Polunin','Polushin','Polyakov',
                'Pomelov','Pomelnikov','Ponikarov','Ponomaryov','Ponchikov','Popov','Popyrin','Portnov','Posokhov','Potapov','Potyomkin','Prazdnikov','Preobrazhensky',
                'Pribylov','Privalov','Primakov','Prikhodko','Pronin','Pronichev','Proskurkin','Protasov','Prokhorov','Pugachyov','Pugin','Pudin','Pudovkin',
                'Puzakov','Puzanov','Putilin','Putilov','Putyatin','Pushkaryov','Pushkin','Pushnoy','Pyryev','Pyanykh','Pyatosin','Rabinovich','Razin','Razuvayev',
                'Ramazanov','Raskalov','Raspopov','Rasputin','Rasskazov','Rastorguyev','Ratkevich','Rafikov','Revyagin','Revyakin','Sabantsev','Sabitov','Savasin',
                'Savvatimov','Savvin','Savenkov','Savinkov','Savrasov','Sagadeyev','Sadovsky','Sadykov','Sazonov','Saitov','Say','Salagin','Salimov','Salko','Saltanov',
                'Salkov','Salnikov','Samarin','Samoylov','Samokhin','Samsonov','Sannikov','Sapalyov','Sapogov','Sapozhnikov','Saprykin','Sarnychev','Safiullin','Safronov',
                'Sakharov','Tabakov','Talalikhin','Talanov','Tamarkin','Tamakhin','Tankov','Tarasov','Tarnovetsky','Tatarinov','Tatarintsev','Tatarov','Tataurov','Tattar','Taushev',
            ];

            $name = ['Aleksandr','Aleksey','Anatoly','Boris','Dmitry','Gennady','Georgy','Grigory','Yevgeniy','Ivan','Konstantin',
                'Leonid','Lev','Mihail','Nikolay','Pavel','Pyotr','Roman','Sergey','Stanislav','Valentin','Valery','Vasily',
                'Viktor','Vladimir','Vladislav','Vyacheslav','Evgeniy','Yury'
            ];

            $patronymic = ['Aleksandrovich','Alekseyovich','Anatolyovich','Borisovich','Dmitryevich','Gennadyevich','Georgyevich','Grigoryevich','Yevgeniyevich','Ivanovich',
                'Konstantinovich','Leonidovich','Mihailovich','Nikolayevich','Pavlovich','Petrovich','Romanovich','Sergeyevich','Stanislavovich','Valentinovich','Valeryevich',
                'Vasilyevich','Viktorovich','Vladimirovich','Vladislavovich','Vyacheslavovich','Evgeniyevich','Yuryevich'
            ];

            $fullName = collect($surname)->random() . ' ' . collect($name)->random() . ' ' . collect($patronymic)->random();

            return $fullName;
        }

        $counterId = 1;
        DB::table('staff')->insert([
            'name' => fullNameGen(),
            'user_id' => 1,
            'position_id' => 1,
            'salary' => 40000,
            'parent_id' => NULL,
            'started_at' => now(),
        ]);
        $i1 = 1;
        while ( $i1 <= 5) {
            $counterId++;
            DB::table('staff')->insert([
                'name' => fullNameGen(),
                'user_id' => 1,
                'position_id' => 2,
                'salary' => 30000,
                'parent_id' => 1,
                'started_at' => now(),
            ]);

            $i2 = 1;
            $parentId3 = $counterId;
            while ( $i2 <= 5) {
                $counterId++;
                DB::table('staff')->insert([
                    'name' => fullNameGen(),
                    'user_id' => 1,
                    'position_id' => 3,
                    'salary' => 20000,
                    'parent_id' => $parentId3,
                    'started_at' => now(),
                ]);

                $i3 = 1;
                $parentId4 = $counterId;
                while ( $i3 <= 10) {
                    $counterId++;
                    DB::table('staff')->insert([
                        'name' => fullNameGen(),
                        'user_id' => 1,
                        'position_id' => 4,
                        'salary' => 14000,
                        'parent_id' => $parentId4,
                        'started_at' => now(),
                    ]);

                    $i4 = 1;
                    $parentId5 = $counterId;
                    while ( $i4 <= 10) {
                        $counterId++;
                        DB::table('staff')->insert([
                            'name' => fullNameGen(),
                            'user_id' => 1,
                            'position_id' => 5,
                            'salary' => 12000,
                            'parent_id' => $parentId5,
                            'started_at' => now(),
                        ]);
                        $i4++;
                    }
                    $i3++;
                }
                $i2++;
            }
            $i1++;
        }
    }
}

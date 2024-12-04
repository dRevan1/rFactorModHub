<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            "name"=> "Gordon Freeman",
            "email"=> "freeman@blackmesa.com",
            "password"=> bcrypt("blackmesa"),
        ]);

        User::factory()->create([
            "name"=> "Darth Revan",
            "email"=> "drevan@sith.com",
            "password"=> bcrypt("starwars"),
        ]);

        Vehicle::factory()->create([
            "name"=> "Oreca 07 LMP2",
            "author"=> "Gordon Freeman",
            "category"=> "LMP2",
            "description"=> "The Oreca 07 is a Le Mans Prototype built by French manufacturer Oreca to meet the 2017 FIA and
                        ACO LMP2 regulations.
                        It made its official race debut in the opening round of the 2017 IMSA WeatherTech SportsCar
                        Championship, the 24 Hours of Daytona,
                        and its FIA World Endurance Championship debut at the 2017 6 Hours of Silverstone.
                        The car is the successor to the Oreca 05.
                        Oreca 07 turned out to be the car of choice for LMP2 teams, finding more buyers every year, who
                        switched to the chassis from the previously purchased ones of other brands.
                        All 24 LMP2 cars in the 2023 24 Hours of Le Mans were the Oreca 07. Since the 2019 IMSA season,
                        only two LMP2 entries have not been an Oreca 07.",
        ]);

        Vehicle::factory()->create([
            "name"=> "Oreca 07 LMP2",
            "author"=> "Darth Revan",
            "category"=> "LMP2",
            "description"=> "The Oreca 07 is a Le Mans Prototype built by French manufacturer Oreca to meet the 2017 FIA and
                        ACO LMP2 regulations.
                        It made its official race debut in the opening round of the 2017 IMSA WeatherTech SportsCar
                        Championship, the 24 Hours of Daytona,
                        and its FIA World Endurance Championship debut at the 2017 6 Hours of Silverstone.
                        The car is the successor to the Oreca 05.
                        Oreca 07 turned out to be the car of choice for LMP2 teams, finding more buyers every year, who
                        switched to the chassis from the previously purchased ones of other brands.
                        All 24 LMP2 cars in the 2023 24 Hours of Le Mans were the Oreca 07. Since the 2019 IMSA season,
                        only two LMP2 entries have not been an Oreca 07.",
        ]);

        Vehicle::factory()->create([
            "name"=> "Oreca 07",
            "author"=> "Darth Revan",
            "category"=> "LMP2",
            "description"=> "The Oreca 07 is a Le Mans Prototype built by French manufacturer Oreca to meet the 2017 FIA and
                        ACO LMP2 regulations.
                        It made its official race debut in the opening round of the 2017 IMSA WeatherTech SportsCar
                        Championship, the 24 Hours of Daytona,
                        and its FIA World Endurance Championship debut at the 2017 6 Hours of Silverstone.
                        The car is the successor to the Oreca 05.
                        Oreca 07 turned out to be the car of choice for LMP2 teams, finding more buyers every year, who
                        switched to the chassis from the previously purchased ones of other brands.
                        All 24 LMP2 cars in the 2023 24 Hours of Le Mans were the Oreca 07. Since the 2019 IMSA season,
                        only two LMP2 entries have not been an Oreca 07.",
        ]);
    }
}
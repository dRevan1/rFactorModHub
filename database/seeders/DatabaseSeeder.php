<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Track;
use App\Models\Mod;
use Illuminate\Database\Seeder;

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

        Mod::factory()->create([
            "name"=> "Oreca 07 LMP2",
            "author"=> "Gordon Freeman",
            "category"=> "LMP2",
            "thumbnail"=> "images/car_thumbnail.jpg",
            "type" => "vehicle",
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

        Mod::factory()->create([
            "name"=> "Oreca 07 LMP2",
            "author"=> "Darth Revan",
            "category"=> "LMP2",
            "thumbnail"=> "images/car_thumbnail.jpg",
            "type" => "vehicle",
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

        Mod::factory()->create([
            "name"=> "Oreca 07",
            "author"=> "Darth Revan",
            "category"=> "LMP2",
            "thumbnail"=> "images/car_thumbnail.jpg",
            "type" => "vehicle",
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

        Mod::factory()->create([
            "name"=> "Circuit de Spa-Francorchamps",
            "author"=> "Gordon Freeman",
            "thumbnail"=> "images/track_thumbnail.jpg",
            "type"=> "track",
            "description"=> "The Circuit de Spa-Francorchamps, informally referred to as Spa, is a 7.004 km (4.352 mi) motor-racing
                        circuit located in Francorchamps, Stavelot, Wallonia, Belgium,
                        about 8 km (5.0 mi) southeast of Spa. It is the current venue of the Formula One Belgian Grand Prix, hosting
                        its first Grand Prix in 1925, and has held a Grand Prix
                        every year since 1985 except 2003 and 2006. Spa also hosts several other international events including the
                        24 Hours of Spa, the World Endurance Championship 6 Hours
                        of Spa-Francorchamps. It is also the host of the Uniroyal Fun Cup 25 Hours of Spa, one of the longest motor
                        races in the world. The circuit has undergone several
                        redesigns through its history, most extensively in 1979 when the track was modified and shortened from a
                        14.100 km (8.761 mi) circuit using public roads
                        to a 6.947 km (4.317 mi) permanent circuit due to safety concerns with the old circuit."
        ]);

        Mod::factory()->create([
            "name"=> "Silverstone Circuit",
            "author"=> "Gordon Freeman",
            "thumbnail"=> "images/track_thumbnail.jpg",
            "type"=> "track",
            "description"=> "Silverstone Circuit is a motor racing circuit in England, near the Northamptonshire villages of Silverstone
                        and Whittlebury. It is the home of the British Grand Prix,
                        which it first hosted as the 1948 British Grand Prix. The 1950 British Grand Prix at Silverstone was the
                        first race in the newly created World Championship of Drivers.
                        The race rotated between Silverstone, Aintree and Brands Hatch from 1955 to 1986, but settled permanently at
                        the Silverstone track in 1987. The circuit also hosts the
                        British round of the MotoGP series."
        ]);

        Mod::factory()->create([
            "name"=> "Circuit de Spa-Francorchamps",
            "author"=> "Darth Revan",
            "thumbnail"=> "images/track_thumbnail.jpg",
            "type"=> "track",
            "description"=> "TESTING TESTING"
        ]);

        Mod::factory()->create([
            "name"=> "Silverstone Circuit",
            "author"=> "Darth Revan",
            "thumbnail"=> "images/track_thumbnail.jpg",
            "type"=> "track",
            "description"=> "LOREM IPSUM IDK NANANANANANANANNANANANAN"
        ]);

        $categories_vehicle = ["GT4", "GT3", "GT2", "LMP3", "LMP2", "Hypercar", "F1", "F2", "F3", "F4", "Other"];
        $categories_other = ["Skins", "HUD", "Sounds", "Other"];

        foreach($categories_vehicle as $category) {
            Category::factory()->create([
                "name"=> $category
            ]);    
        }
        foreach($categories_other as $category_other) {
            Category::factory()->custom_type("other")->create([
                "name"=> $category_other
            ]);    
        }
    }
}
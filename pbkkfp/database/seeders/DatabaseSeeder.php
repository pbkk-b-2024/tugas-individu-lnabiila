<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderMenu;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        DB::table('types')->insert([
            ['name' => 'Hoka Ramen'],
            ['name' => 'Set Menu'],
            ['name' => 'Main Menu'],
            ['name' => 'Fried Menu'],
            ['name' => 'Soup & Sukiyaki'],
            ['name' => 'Desserts'],
            ['name' => 'Snacks'],
        ]);
        DB::table('menus')->insert([
            ['name' => 'Wafu Shoyu Ramen', 'type_id' => 1, 'price' => 45000, 'original_price' => 45000, 'description' => "Ramen with savory shoyu sauce topped with Chicken Chasiu and Ni Tamago.", 'photo' => 'WafuShoyuRamen.png'],
            ['name' => 'Wafu Curry Beef Ramen', 'type_id' => 1, 'price' => 61000, 'original_price' => 61000, 'description' => "Ramen with typical Japanese curry sauce topped with Beef and Ni Tamago.", 'photo' => 'WafuCurryBeefRamen.png'],
            ['name' => 'Spicy Ramen Reguler', 'type_id' => 1, 'price' => 38000, 'original_price' => 38000, 'description' => 'Ramen with a large portion of spicy chicken broth, topped with Chasiu Chicken, Ni Tamago, Pakcoy, green onions and sliced ​mushrooms.', 'photo' => 'SpicyRamen.png'],
            ['name' => 'Hokkaido Miso Ramen', 'type_id' => 1, 'price' => 35000, 'original_price' => 35000, 'description' => 'Ramen with Miso sauce topped with Chasiu Chicken, Tori Soboro, Ni Tamago, Pakcoy, Corn and unsalted butter.', 'photo' => 'HokkaidoMisoRamen.png'],
            ['name' => 'Tori Paitan Ramen', 'type_id' => 1, 'price' => 35000, 'original_price' => 35000, 'description' => 'Ramen with chicken broth, topped with Chasiu Chicken, Ni Tamago, Pakcoy, green onions and nori.', 'photo' => 'ToriPaitanRamen.png'],
            
            ['name' => 'Hoka Delight - Mini Tori Ball', 'type_id' => 2, 'price' => 16500, 'original_price' => 16500, 'description' => 'The set menu is served in a bowl complete with rice, a choice of fried mini toriball menu, peas and scrambled eggs mixed with HokBen\'s signature mentai sauce.', 'photo' => 'MiniToriBall.png'],
            ['name' => 'Hoka Delight - Mini Shrimp Roll', 'type_id' => 2, 'price' => 16500, 'original_price' => 16500, 'description' => 'The set menu is served in a bowl complete with rice, a choice of fried MINI SHRIMP ROLL menu, peas and scrambled eggs mixed with HokBen\'s signature mentai sauce.', 'photo' => 'MiniShrimpRoll.png'],
            ['name' => 'Hoka Delight - Curry Minche Ball', 'type_id' => 2, 'price' => 16500, 'original_price' => 16500, 'description' => 'The set menu is served in a bowl complete with rice, a choice of fried CURRY MINCHE BALL peas and scrambled eggs mixed with HokBen\'s signature mentai sauce.', 'photo' => 'CurryMincheBall.png'],
            ['name' => 'Hoka Delight - Harumaki Beef', 'type_id' => 2, 'price' => 16500, 'original_price' => 16500, 'description' => 'The set menu is served in a bowl complete with rice, a choice of fried CURRY MINCHE BALL peas and scrambled eggs mixed with HokBen\'s signature mentai sauce.', 'photo' => 'HarumakiBeef.png'],
            ['name' => 'Tokyo Bowl - Gyu Soboro Don', 'type_id' => 2, 'price' => 22000, 'original_price' => 22000, 'description' => 'Set menu containing minced beef with HokBen\'s signature teriyaki sauce served over a bowl of rice, omelet, peas and lettuce', 'photo' => 'GyuSoboroDon.png'],
            ['name' => 'Tokyo Bowl - Maze Udon', 'type_id' => 2, 'price' => 22000, 'original_price' => 22000, 'description' => 'Set menu containing minced beef with HokBen\'s signature teriyaki sauce served over a bowl of Udon, scrambled egg and peas', 'photo' => 'MazeUdon.png'],
            ['name' => 'Tokyo Bowl - Umakara Soboro Udon', 'type_id' => 2, 'price' => 22000, 'original_price' => 22000, 'description' => 'Set menu containing minced beef with special umakara sauce HokBen is served over a bowl of Udon, omelet and bok choy', 'photo' => 'UmakaraSoboroUdon.png'],
            ['name' => 'Hoka Hemat 1', 'type_id' => 2, 'price' => 28000, 'original_price' => 28000, 'description' => 'HokBen special rice, salad, Ekkado and 3 Egg Chicken Roll *Salad for dine in only.', 'photo' => 'HokaHemat1.png'],
            ['name' => 'Hoka Hemat 2', 'type_id' => 2, 'price' => 28000, 'original_price' => 28000, 'description' => 'HokBen special rice, salad, 2 Tori Ball and 2 Egg Chicken Roll *Salad for dine in only.', 'photo' => 'HokaHemat2.png'],
            ['name' => 'Hoka Hemat 3', 'type_id' => 2, 'price' => 28000, 'original_price' => 28000, 'description' => 'HokBen special rice, salad, 2 Egg Chicken Roll and 2 Shrimp Roll *Salad for dine in only', 'photo' => 'HokaHemat3.png'],
            ['name' => 'Hoka Hemat 4', 'type_id' => 2, 'price' => 28000, 'original_price' => 28000, 'description' => 'HokBen special rice, salad and 4 Shrimp Roll *Salad for dine in only', 'photo' => 'HokaHemat4.png'],

            ['name' => 'Chicken Yakiniku', 'type_id' => 3, 'price' => 33500, 'original_price' => 33500, 'description' => 'Boneless chicken meat and slices of onion cooked with HokBen special yakiniku sauce.', 'photo' => 'ChickenYakiniku.png'],
            ['name' => 'Beef Yakiniku', 'type_id' => 3, 'price' => 43500, 'original_price' => 43500, 'description' => 'Premium beef, slices of onion and green paprika cooked with HokBen special yakiniku sauce.', 'photo' => 'BeefYakiniku.png'],
            ['name' => 'Chicken Teriyaki', 'type_id' => 3, 'price' => 33500, 'original_price' => 33500, 'description' => 'Boneless chicken meat and slices of onion cooked with HokBen special teriyaki sauce.', 'photo' => 'ChickenTeriyaki.png'],
            ['name' => 'Beef Teriyaki', 'type_id' => 3, 'price' => 43500, 'original_price' => 43500, 'description' => 'Premium beef, slices of onion and cooked with HokBen special teriyaki sauce.', 'photo' => 'BeefTeriyaki.png'],
            ['name' => 'Chicken Curry Yaki', 'type_id' => 3, 'price' => 30500, 'original_price' => 30500, 'description' => 'Chicken curry yaki the taste of Japanese curry', 'photo' => 'ChickenCurryYaki.png'],
            ['name' => 'Blackpepper Miso Chicken', 'type_id' => 3, 'price' => 35500, 'original_price' => 35500, 'description' => 'Boneless Roast Chicken Seasoned with Blackpepper & Miso sauce', 'photo' => 'BlackpepperMisoChicken.png'],
            ['name' => 'Takoyaki', 'type_id' => 3, 'price' => 38000, 'original_price' => 38000, 'description' => '-', 'photo' => 'Takoyaki.png'],

            ['name' => 'Ekkado', 'type_id' => 4, 'price' => 40500, 'original_price' => 40500, 'description' => 'Delicious petite quaill eggs coated with processed shrimp meat and wrapped with tofu skin, cooked with deep frying method, so you can get fresh and soft quaill egg inside your Ekkado.', 'photo' => 'Ekkado.png'],
            ['name' => 'Egg Chicken Roll', 'type_id' => 4, 'price' => 34500, 'original_price' => 34500, 'description' => 'Egg chicken roll made from processed chicken meat rolled with egg and cook with deep frying method.', 'photo' => 'Egg Chicken Roll.png'],
            ['name' => 'Shrimp Roll', 'type_id' => 4, 'price' => 33500, 'original_price' => 33500, 'description' => 'Processed shrimp meat wrapped in egg and bread flour, cook in deep frying method. Best combine with tomato or chilli sauce.', 'photo' => 'ShrimpRoll.png'],
            ['name' => 'Tori Ball', 'type_id' => 4, 'price' => 34500, 'original_price' => 34500, 'description' => 'Processed chicken breast wrapped in bread flour and cooked with deep frying method', 'photo' => 'ToriBall.png'],
            ['name' => 'Ebi Furai', 'type_id' => 4, 'price' => 40500, 'original_price' => 40500, 'description' => 'Skinless shrimp wrapped in bread flour and cooked with deep frying method. Crunchy outside but soft inside.', 'photo' => 'EbiFurai.png'],
            ['name' => 'Chicken Katsu', 'type_id' => 4, 'price' => 33500, 'original_price' => 33500, 'description' => 'Boneless chicken breast wrapped with flour and special seasoning of HokBen cooked above 150 degrees, crunchy outside but soft inside.', 'photo' => 'ChickenKatsu.png'],
            ['name' => 'Crispy Karaage', 'type_id' => 4, 'price' => 29500, 'original_price' => 29500, 'description' => 'CRISPY KARAAGE 4 PCS', 'photo' => 'CrispyKaraage.png'],
            ['name' => 'Kani Roll', 'type_id' => 4, 'price' => 33500, 'original_price' => 33500, 'description' => 'Made from processed small crab meat wrapped with tofu skin and cooked in deep frying method.', 'photo' => 'KaniRoll.png'],
            ['name' => 'Tori No Teba', 'type_id' => 4, 'price' => 31000, 'original_price' => 31000, 'description' => 'A special HokBen creation made from processed chicken wings, cooked with Deep Frying Oil method.', 'photo' => 'ToriNoTeba.png'],

            ['name' => 'Clear Soup', 'type_id' => 5, 'price' => 10000, 'original_price' => 10000, 'description' => '-', 'photo' => 'ClearSoup.png'],
            ['name' => 'Shirataki Soup', 'type_id' => 5, 'price' => 17000, 'original_price' => 17000, 'description' => '-', 'photo' => 'ShiratakiSoup.png'],
            ['name' => 'Chicken Tofu', 'type_id' => 5, 'price' => 21000, 'original_price' => 21000, 'description' => 'Japanese tofu layered with chicken meat, served with chicken broth and leeks. Warm and delicious.', 'photo' => 'ChickenTofu.png'],
            ['name' => 'Shrimp Ball', 'type_id' => 5, 'price' => 24500, 'original_price' => 24500, 'description' => 'Processed shrimp meatballs served with leeks and HokBen\'s special chicken broth.', 'photo' => 'ShrimpBall.png'],
            ['name' => 'Shrimp Dumpling', 'type_id' => 5, 'price' => 21000, 'original_price' => 21000, 'description' => 'Made from processed shrimp wrapped in wonton skin, served with leeks and HokBen\'s special broth.', 'photo' => 'ShrimpDumpling.png'],
            ['name' => 'Sukiyaki', 'type_id' => 5, 'price' => 60000, 'original_price' => 60000, 'description' => 'Premium sliced meat stew with japanese silk tofu, shiratake, white mustard, onion leaves, onions riched with HokBen special sukiyaki sauce.', 'photo' => 'Sukiyaki.png'],

            ['name' => 'Soft Caramel Pudding', 'type_id' => 6, 'price' => 19000, 'original_price' => 19000, 'description' => '-', 'photo' => 'SoftCaramelPudding.png'],
            ['name' => 'Pudding Coklat', 'type_id' => 6, 'price' => 21000, 'original_price' => 21000, 'description' => '-', 'photo' => 'PuddingCoklat.png'],
            ['name' => 'Es Merah Delima', 'type_id' => 6, 'price' => 20000, 'original_price' => 20000, 'description' => '-', 'photo' => 'EsMerahDelima.png'],
            ['name' => 'Es Sarang Burung', 'type_id' => 6, 'price' => 21000, 'original_price' => 21000, 'description' => 'Dessert made of gelatin and Longan fruits served with simple syrup and shaved ice.', 'photo' => 'EsSarangBurung.png'],
            ['name' => 'Ogura', 'type_id' => 6, 'price' => 14000, 'original_price' => 14000, 'description' => 'Special dessert made of red beans served with simple syrup, coconut milk and shaved ice.', 'photo' => 'Ogura.png'],

            ['name' => 'Shumay Steam', 'type_id' => 7, 'price' => 16000, 'original_price' => 16000, 'description' => 'Steam processed shrimp and chicken meat wrapped in dumpling skin.', 'photo' => 'ShumaySteam.png'],
            ['name' => 'Shumay Furai', 'type_id' => 7, 'price' => 16000, 'original_price' => 16000, 'description' => 'Deep fried processed shrimp and chicken meat wrapped in dumpling skin.', 'photo' => 'ShumayFurai.png'],
            ['name' => 'Chicken Gyoza', 'type_id' => 7, 'price' => 20000, 'original_price' => 20000, 'description' => 'New snack menu from HokBen made from ground chicken meat wrapped in wonton skin, 3 pcs', 'photo' => 'ChickenGyoza.png'],
            ['name' => 'Japanese Burrito', 'type_id' => 7, 'price' => 19000, 'original_price' => 19000, 'description' => 'The snack is a tortilla wrapped in egg, sausage, mozzarella cheese and soft mentai sauce', 'photo' => 'JapaneseBurrito.png'],
        ]);

        DB::table('users')->insert(['name' => 'admin', 'email' => 'admin@email.com', 'password' => Hash::make('admin123'), 'role' => 'admin']);
        DB::table('users')->insert(['name' => 'employee1', 'email' => 'employee1@email.com', 'password' => Hash::make('employee'), 'role' => 'employee']);
        DB::table('users')->insert(['name' => 'employee2', 'email' => 'employee2@email.com', 'password' => Hash::make('employee'), 'role' => 'employee']);
        DB::table('users')->insert(['name' => 'employee3', 'email' => 'employee3@email.com', 'password' => Hash::make('employee'), 'role' => 'employee']);
        DB::table('users')->insert(['name' => 'employee4', 'email' => 'employee4@email.com', 'password' => Hash::make('employee'), 'role' => 'employee']);
        DB::table('users')->insert(['name' => 'lana', 'email' => 'lana@email.com', 'password' => Hash::make('lanalana'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'dinda', 'email' => 'dinda@email.com', 'password' => Hash::make('dinda123'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'shelma', 'email' => 'shelma@email.com', 'password' => Hash::make('shelmeee'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'jely', 'email' => 'jely@email.com', 'password' => Hash::make('jelyjely'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'amel', 'email' => 'amel@email.com', 'password' => Hash::make('amelamel'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'dipat', 'email' => 'dipat@email.com', 'password' => Hash::make('dipat123'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'mira', 'email' => 'mira@email.com', 'password' => Hash::make('miramira'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'naila', 'email' => 'naila@email.com', 'password' => Hash::make('naila123'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'pelangi', 'email' => 'pelangi@email.com', 'password' => Hash::make('pelangii'), 'role' => 'user']);
        DB::table('users')->insert(['name' => 'salbis', 'email' => 'salbis@email.com', 'password' => Hash::make('salbisss'), 'role' => 'user']);

        Review::factory(30)->create();
        Order::factory(10)->has(OrderMenu::factory(6))->create();

        $ordermenus = OrderMenu::all();
        foreach ($ordermenus as $ordermenu) {
            $duplicates = OrderMenu::where('id', '!=', $ordermenu->id)
                ->where('order_id', $ordermenu->order_id)
                ->where('menu_id', $ordermenu->menu_id)
                ->get();

            $ordermenu->update(['quantity' => $ordermenu->quantity * ($duplicates->count() + 1)]);
            foreach($duplicates as $duplicate){
                $duplicate->delete();
            }
        }

        $orders = Order::all();
        foreach ($orders as $order) {
            $totalprice = 0;
            $ordermenus = OrderMenu::where('order_id', $order->id)->get();
            foreach ($ordermenus as $ordermenu) {
                $totalprice = $totalprice + $ordermenu->order_price * $ordermenu->quantity;
            }
            $order->update(['total_price' => $totalprice]);
        }

        DB::table('promos')->insert([
            ['name' => 'Ramen Month!', 'discount' => 20, 'start_day' => '2024-10-01', 'end_day' => '2024-10-31', 'start_time' => '00:00:01', 'end_time' => '23:59:59', 'is_active' => 1]
        ]);

        DB::table('promo_menu')->insert([
            ['promo_id' => 1, 'menu_id' => 1],
            ['promo_id' => 1, 'menu_id' => 2],
            ['promo_id' => 1, 'menu_id' => 3],
            ['promo_id' => 1, 'menu_id' => 4],
            ['promo_id' => 1, 'menu_id' => 5],
        ]);

        DB::table('outlets')->insert([
            ['name' => 'HOKBEN GAMBIR', 'address' => 'Pintu Selatan Lt. 1, Jl. Medan Merdeka Tim No. 1, RT5/RW2, Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta', 'open_hour' => '07:00', 'close_hour' => '21:00'],
            ['name' => 'HOKBEN GRAND INDONESIA', 'address' => 'Jl. M.H. Thamrin No. 1, RT1/RW5, Kb. Melati, Kec. Menteng, Kota Jakarta Pusat', 'open_hour' => '09:00', 'close_hour' => '19:30'],
            ['name' => 'HOKBEN ATRIUM PLAZA', 'address' => 'Plaza Segitiga Atrium Lt. 1 Unit 10-15 Jl. Senen Raya Blok. A No. 135 RW 2 Senen, Kota Jakarta Pusat, DKI Jakarta.', 'open_hour' => '10:00', 'close_hour' => '21:30'],
            ['name' => 'HOKBEN GAJAH MADA PLAZA', 'address' => 'Gajahmada Plaza lantai 1 no 23 NO. 19-26, JAKARTA-INDONESIA 10130', 'open_hour' => '08:00', 'close_hour' => '21:00'],
            ['name' => 'HOKBEN ITC ROXY MAS', 'address' => 'ITC Roxy Mas Lt. 3, Jl. KH. Hasyim Ashari No. 12-15 Cideng, Gambir, Kota Pusat, DKI Jakarta', 'open_hour' => '10:00', 'close_hour' => '20:00'],
            ['name' => 'HOKBEN RUKO TOMANG RAYA', 'address' => 'Jl. Tomang Raya No. 32, RT5/Rw1, Jatipulo, Kec.Palmerah, Jakarta Barat 11430', 'open_hour' => '07:00', 'close_hour' => '22:00'],
            ['name' => 'HOKBEN PLAZA SLIPI JAYA JAKARTA', 'address' => 'Jl. Letjen S. Parman St No Kav. 17-18, RT14/RW1, Kemanggisan, Palmerah, JKT City', 'open_hour' => '09:00', 'close_hour' => '21:00'],
            ['name' => 'HOKBEN TAMAN ANGGREK', 'address' => 'Mall Taman Anggrek Lt. 4 No. 411, Jl. Letjen S. Parman Kav 21 RT12/RW1 Tanjung Duren Selatan, Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta', 'open_hour' => '10:00', 'close_hour' => '21:00'],
            ['name' => 'HOKBEN RUKO BENHILL', 'address' => 'Jl. Bendungan Hilir No. 11, RT1/RW4, Bend. Hilir, Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta', 'open_hour' => '07:00', 'close_hour' => '21:00'],
            ['name' => 'HOKBEN CENTRAL PARK', 'address' => 'Central Park Mall Lt. LG Jl. Letjen. S. Parman No. 28 Tanjung Duren Selatan, Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta', 'open_hour' => '10:00', 'close_hour' => '21:00'],
            ['name' => 'HOKBEN SEASON CITY', 'address' => 'Mall Season City Lt. GF 1 Blok C1 No. 8-9 Jl. Kali Anyar IX No. 33 Jemb. Besi, Tambora, Kota Jakarta Barat, DKI Jakarta', 'open_hour' => '10:00', 'close_hour' => '20:00'],
            ['name' => 'HOKBEN CITRALAND', 'address' => 'Citraland Jl. S. Parman Grogol, Lt. 5 RT11/RW1 Tj. Duren Utara, Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta', 'open_hour' => '10:00', 'close_hour' => '20:00'],
        ]);
    }
}

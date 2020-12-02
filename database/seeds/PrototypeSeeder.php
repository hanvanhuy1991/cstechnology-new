<?php

use App\OptionType;
use App\OptionValue;
use App\Prototype;
use Illuminate\Database\Seeder;

class PrototypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colorType = OptionType::create(['presentation' => 'Color']);
        $listColors = [
            ['name' => 'white', 'presentation' => '#FFFFFF'],
            ['name' => 'purple', 'presentation' => '#800080'],
            ['name' => 'red', 'presentation' => '#FF0000'],
            ['name' => 'black', 'presentation' => '#000000'],
            ['name' => 'brown', 'presentation' => '#8B4513'],
            ['name' => 'green', 'presentation' => '#228C22'],
            ['name' => 'grey', 'presentation' => '#808080'],
            ['name' => 'orange', 'presentation' => '#FF8800'],
            ['name' => 'burgundy', 'presentation' => '#A8003B'],
            ['name' => 'beige', 'presentation' => '#E1C699'],
            ['name' => 'mint', 'presentation' => '#AAF0D1'],
            ['name' => 'blue', 'presentation' => '#0000FF'],
            ['name' => 'dark_blue', 'presentation' => '#00008b'],
            ['name' => 'khaki', 'presentation' => '#BDB76B'],
            ['name' => 'yellow', 'presentation' => '#FFFF00'],
            ['name' => 'light_blue', 'presentation' => '#add8e6'],
            ['name' => 'pink', 'presentation' => '#FFA6C9'],
            ['name' => 'lila', 'presentation' => '#cf9de6'],
            ['name' => 'ecru', 'presentation' => '#F4F2D6'],
        ];
        $colorValues = [];
        foreach ($listColors as $color) {
            $colorValues[] = new OptionValue(['name' => $color['name'], 'presentation' => $color['presentation']]);
        }
        $colorType->values()->saveMany($colorValues);

        $sizeType = OptionType::create(['presentation' => 'Size']);
        $listSizes = [
            ['name' => 'xs', 'presentation' => 'XS'],
            ['name' => 's', 'presentation' => 'S'],
            ['name' => 'm', 'presentation' => 'M'],
            ['name' => 'l', 'presentation' => 'L'],
        ];
        $sizeValues = [];
        foreach ($listSizes as $color) {
            $sizeValues[] = new OptionValue(['name' => $color['name'], 'presentation' => $color['presentation']]);
        }
        $sizeType->values()->saveMany($sizeValues);

        $shirt = Prototype::create(['presentation' => 'Shirt']);
        $shirt->optionTypes()->attach([$colorType->id, $sizeType->id]);

        $shose = Prototype::create(['presentation' => 'Shoe']);
        $shose->optionTypes()->attach([$sizeType->id]);

        $bag = Prototype::create(['presentation' => 'Bag']);
        $bag->optionTypes()->attach([$colorType->id]);
    }
}

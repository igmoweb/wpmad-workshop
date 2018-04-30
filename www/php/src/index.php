<?php

require_once './gilded_rose.php';

echo "OMGHAI!<br/>";

$items = array(
    ItemFactory::create('+5 Dexterity Vest', 10, 20),
    ItemFactory::create('Aged Brie', 2, 0),
    ItemFactory::create('Elixir of the Mongoose', 5, 7),
    ItemFactory::create('Sulfuras, Hand of Ragnaros', 0, 80),
    ItemFactory::create('Sulfuras, Hand of Ragnaros', -1, 80),
    ItemFactory::create('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    ItemFactory::create('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    ItemFactory::create('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    ItemFactory::create('Conjured Mana Cake', 3, 6)
);

$app = new GildedRose($items);
$days = 2;

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------<br/>");
    echo("name, sellIn, quality<br/>");
    foreach ($items as $item) {
        echo $item . '<br/>';
    }
    echo '<br/>';
    $app->update_quality();
}

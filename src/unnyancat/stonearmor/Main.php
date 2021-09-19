<?php

namespace unnyancat\stonearmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§7Stone Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2016, 0), new ArmorTypeInfo(10, 500, 0), "stone helmet");
            $helmet->setTexture('stone_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2017, 0), new ArmorTypeInfo(10, 500, 1), "stone chestplate");
            $chestplate->setTexture('stone_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2018, 0), new ArmorTypeInfo(10, 500, 2), "stone leggings");
            $leggings->setTexture('stone_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2019, 0), new ArmorTypeInfo(10, 500, 3), "stone boots");
            $boots->setTexture('stone_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}
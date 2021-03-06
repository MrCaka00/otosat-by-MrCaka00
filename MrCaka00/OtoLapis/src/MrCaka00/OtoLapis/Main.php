<?php

namespace MrCaka00\OtoLapis;

use pocketmine\plugin\PluginBase;

use onebone\economyapi\EconomyAPI;

use pocketmine\event\Listener;

use pocketmine\event\block\BlockBreakEvent;

use pocketmine\item\Item;

class Main extends PluginBase implements Listener

{

		public $otolapis = [];

	

	

	public function onEnable()

	{

		@mkdir($this->getDataFolder());

		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$this->getLogger()->info("Eklenti aktif edildi by MrCaka00!");

		$this->getServer()->getCommandMap()->register("otolapis", new Komut($this));

	}

	

	public function blokKirinca(BlockBreakEvent $e)

	{

		$o = $e->getPlayer();

		$env = $o->getInventory();

		if(isset($this->otolapis[$o->getName()]))

		{

			if($env->contains(Item::get(351,4,64)))

			{

				$env->removeItem(Item::get(351,4,64));

				EconomyAPI::getInstance()->addMoney($o->getName(), 128);

				$o->sendMessage("§8» §e64 §7adet Lapis §e128TL§7'ye satıldı!");

			}

		}

	}

}
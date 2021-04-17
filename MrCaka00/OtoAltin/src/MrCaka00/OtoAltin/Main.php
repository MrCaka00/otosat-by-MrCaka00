<?php

namespace MrCaka00\OtoAltin;

use pocketmine\plugin\PluginBase;

use onebone\economyapi\EconomyAPI;

use pocketmine\event\Listener;

use pocketmine\event\block\BlockBreakEvent;

use pocketmine\item\Item;

class Main extends PluginBase implements Listener

{

		public $otoaltin = [];

	

	

	public function onEnable()

	{

		@mkdir($this->getDataFolder());

		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$this->getLogger()->info("Eklenti aktif edildi by MrCaka00!");

		$this->getServer()->getCommandMap()->register("otoaltin", new Komut($this));

	}

	

	public function blokKirinca(BlockBreakEvent $e)

	{

		$o = $e->getPlayer();

		$env = $o->getInventory();

		if(isset($this->otoaltin[$o->getName()]))

		{

			if($env->contains(Item::get(14,0,64)))

			{

				$env->removeItem(Item::get(14,0,64));

				EconomyAPI::getInstance()->addMoney($o->getName(), 640);

				$o->sendMessage("§8» §e64 §7adet Altin
§e640TL§7'ye satıldı!");

			}

		}

	}

}
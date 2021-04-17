<?php

namespace MrCaka00\OtoZumrutBlok;

use pocketmine\plugin\PluginBase;

use onebone\economyapi\EconomyAPI;

use pocketmine\event\Listener;

use pocketmine\event\block\BlockBreakEvent;

use pocketmine\item\Item;

class Main extends PluginBase implements Listener

{

		public $otozumrutblok = [];

	

	

	public function onEnable()

	{

		@mkdir($this->getDataFolder());

		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$this->getLogger()->info("Eklenti aktif edildi by MrCaka00!");

		$this->getServer()->getCommandMap()->register("otozumrutblok", new Komut($this));

	}

	

	public function blokKirinca(BlockBreakEvent $e)

	{

		$o = $e->getPlayer();

		$env = $o->getInventory();

		if(isset($this->otozumrutblok[$o->getName()]))

		{

			if($env->contains(Item::get(133,0,64)))

			{

				$env->removeItem(Item::get(133,0,64));

				EconomyAPI::getInstance()->addMoney($o->getName(), 3152);

				$o->sendMessage("§8» §e64 §7adet ZumrutBlok
§e3152TL§7'ye satıldı!");

			}

		}

	}

}
<?php

namespace MrCaka00\OtoZumrutBlok;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoZumrutBlok\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otozumrutblok",

		"OtoZumrutBlok aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otozumrutblok[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoZumrutBlok aktif edildi!");

				$this->main->otozumrutblok[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoZumrutBlok devre dışı edildi!");

				unset($this->main->otozumrutblok[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

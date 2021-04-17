<?php

namespace MrCaka00\OtoLapisBlok;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoLapisBlok\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otolapisblok",

		"OtoLapisBlok aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otolapisblok[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoLapisBlok aktif edildi!");

				$this->main->otolapisblok[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoLapisBlok devre dışı edildi!");

				unset($this->main->otolapisblok[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

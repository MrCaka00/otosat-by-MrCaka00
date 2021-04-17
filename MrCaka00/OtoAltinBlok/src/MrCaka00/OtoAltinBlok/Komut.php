<?php

namespace MrCaka00\OtoAltinBlok;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoAltinBlok\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otoaltinblok",

		"OtoAltinBlok aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->OtoAltinBlok[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoAltinBlok aktif edildi!");

				$this->main->otoaltinblok[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoAltinBlok devre dışı edildi!");

				unset($this->main->otoaltinblok[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

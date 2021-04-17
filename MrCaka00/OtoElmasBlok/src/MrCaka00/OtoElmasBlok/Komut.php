<?php

namespace MrCaka00\OtoElmasBlok;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoElmasBlok\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otoelmasblok",

		"OtoElmasBlok aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otoelmasblok[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoElmasBlok aktif edildi!");

				$this->main->otoaltinblok[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoElmasBlok devre dışı edildi!");

				unset($this->main->otoelmasblok[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

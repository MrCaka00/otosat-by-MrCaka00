<?php

namespace MrCaka00\OtoAltin;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoAltin\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otoaltin",

		"OtoAltin aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otoaltin[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoAltin aktif edildi!");

				$this->main->otoaltin[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoAltin devre dışı edildi!");

				unset($this->main->otoaltin[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

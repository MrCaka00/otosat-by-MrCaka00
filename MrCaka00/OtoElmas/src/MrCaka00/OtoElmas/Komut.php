<?php

namespace MrCaka00\OtoElmas;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoElmas\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otoelmas",

		"OtoElmas aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otoelmas[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoElmas aktif edildi!");

				$this->main->otoelmas[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoElmas devre dışı edildi!");

				unset($this->main->otoelmas[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

<?php

namespace MrCaka00\OtoDemir;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoDemir\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otodemir",

		"OtoDemir aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otodemir[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoDemir aktif edildi!");

				$this->main->otodemir[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoDemir devre dışı edildi!");

				unset($this->main->otodemir[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

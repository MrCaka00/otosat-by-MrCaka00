<?php

namespace MrCaka00\OtoKomur;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoKomur\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otokomur",

		"OtoKomur aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otokomur[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoKomur aktif edildi!");

				$this->main->otokomur[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoKomur devre dışı edildi!");

				unset($this->main->otokomur[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

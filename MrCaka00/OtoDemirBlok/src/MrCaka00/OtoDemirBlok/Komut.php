<?php

namespace MrCaka00\OtoDemirBlok;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\Player;

use MrCaka00\OtoDemirBlok\Main;

class Komut extends Command

{

		

	public function __construct(Main $main)

	{

		parent::__construct(

		"otodemirblok",

		"OtoDemirBlok aktif/devre dışı eder."

		);

		$this->main = $main;

	}

	

	public function execute(CommandSender $g, string $label, array $args)

	{

		if($g instanceof Player)

		{

			if(!isset($this->main->otodemirblok[$g->getName()]))

			{

				$g->sendMessage("§8» §7OtoDemirBlok aktif edildi!");

				$this->main->otodemirblok[$g->getName()] = [];

			}else

			{

				$g->sendMessage("§8» §7OtoDemirBlok devre dışı edildi!");

				unset($this->main->otodemirblok[$g->getName()]);

			}

		}else

		{

			$g->sendMessage("§8» §cBu komutu oyun içinde kullanabilirsin.");

		}

		return true;

	}

}

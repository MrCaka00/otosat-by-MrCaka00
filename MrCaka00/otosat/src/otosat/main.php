<?php

namespace otosat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class main extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("§aEklenti Aktif Edildi!");
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		$player = $sender->getPlayer();
		switch($command->getName()){
			case "otosat":
			$this->menuForm($player);
		}
		return true;
	}
	
	public function menuForm($player){
		if($player instanceof Player){
			$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
			$form = $api->createSimpleForm(function (Player $sender, array $data){
				if(isset($data[0])){
					switch($data[0]){
						case 0:
						$this->getServer()->getCommandMap()->dispatch($sender, "otolapis");
						break;
				  	case 1:
						$this->getServer()->getCommandMap()->dispatch($sender, "otokomur");
						break;
           case 2:
						$this->getServer()->getCommandMap()->dispatch($sender, "otodemir");
						break;
						case 3:
						$this->getServer()->getCommandMap()->dispatch($sender, "otoaltin");
						break;
						case 4:
						$this->getServer()->getCommandMap()->dispatch($sender, "otoelmas");
						break;
						case 5:
						$this->getServer()->getCommandMap()->dispatch($sender, "otolapisblok");
						break;
					case 6:
								$this->getServer()->getCommandMap()->dispatch($sender, "otokomurblok");
						break;
				  	case 7:
						$this->getServer()->getCommandMap()->dispatch($sender, "otodemirblok");
						break;
			   		case 8:
						$this->getServer()->getCommandMap()->dispatch($sender, "otoaltinblok");
						break;
					 case 9:
						$this->getServer()->getCommandMap()->dispatch($sender, "otoelmasblok");
						break;
					case 11:
					}
					
				}
			});
			$form->setTitle("§8> §eCaka§fBey§8<");
			$form->setContent("§8» §cİsinlanma Menüsüne Hoşgeldin");
		$form->addButton("§bLapis");
		$form->addButton("§bKömür");
		$form->addButton("§bDemir");
			$form->addButton("§bAltın");
			$form->addButton("§bElmas");
    $form->addButton("§bLapisBlok");
     $form->addButton("§bKömürBlok");
			$form->addButton("§bDemirBlok");
		$form->addButton("§bAltınBlok");
			$form->addButton("§bElmasBlok");
			$form->addButton("§8Tamam");
			$form->sendToPlayer($player);			
		}else{
			$sender->sendMessage("§cBu Komutu Lütfen Oyundayken Kullanınız!");
			return true;
		}
	}
}
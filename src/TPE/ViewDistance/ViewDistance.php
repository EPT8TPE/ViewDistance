<?php

declare(strict_types=1);

namespace TPE\ViewDistance;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class ViewDistance extends PluginBase {

    public function onEnable() {
        $this->saveDefaultConfig();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if(!$sender instanceof Player) {
            return true;
        }
        if(!is_numeric($args[0])) {
            $sender->sendMessage($this->getConfig()->get("not_numeric"));
            return true;
        }
        if(!$sender->hasPermission("view.command")) {
            $sender->sendMessage($this->getConfig()->get("no_perms_message"));
        }
        if($command->getName() === "view") {
            if(isset($args[0])) {
                $distance = $sender->getViewDistance();
                $sender->setViewDistance($args[0]);
                $config = str_replace("%distance%", $distance, $this->getConfig()->get("view_change_success"));
                $sender->sendMessage($this->getConfig()->get("view_change_success"));
            }
        }
        return false;
    }

}

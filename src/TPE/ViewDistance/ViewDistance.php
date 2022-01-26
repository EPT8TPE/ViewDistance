<?php

declare(strict_types=1);

namespace TPE\ViewDistance;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class ViewDistance extends PluginBase {

    public function onEnable() : void {
        $this->saveDefaultConfig();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
            if($command->getName() === "view") {
                if($sender->hasPermission("view.command")) {
                    if(isset($args[0])) {
                            if(is_numeric((string)$args[0])) {
                                if($sender instanceof Player) {
                                    $sender->setViewDistance((int)$args[0]);
                                    $distance = $sender->getViewDistance();
                                    $config = str_replace("%distance%", $distance, $this->getConfig()->get("view_change_success", "§aSuccessfully changed view distance to §9%distance%§a!"));
                                    $sender->sendMessage($config);
                                } else {
                                    $sender->sendMessage("You can not run this command via console!");
                                }
                            } else {
                                $sender->sendMessage($this->getConfig()->get("not_numeric"));
                            }
                    }
                } else {
                    $sender->sendMessage($this->getConfig()->get("no_perms_message"));
                }
            }
            return false;
    }
}

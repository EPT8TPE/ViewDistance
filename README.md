# ViewDistance
A simple pocketmine plugin that allows players to change their view distance with a command

# Features
- /view {number}(A number between 1-10)
[COMING SOON] /view {player} {number}

# How to install
1. Download the phar from poggit.
2. Upload to your servers plugin directory.
3. Restart your server.

# Config
~ Message sent to player if the value they provide isn't a number.
not_numeric: "§cYou must provide a numeric value!"

~ Message sent to player when view distance is changed, used %distance% for the players distance.
view_change_succcess: "§aSuccessfully changed view distance to §9%distance%§a!"

~ Message sent to player when they lack perms to change view distance.
no_perms_message: "§cYou do not have permission to use this command!"

# Permissions

view.command:
    default: true
~ Allows players to use /view to alter their view distance

# Contact me
If you have any suggestions or find any bugs, message me on discord TPE#1061

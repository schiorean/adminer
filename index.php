<?php
ini_set('display_errors', 1);

function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    
    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    
    $plugins = array(
        // specify enabled plugins here
        new FasterTablesFilter,
        new AdminerRemoteColor,
        new OneClickLogin(require(dirname(__FILE__) . '/plugins/oneclick-login.config.php')),
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    $plugin = new AdminerPlugin($plugins);
    $plugin->plugins['AdminerPrettyJsonColumn'] = new AdminerPrettyJsonColumn($plugin);
    return $plugin;
}

// include original Adminer or Adminer Editor
include "./adminer-4.7.4.php";
?>
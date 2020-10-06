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
        new AminerJQuery,
        new FasterTablesFilter,
        new AdminerRemoteColor,
		new AdminerSqlLog,
        new AdminerShortcuts,
/*        new OneClickLogin(
            [
                'localhost' => [
                ]
            ]
        ),
*/

    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    $plugin = new AdminerPlugin($plugins);
    return $plugin;
}

// include original Adminer or Adminer Editor
include "./adminer.php";
<?php

namespace Codexshaper\WooCommerce\PHP;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Install
{
    public static function postUpdate(Event $event)
    {
        $composer = $event->getComposer();
        // do stuff
    }

    public static function postAutoloadDump(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';

        mkdir($vendorDir.'/basir', 0700);
        mkdir($vendorDir.'/../test', 0700);

        // some_function_from_an_autoloaded_file();
    }

    public static function postPackageInstall(PackageEvent $event)
    {
        $installedPackage = $event->getOperation()->getPackage();
        // do stuff

        var_dump($installedPackage);
    }

    public static function warmCache(Event $event)
    {
        // make cache toasty
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        mkdir($vendorDir.'/basir', 0700);
        mkdir($vendorDir.'/../test', 0700);

        $content = "some text here";
        $fp = fopen("myText.txt","wb");
        fwrite($fp,$content);
        fclose($fp);
    }
}

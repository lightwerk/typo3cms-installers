<?php
namespace Lw\TYPO3CMSInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class TYPO3CMSInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new TYPO3CMSInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
?>
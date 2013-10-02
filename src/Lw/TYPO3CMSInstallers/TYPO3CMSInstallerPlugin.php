<?php
namespace Lw\TYPO3CMSInstallers;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Registers the Extension and Core Installer
 *
 * @author Felix Oertel <fo@lightwerk.com>
 */
class TYPO3CMSInstallerPlugin implements PluginInterface
{

	public function activate(Composer $composer, IOInterface $io)
	{
		$extensionInstaller = new TYPO3CMSExtensionInstaller($io, $composer);
		$coreInstaller = new TYPO3CMSCoreInstaller($io, $composer);

		$composer->getInstallationManager()->addInstaller($extensionInstaller);
		$composer->getInstallationManager()->addInstaller($coreInstaller);
	}
}
?>
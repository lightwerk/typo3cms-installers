<?php
namespace Lw\TYPO3CMSInstallers;

use Composer\Composer;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\IO\IOInterface;
use Composer\Util\Filesystem;
use Dkd\Downloader\T3xDownloader;


/**
 * Installer for TYPO3 CMS
 *
 * @author Felix Oertel <fo@lightwerk.com>
 */
class TYPO3CMSExtensionInstaller extends LibraryInstaller {

	public function __construct(IOInterface $io, Composer $composer, $type = 'library', Filesystem $filesystem = null) {
		parent::__construct($io, $composer, $type, $filesystem);

		$composer->getDownloadManager()->setDownloader('t3x', new T3xDownloader($io, $composer->getConfig()));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPackageBasePath(PackageInterface $package) {
		$extensionName = explode('/', $package->getName());
		return 'typo3conf/ext/' . array_pop($extensionName);
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType) {
		return ('typo3cms-extension' === $packageType);
	}
}
?>
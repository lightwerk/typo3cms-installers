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

	const DEFAULT_INSTALL_EXTENSION_PATH = 'typo3conf/ext/';

	public function __construct(IOInterface $io, Composer $composer, $type = 'library', Filesystem $filesystem = null) {
		parent::__construct($io, $composer, $type, $filesystem);

		$composer->getDownloadManager()->setDownloader('t3x', new T3xDownloader($io, $composer->getConfig()));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPackageBasePath(PackageInterface $package) {
		$extensionName = explode('/', $package->getName());
		return $this->getInstallationPath() . array_pop($extensionName);
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType) {
		return ('typo3cms-extension' === $packageType);
	}

	/**
	 * Get the installation path from composer.json "extra" section
	 * or the default path 'typo3conf/ext/'
	 *
	 * @return string
	 */
	protected function getInstallationPath() {
		$extra = $this->composer->getPackage()->getExtra();

		return isset($extra['typo3-cms-extension-installer-path']) ?
			$extra['typo3-cms-extension-installer-path'] : self::DEFAULT_INSTALL_EXTENSION_PATH;
	}
}
?>
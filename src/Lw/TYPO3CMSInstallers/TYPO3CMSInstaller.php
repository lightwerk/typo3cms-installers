<?php
namespace Lw\TYPO3CMSInstallers;

use Composer\Composer;
use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Composer\IO\IOInterface;
use Composer\Util\Filesystem;
use Dkd\T3xDownloader;


/**
 * Installer for TYPO3 CMS
 *
 * @author Felix Oertel <fo@lightwerk.com>
 */
class TYPO3CmsInstaller extends LibraryInstaller {

	/**
	 * Initializes base installer.
	 *
	 * @param \Composer\Package\PackageInterface $package
	 * @param \Composer\Composer $composer
	 */
	public function __construct(IOInterface $io, Composer $composer, $type = 'library', Filesystem $filesystem = null) {
		parent::__construct($io, $composer, $type, $filesystem);

		$composer->getDownloadManager()->setDownloader('t3x', new T3xDownloader($io, $composer->getConfig()));
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPackageBasePath(PackageInterface $package) {
		var_dump($package->getPrettyName());
		die();
		return 'typo3conf/ext/';
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType) {
		return ('typo3cms-extension' === $packageType);
	}

}
?>
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
class TYPO3CMSCoreInstaller extends LibraryInstaller {

	/**
	 * {@inheritDoc}
	 */
	public function getPackageBasePath(PackageInterface $package) {
		return 'typo3_src';
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType) {
		return ('typo3cms-core' === $packageType);
	}
}
?>
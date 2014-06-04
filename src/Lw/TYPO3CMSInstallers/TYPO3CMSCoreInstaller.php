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

	const DEFAULT_INSTALL_CORE_PATH = 'typo3_src';

	/**
	 * {@inheritDoc}
	 */
	public function getPackageBasePath(PackageInterface $package) {
		return $this->getInstallationPath();
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType) {
		return ('typo3cms-core' === $packageType);
	}

	/**
	 * Get the installation path from composer.json "extra" section
	 * or the default path 'typo3conf/ext/'
	 *
	 * @return string
	 */
	protected function getInstallationPath() {
		$extra = $this->composer->getPackage()->getExtra();

		return isset($extra['typo3-cms-core-installer-path']) ?
			$extra['typo3-cms-core-installer-path'] : self::DEFAULT_INSTALL_CORE_PATH;
	}
}
?>

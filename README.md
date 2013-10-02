# A TYPO3 CMS [Composer](http://getcomposer.org) Installer

This is for TYPO3 extension authors to require in their `composer.json`. It will
install their extension to typo3conf/ext.

**Current Supported Package Types**:

* Extension		`typo3cms-extension-`
* Core    		`typo3cms-core-`

## Example `composer.json` File

Add Lightwerks Composer Repository to your `composer.json` and set `"type": "typo3cms-extension"`, which describes what your extension is. `"require": { "lw/typo3-installers": "*" }` tells composer to load the custom installers.

``` json
{
    "repositories": [
        {
            "type": "composer",
            "url": "http://composer.lightwerk.com"
        }
    ],
    "name": "foo/bar_stuff",
    "type": "typo3cms-extension",
    "require": {
        "lw/typo3-installers": "*"
    }
}
```

This would install your extension to `typo3conf/ext/bar_stuff` folder of a TYPO3 instance when a user runs `php composer.phar install`.

So submit your packages to [TER](http://typo3.org/extensions/repository/)!

## Contribute!

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Create a branch, commit, push and send us a
  [pull request](https://help.github.com/articles/using-pull-requests).
  
## Credits

This work is based heavily on the composer/installers [modification by d.k.d.](https://github.com/dkd/installers)
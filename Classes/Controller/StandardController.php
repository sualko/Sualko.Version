<?php
namespace Sualko\Version\Controller;

/*
 * This file is part of the Sualko.Version package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Package\PackageManagerInterface;

class StandardController extends ActionController
{
    /**
     * @Flow\Inject
     * @var PackageManagerInterface
     */
    protected $packageManager;

    /**
     * @var string
     */
    protected $defaultViewObjectName = \Neos\Flow\Mvc\View\JsonView::class;

    /**
     * @return void
     */
    public function indexAction()
    {
        $packageNames = ['Neos.Neos', 'Neos.Flow'];
        $versions = [];

        foreach ($packageNames as $name) {
            $package = $this->packageManager->getPackage($name);

            $versions[$package->getPackageKey()] = $package->getInstalledVersion();
        }

        $this->controllerContext->getResponse()->setHeader('Access-Control-Allow-Origin', '*');
        $this->controllerContext->getResponse()->setHeader('Access-Control-Allow-Methods', 'GET, OPTIONS');

        $this->view->assign('value', $versions);
    }
}

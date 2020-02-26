<?php

namespace App;

use Ergonode\Core\Application\AbstractModule;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

/**
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    private const CONFIG_EXTS = '.{php,xml,yaml,yml}';

    /**
     * @return string
     */
    public function getCacheDir(): string
    {
        return $this->getProjectDir().'/var/cache/'.$this->environment;
    }

    /**
     * @return string
     */
    public function getLogDir(): string
    {
        return $this->getProjectDir().'/var/log';
    }

    /**
     * @return iterable
     */
    public function registerBundles(): iterable
    {
        $contents = require $this->getProjectDir().'/config/bundles.php';
        foreach ($contents as $class => $envs) {
            if ($envs[$this->environment] ?? $envs['all'] ?? false) {
                yield new $class();
            }
        }
    }

    public function getProjectDir(): string
    {
        return \dirname(__DIR__);
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader): void
    {
        //$container->addResource(new FileResource($this->getProjectDir().'/config/bundles.php'));
        //        // Feel free to remove the "container.autowiring.strict_mode" parameter
        //        // if you are using symfony/dependency-injection 4.0+ as it's the default behavior
        //        $container->setParameter('container.autowiring.strict_mode', true);
        //        $container->setParameter('container.dumper.inline_class_loader', true);
        //        $confDir = $this->getProjectDir().'/config';
        //
        //        $loader->load($confDir.'/{packages}/*'.self::CONFIG_EXTS, 'glob');
        //        $loader->load($confDir.'/{packages}/'.$this->environment.'/**/*'.self::CONFIG_EXTS, 'glob');
        //        $loader->load($confDir.'/{services}'.self::CONFIG_EXTS, 'glob');
        //        $loader->load($confDir.'/{services}_'.$this->environment.self::CONFIG_EXTS, 'glob');

        $container->addResource(new FileResource($this->getProjectDir().'/config/bundles.php'));
        $container->setParameter('container.dumper.inline_class_loader', \PHP_VERSION_ID < 70400 || $this->debug);
        $container->setParameter('container.dumper.inline_factories', true);
        $confDir = $this->getProjectDir().'/config';

        $loader->load($confDir.'/{packages}/*'.self::CONFIG_EXTS, 'glob');
        $loader->load($confDir.'/{packages}/'.$this->environment.'/*'.self::CONFIG_EXTS, 'glob');
        $loader->load($confDir.'/{services}'.self::CONFIG_EXTS, 'glob');
        $loader->load($confDir.'/{services}_'.$this->environment.self::CONFIG_EXTS, 'glob');
    }

    /**
     * @param RouteCollectionBuilder $routes
     *
     * @throws \Symfony\Component\Config\Exception\LoaderLoadException
     */
    protected function configureRoutes(RouteCollectionBuilder $routes): void
    {
        $confDir = $this->getProjectDir().'/config';

        foreach ($this->getBundles() as $bundle) {
            if ($bundle instanceof AbstractModule) {
                if (file_exists($bundle->getPath().'/Application/Resources/config/')) {

                    $routes->import(
                        $bundle->getPath().'/Application/Resources/config/{routes}'.self::CONFIG_EXTS,
                        '/',
                        'glob'
                    );
                }

                if (file_exists($bundle->getPath().'/Resources/config/')) {

                    $routes->import(
                        $bundle->getPath().'/Resources/config/{routes}'.self::CONFIG_EXTS,
                        '/',
                        'glob'
                    );
                }
            }
        }

        $routes->import($confDir.'/{routes}/'.$this->environment.'/*'.self::CONFIG_EXTS, '/', 'glob');
        $routes->import($confDir.'/{routes}/*'.self::CONFIG_EXTS, '/', 'glob');
        $routes->import($confDir.'/{routes}'.self::CONFIG_EXTS, '/', 'glob');
    }
}

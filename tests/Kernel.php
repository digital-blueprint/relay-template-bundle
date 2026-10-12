<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Tests;

use Dbp\Relay\CoreBundle\TestUtils\CoreTestKernelTrait;
use Dbp\Relay\TemplateBundle\DbpRelayTemplateBundle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use CoreTestKernelTrait;

    protected function registerAdditionalBundles(): iterable
    {
        yield new DbpRelayTemplateBundle();
    }

    protected function configureAdditionalContainer(ContainerConfigurator $container): void
    {
        $container->extension('dbp_relay_template', []);
    }
}

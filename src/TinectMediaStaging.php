<?php declare(strict_types=1);

namespace Tinect\MediaStaging;

use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TinectMediaStaging extends Plugin
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        if (!$container->hasParameter('shopware.filesystem.public.url')) {
            $defaultUrl = getenv('APP_URL');
            $container->setParameter('shopware.filesystem.public.url', rtrim($defaultUrl, '/') . '/mediaproxy/');
        }
    }
}

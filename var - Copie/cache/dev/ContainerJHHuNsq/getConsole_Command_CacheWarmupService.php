<?php

namespace ContainerJHHuNsq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_CacheWarmupService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.cache_warmup' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CacheWarmupCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'CacheWarmupCommand.php';

        $container->privates['console.command.cache_warmup'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CacheWarmupCommand(($container->services['cache_warmer'] ?? $container->load('getCacheWarmerService')));

        $instance->setName('cache:warmup');
        $instance->setDescription('Warm up an empty cache');

        return $instance;
    }
}

<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerRMxaGsx\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerRMxaGsx/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerRMxaGsx.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerRMxaGsx\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerRMxaGsx\App_KernelDevDebugContainer([
    'container.build_hash' => 'RMxaGsx',
    'container.build_id' => '6c8f9793',
    'container.build_time' => 1676295992,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerRMxaGsx');

<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerKVEyLo3\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerKVEyLo3/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerKVEyLo3.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerKVEyLo3\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerKVEyLo3\App_KernelDevDebugContainer([
    'container.build_hash' => 'KVEyLo3',
    'container.build_id' => 'e4c95975',
    'container.build_time' => 1675869113,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerKVEyLo3');

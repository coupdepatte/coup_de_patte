<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerP3fIAse\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerP3fIAse/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerP3fIAse.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerP3fIAse\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerP3fIAse\App_KernelDevDebugContainer([
    'container.build_hash' => 'P3fIAse',
    'container.build_id' => '9450ce22',
    'container.build_time' => 1676971812,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerP3fIAse');

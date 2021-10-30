<?php

declare(strict_types=1);

namespace CadastrosTest\Controller;

use Cadastros\Controller\CorretorController;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp(): void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed(): void
    {
        $this->dispatch('/cadastros/corretor', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('cadastros');
        $this->assertControllerName(CorretorController::class); // as specified in router's controller name alias
        $this->assertControllerClass('CorretorController');
        $this->assertMatchedRouteName('cadastros');
    }
}
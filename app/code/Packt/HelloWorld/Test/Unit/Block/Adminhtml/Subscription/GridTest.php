<?php
namespace Packt\HelloWorld\Test\Unit\Block\Adminhtml\Subscription;

use \PHPUnit\Framework\TestCase;
use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Http;

class GridTest extends TestCase {

    protected $block;

    protected function setUp(): void {
        Bootstrap::create(BP, $_SERVER)->createApplication(Http::class);
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->block = $objectManager->getObject('Packt\HelloWorld\Block\Adminhtml\Subscription\Grid');
    }

    protected function tearDown(): void {
        $this->block = null;
    }

    public function testDecorateStatus() {
        $this->assertStringContainsString('grid-severity-minor', $this->block->decorateStatus('pending'));
        $this->assertStringContainsString('grid-severity-notice', $this->block->decorateStatus('approved'));
        $this->assertStringContainsString('grid-severity-critical', $this->block->decorateStatus(6));
        $this->assertStringContainsString('grid-severity-critical', $this->block->decorateStatus(null));
    }
}

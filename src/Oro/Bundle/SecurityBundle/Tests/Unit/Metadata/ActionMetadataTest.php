<?php

namespace Oro\Bundle\SecurityBundle\Tests\Unit\Metadata;

use Oro\Bundle\SecurityBundle\Metadata\ActionMetadata;

class ActionMetadataTest extends \PHPUnit_Framework_TestCase
{
    /** @var ActionMetadata */
    protected $metadata;

    protected function setUp()
    {
        $this->metadata = new ActionMetadata(
            'SomeName',
            'SomeGroup',
            'SomeLabel',
            'SomeDescription',
            'SomeCategory'
        );
    }

    public function testGetters()
    {
        $this->assertEquals('SomeName', $this->metadata->getClassName());
        $this->assertEquals('SomeGroup', $this->metadata->getGroup());
        $this->assertEquals('SomeLabel', $this->metadata->getLabel());
        $this->assertEquals('SomeDescription', $this->metadata->getDescription());
        $this->assertEquals('SomeCategory', $this->metadata->getCategory());
    }

    public function testSerialize()
    {
        $data = serialize($this->metadata);
        $emptyMetadata = unserialize($data);
        $this->assertEquals('SomeName', $emptyMetadata->getClassName());
        $this->assertEquals('SomeGroup', $emptyMetadata->getGroup());
        $this->assertEquals('SomeLabel', $this->metadata->getLabel());
        $this->assertEquals('SomeDescription', $this->metadata->getDescription());
        $this->assertEquals('SomeCategory', $this->metadata->getCategory());
    }
}

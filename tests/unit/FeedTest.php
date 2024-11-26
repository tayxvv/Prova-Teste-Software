<?php
use PHPUnit\Framework\TestCase;
define('_JEXEC', 1);
use Joomla\CMS\Feed\Feed;
use ReflectionClass;
class FeedTest extends TestCase
{
    public function testAddCategory()
    {
        $feed = new Feed();

        $feed->addCategory('Categoria', 'Teste');
        $reflectionClass = new ReflectionClass(Feed::class);
        $property = $reflectionClass->getProperty('properties');
        $property->setAccessible(true);
        $properties = $property->getValue($feed);
        $categories = $properties['categories'];

        $this->assertArrayHasKey('Categoria', $categories);
    }
}
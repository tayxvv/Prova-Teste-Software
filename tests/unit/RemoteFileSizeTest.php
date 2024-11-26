<?php
use PHPUnit\Framework\TestCase;
use Joomla\CMS\Filesystem\FilesystemHelper;
define('_JEXEC', 1);
class RemoteFileSizeTest extends TestCase
{
    protected $classFile;

    protected function setUp(): void
    {
        $this->classFile = new FilesystemHelper();
    }

    public function testValidHttpUrl()
    {
        $url = 'https://example.com/file.txt';
        $size = $this->classFile->remotefsize($url);
        $this->assertGreaterThan(0, $size);
    }

    public function testInvalidUrl()
    {
        $url = 'invalid_url';
        $size = $this->classFile->remotefsize($url);
        $this->assertFalse($size);
    }

    public function testInvalidFtpUrl()
    {
        $url = 'ftp://invalid_host/file.txt';
        $size = $this->classFile->remotefsize($url);
        $this->assertFalse($size);
    }
}
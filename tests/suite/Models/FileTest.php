<?php
/**
 * CsvImportPlus_FileTest class
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 * @package CsvImportPlus
 */

require_once 'models/CsvImportPlus/File.php';

class CsvImportPlus_FileTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->validFilePath = CSV_IMPORT_PLUS_BASE . '/tests/_files/test.csv';
        $this->invalidFilePath = dirname(__FILE__) . '/foo/bar.csv';
    }

    public function testConstruct()
    {
        $file = new CsvImportPlus_File($this->invalidFilePath);
        $this->assertInstanceOf('CsvImportPlus_File', $file);
    }

    public function testGetFilename()
    {
        $filename = '/foo/bar.csv';
        $file = new CsvImportPlus_File($filename);
        $this->assertEquals($filename, $file->getFilePath());
    }
}

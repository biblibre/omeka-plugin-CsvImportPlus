<?php
/**
 * CsvImportPlus_ColumnMap_PublicTest class
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 * @package CsvImportPlus
 */
class CsvImportPlus_ColumnMap_PublicTest extends CsvImportPlus_Test_AppTestCase
{
    public function testConstruct()
    {
        $columnName = 'featured';
        $map = new CsvImportPlus_ColumnMap_Public($columnName);
        $this->assertInstanceOf('CsvImportPlus_ColumnMap_Public', $map);
        $this->assertEquals(CsvImportPlus_ColumnMap::TYPE_PUBLIC, $map->getType());
    }

    public function testMapTrueValues()
    {
        $columnName = 'featured';
        $valueStrings = array('1', true, 'true', 'True', 'TRUE', 'yes', 'Yes', 'YES');
        $afterValue = 1;
        
        $map = new CsvImportPlus_ColumnMap_Public($columnName);
        $this->assertInstanceOf('CsvImportPlus_ColumnMap_Public', $map);
        
        foreach($valueStrings as $valueString) {
            $row = array($columnName => $valueString);
            $this->assertEquals($afterValue, $map->map($row, array()));
        }
    }
    
    public function testMapFalseValues()
    {
        $columnName = 'featured';
        $valueStrings = array('0', false, 'false', 'False', 'FALSE', 'no', 'No', 'NO');
        $afterValue = 0;
        
        $map = new CsvImportPlus_ColumnMap_Public($columnName);
        $this->assertInstanceOf('CsvImportPlus_ColumnMap_Public', $map);
        
        foreach($valueStrings as $valueString) {
            $row = array($columnName => $valueString);
            $this->assertEquals($afterValue, $map->map($row, array()));
        }
    }
}
<?php
/**
 * CsvImportPlus_IndexControllerTest - represents the Csv Import index controller test.
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 * @package CsvImport
 */
 
class CsvImportPlus_IndexControllerTest extends CsvImportPlus_Test_AppTestCase
{    
    public static function acl()
    {
        return array(
            array(true, 'super', 'CsvImportPlus_Index', 'index'),
            array(false, 'admin', 'CsvImportPlus_Index', 'index'),
        );
    }

    /**
     * @dataProvider acl
     */
    public function testAcl($isAllowed, $role, $resource, $privilege)
    {
        $this->assertEquals($isAllowed, $this->acl->isAllowed($role, 
            $resource, $privilege));
    }
}

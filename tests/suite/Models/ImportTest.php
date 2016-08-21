<?php
/**
 * CsvImportPlus_ImportTest class
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 * @package CsvImportPlus
 */

require_once 'models/CsvImportPlus/Import.php';

class CsvImportPlus_ImportTest extends CsvImportPlus_Test_AppTestCase
{
    protected $_import;

    public function setUp()
    {
        parent::setUp();
        $this->_import = new CsvImportPlus_Import();
    }

    public function testConstruct()
    {
        $this->assertFalse($this->_import->isCompleted());
        $this->assertFalse($this->_import->isUndone());
        $this->assertFalse($this->_import->isStopped());
        $this->assertFalse($this->_import->isQueued());
        $this->assertFalse($this->_import->isQueuedUndo());
        $this->assertFalse($this->_import->isError());
        $this->assertFalse($this->_import->isImportError());
        $this->assertFalse($this->_import->isUndoImportError());
        $this->assertFalse($this->_import->isOtherError());
    }

    public function testIsError()
    {
       $this->_import->setStatus(CsvImportPlus_Import::STATUS_IMPORT_ERROR);
       $this->assertTrue($this->_import->isError());

       $this->_import->setStatus(CsvImportPlus_Import::STATUS_UNDO_IMPORT_ERROR);
       $this->assertTrue($this->_import->isError());

       $this->_import->setStatus(CsvImportPlus_Import::STATUS_OTHER_ERROR);
       $this->assertTrue($this->_import->isError());

       $this->_import->setStatus('error');
       $this->assertFalse($this->_import->isError());

       $falseStatusList = $this->_getStatusListExcept(array(CsvImportPlus_Import::STATUS_IMPORT_ERROR,
                                                            CsvImportPlus_Import::STATUS_UNDO_IMPORT_ERROR,
                                                            CsvImportPlus_Import::STATUS_OTHER_ERROR));
       foreach($falseStatusList as $falseStatus) {
           $this->_import->setStatus($falseStatus);
           $this->assertFalse($this->_import->isImportError());
       }
    }

    public function testIsImportError()
    {
       $this->_import->setStatus(CsvImportPlus_Import::STATUS_IMPORT_ERROR);
       $this->assertTrue($this->_import->isImportError());

       $falseStatusList = $this->_getStatusListExcept(array(CsvImportPlus_Import::STATUS_IMPORT_ERROR));
       foreach($falseStatusList as $falseStatus) {
           $this->_import->setStatus($falseStatus);
           $this->assertFalse($this->_import->isImportError());
       }
    }

    public function testIsUndoImportError()
    {
       $this->_import->setStatus(CsvImportPlus_Import::STATUS_UNDO_IMPORT_ERROR);
       $this->assertTrue($this->_import->isUndoImportError());

       $falseStatusList = $this->_getStatusListExcept(array(CsvImportPlus_Import::STATUS_UNDO_IMPORT_ERROR));
       foreach($falseStatusList as $falseStatus) {
           $this->_import->setStatus($falseStatus);
           $this->assertFalse($this->_import->isUndoImportError());
       }
    }

    public function testIsOtherImportError()
    {
       $this->_import->setStatus(CsvImportPlus_Import::STATUS_OTHER_ERROR);
       $this->assertTrue($this->_import->isOtherError());

       $falseStatusList = $this->_getStatusListExcept(array(CsvImportPlus_Import::STATUS_OTHER_ERROR));
       foreach($falseStatusList as $falseStatus) {
           $this->_import->setStatus($falseStatus);
           $this->assertFalse($this->_import->isOtherError());
       }
    }

    protected function _getStatusListExcept(array $statusListA)
    {
        $statusListB = array(CsvImportPlus_Import::STATUS_QUEUED,
                             CsvImportPlus_Import::STATUS_IN_PROGRESS,
                             CsvImportPlus_Import::STATUS_COMPLETED,
                             CsvImportPlus_Import::STATUS_QUEUED_UNDO,
                             CsvImportPlus_Import::STATUS_IN_PROGRESS_UNDO,
                             CsvImportPlus_Import::STATUS_COMPLETED_UNDO,
                             CsvImportPlus_Import::STATUS_IMPORT_ERROR,
                             CsvImportPlus_Import::STATUS_UNDO_IMPORT_ERROR,
                             CsvImportPlus_Import::STATUS_OTHER_ERROR,
                             CsvImportPlus_Import::STATUS_STOPPED,
                             CsvImportPlus_Import::STATUS_PAUSED);

       return array_diff($statusListB, $statusListA);
    }
}

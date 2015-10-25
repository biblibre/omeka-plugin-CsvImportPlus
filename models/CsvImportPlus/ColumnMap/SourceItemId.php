<?php
/**
 * CsvImportPlus_ColumnMap_SourceItemId class
 *
 * @deprecated Since 2.1.1-full.
 *
 * @package CsvImport
 */
class CsvImportPlus_ColumnMap_SourceItemId extends CsvImportPlus_ColumnMap
{
    /**
     * @param string $columnName
     */
    public function __construct($columnName)
    {
        parent::__construct($columnName);
        $this->_type = CsvImportPlus_ColumnMap::TYPE_SOURCE_ITEM_ID;
    }

    /**
     * Map a row to the source item id of a record.
     *
     * @param array $row The row to map
     * @param array $result
     * @return string Source item id of the record.
     */
    public function map($row, $result)
    {
        $result = trim($row[$this->_columnName]);
        return $result;
    }
}

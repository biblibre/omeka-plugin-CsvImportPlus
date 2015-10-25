<?php
/**
 * CsvImportPlus_ColumnMap_RecordIdentifier class
 *
 * @deprecated Since 2.1.1-full.
 *
 * @package CsvImport
 */
class CsvImportPlus_ColumnMap_RecordIdentifier extends CsvImportPlus_ColumnMap
{
    /**
     * @param string $columnName
     */
    public function __construct($columnName)
    {
        parent::__construct($columnName);
        $this->_type = CsvImportPlus_ColumnMap::TYPE_RECORD_IDENTIFIER;
    }

    /**
     * Map a row to the identifier of a record.
     *
     * @param array $row The row to map
     * @param array $result
     * @return string Identifier of the record.
     */
    public function map($row, $result)
    {
        $result = trim($row[$this->_columnName]);
        return $result;
    }
}

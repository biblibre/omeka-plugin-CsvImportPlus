<?php
/**
 * CsvImportPlus_ColumnMap_UpdateIdentifier class
 *
 * @deprecated Since 2.1.1-full.
 *
 * @package CsvImport
 */
class CsvImportPlus_ColumnMap_UpdateIdentifier extends CsvImportPlus_ColumnMap
{
    /**
     * @param string $columnName
     */
    public function __construct($columnName)
    {
        parent::__construct($columnName);
        $this->_type = CsvImportPlus_ColumnMap::TYPE_UPDATE_IDENTIFIER;
    }

    /**
     * Map a row to the update identifier of a record.
     *
     * @param array $row The row to map
     * @param array $result
     * @return string Identifier to select to update a record.
     */
    public function map($row, $result)
    {
        $result = trim($row[$this->_columnName]);
        return $result;
    }
}

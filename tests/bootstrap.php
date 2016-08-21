<?php
/**
 * Csv Import Plus bootstrap
 *
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 * @package CsvImport
 */

define('CSV_IMPORT_PLUS_BASE', realpath(dirname(__FILE__) . '/../'));
set_include_path(get_include_path() . PATH_SEPARATOR . CSV_IMPORT_PLUS_BASE);

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/application/tests/bootstrap.php';
require_once 'CsvImportPlus_Test_AppTestCase.php';

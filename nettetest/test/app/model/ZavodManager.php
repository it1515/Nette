<?php

namespace App\Model;

use Nette;


/**
 * Zavod management.
 */
class ZavodManager
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'startlist',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'jmeno',
		COLUMN_SURENAME = 'prijmeni',
		COLUMN_STATE = 'stat',
                COLUMN_BIRTHDAY = 'narozeni',
		COLUMN_CARRIER = 'kariera',
                COLUMN_PERFORMANCE = 'vykon';


	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
        
        public function readAll($order)
        {
            return $this->database->table(self::TABLE_NAME)
                    ->order($order)
                    ->fetchAll();
        }
        
        public function readOne($id)
        {
                return $this->database->table(self::TABLE_NAME)->get($id);
        }
        
        public function delete($id)
        {
                try {
                  $this->database->table(self::TABLE_NAME)
                        ->where(self::COLUMN_ID, $id)->delete();
                } catch (Exception $e) {
                   throw new Exception();
                }
        }
        
        public function insert($values)
        {
                $this->database->table(self::TABLE_NAME)->insert($values);
        }
        
        public function update($values, $id)
        {
                $row = $this->database->table(self::TABLE_NAME)->get($id);
                $row->update($values);
        }
}
<?php

namespace App\Model;

use Nette;
use Nette\Security\Passwords;


/**
 * Users management.
 */
class KurzyManager
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'kurz',
		COLUMN_ID = 'id_kurzu',
		COLUMN_NAME = 'nazev',
		COLUMN_LESSONS = 'lekci',
                COLUMN_LANGUAGE = 'jazyk',
                COLUMN_CLASS = 'ucebna',
		COLUMN_LEVEL = 'uroven',
                COLUMN_TEACHER = 'lektor';


	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $db)
	{
		$this->database = $db;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
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

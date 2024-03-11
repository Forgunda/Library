<?php
namespace Bitrix\Sipyagova;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\Entity;
//Autрors class
class AuthorTable extends DataManager
{
	public static function getTableName()
	{
		return 'authors';
	}
	public static function getMap()
	{
		return array(
			//ID
			new IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true
			]),
			//Authors name
			new StringField('AUTHOR', [
				'required' => true,
			]),
			//Book ID
			new IntegerField('BOOK'),
			new Reference(
					'BOOK_ID',
					Bitrix\Sipyagova\BookTable::class,
					Join::on('this.BOOK', 'ref.ID'),
				),
		);
	}
	public static function getAuthorsArray($BookID)
	{
		$AuthorsArray=[];
		$authors=AuthorTable::getList([
            'select' => ['AUTHOR'],
            'filter' =>['=BOOK'=>$BookID],
         ]);
        while ($author=$authors->fetch())
        {
            $AuthorsArray[]=$author;
        }
		return $AuthorsArray;
	}
}
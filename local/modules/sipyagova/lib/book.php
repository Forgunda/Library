<?php
namespace Bitrix\Sipyagova;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\Entity;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\ORM\Fields\Relations\OneToMany;
//Book class
class BookTable extends DataManager
{
	public static function getTableName()
	{
		return 'book';
	}
	public static function getMap()
	{
		return array(
			//ID
			new IntegerField('ID', [
				'primary' => true,
				'autocomplete' => true
			]),
			//Book name
			new StringField('TITLE', [
				'required' => true,
			]),
			//Author
			(new OneToMany('AUTHOR_TO', AuthorTable::class, 'BOOK_ID'))->configureJoinType('inner'),
		);
	}
	public static function AddBook($BookName,$Authors)
	{
        //Добавим книгу
		$Book= BookTable::add(['TITLE'=>$BookName]);
        //получим ИД
		$BookId=$Book->getId();
        //Добавим авторов и привяжем к книге
		foreach($Authors as $author){
            //Добавим автора
			$AuthorTemp= AuthorTable::add(['AUTHOR'=>$author,'BOOK'=>$BookId]);
		}
		return "Книга добавлена";
	}
}
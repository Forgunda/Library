<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule('sipyagova');
?><?php
//добавим книги
$books=[
    'Books'=>[
        'To Kill a Mockingbird',
        '1984',
        'The Lord of the Rings',
        'Pride and Prejudice',
        'The Great Gatsby',
        'The Da Vinci Code',
        'Life of Pi',
        'The Catcher in the Rye',
        'The Hobbit',
        'Fahrenheit 451',
        'Moby Dick',
        'The Odyssey',
        'Hamlet',
        'The Adventures of Huckleberry Finn',
        'Harry Potter and the Sorcerer\'s Stone',
        'War and Peace',
        'The Hunger Games',
        'The Chronicles of Narnia',
        'Alice in Wonderland',
        'Romeo and Juliet',
     ],
	'Authors'=>[
        ['Harper Lee','George Orwell'],
        ['George Orwell','J.R.R. Tolkien'],
        ['Jane Austen','F. Scott Fitzgerald'],
        ['Dan Brown'],
        ['Yann Martel'],
        ['J.D. Salinger'],
        ['John Steinbeck', 'Ray Bradbury'],
        ['Herman Melville'],
        ['Homer'],
        ['William Shakespeare', 'Mark Twain'],
        ['J.K. Rowling'],
        ['Leo Tolstoy'],
        ['Suzanne Collins', 'C.S. Lewis'],
        ['Lewis Carroll'],
        ['Agatha Christie'],
        ['Ernest Hemingway'],
        ['Fyodor Dostoevsky', 'Emily Bront'],
        ['Gabriel García Márquez'],
        ['Aldous Huxley', 'Virginia Woolf'],
        ['Edgar Allan Poe','Charles Dickens','Franz Kafka','James Joyce'],
	]
];
//Заполнм таблицы
foreach($books["Books"] as $key=>$Book){
    Bitrix\Sipyagova\BookTable::AddBook($Book,$books["Authors"][$key]);
}
?><?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
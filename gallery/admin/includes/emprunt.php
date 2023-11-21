<!-- gestion des emprunts -->
<?php 
class Emprunt extends Db_object {
    protected static $db_table = "emprunts";
    protected static $db_table_fields = array('id', 'book_id', 'author', 'body');
    public $id;
    public $book_id;
    public $author;
    public $body;


public static function create_emprunt($book_id, $author="John", $body="")  {

    if(!empty($book_id) && !empty($author) && !empty($body)) { 

        $emprunt = new Emprunt();

        $emprunt->book_id = (int)$book_id;
        $emprunt->author = $author;
        $emprunt->body = $body;

        return $emprunt;

    } else {

        return false;

        }
    }

    public static function find_the_emprunts($book_id=0) {
        
        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE book_id = " . $database->escape_string($book_id);
        $sql .= " ORDER BY book_id ASC";

        return self::find_by_query($sql);
    }

}
?>
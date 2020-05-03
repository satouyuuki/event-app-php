<?php
namespace Application\core;
use cebe\markdown\Markdown as Markdown;

class Model {
    protected $parser;
    private $name;
    private $text;
    private $date;
    private $m_id;
    private $e_id;
    private $u_id;
    protected $db;

    /**
     * Model constructor
     */
    function __construct($db = null) {
        try {
            $this->textToMarkdown();
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    private function textToMarkdown() {
        $this->parser = new Markdown();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = trim(mb_convert_kana($name, "s", "UTF-8"));
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getMemberId() {
        return $this->m_id;
    }

    public function setMemberId($m_id) {
        $this->m_id = $m_id;
    }

    public function getEventId() {
        return $this->e_id;
    }

    public function setEventId($e_id) {
        $this->e_id = $e_id;
    }
    public function getUserId() {
        return $this->u_id;
    }

    public function setUserId($u_id) {
        $this->u_id = $u_id;
    }

    public function checkName($table) {
        $m_id = $this->getMemberId();
        $name = $this->getName();
        $sql = "select name from $table where m_id = :m_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':m_id' => $m_id
        );
        $query->execute($parameters);
        $nameArray = $query->fetchAll();
        $flg = null;
        foreach($nameArray as $key => $value) {
            if($name === $value->name) {
                $flg = '既に登録されています。';
            }
        }
        return $flg;
    }

    protected function getAllItems($table) {
        $m_id = $this->getMemberId();
        $sql = "select * from $table where m_id = :m_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':m_id' => $m_id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }

    protected function getItem($table, $mode, $id) {
        $sql = "select * from $table where id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id,
        );
        $query->execute($parameters);
        $result = $query->fetch();
        if ($mode != 'edit') {
            $result->text = $this->parser->parse($result->text);
        }
        return $result;
    }

    protected function addItem($table) {
        $name = $this->getName();
        $date = $this->getDate();
        $text = $this->getText();
        $m_id = $this->getMemberId();
        $sql = "insert into $table (name, date, text, m_id) values (:name, :date, :text, :m_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':text' => $text,
            ':m_id' => $m_id,
        );
        $query->execute($parameters);
    }

    protected function deleteItem($table, $id) {
        $sql = "delete from $table where id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id,
        );
        $query->execute($parameters);
    }

    protected function editItem($table, $id) {
        $name = $this->getName();
        $date = $this->getDate();
        $text = $this->getText();
        $sql = "update $table set name=:name, date=:date, text=:text where id=:id";

        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':text' => $text,
            ':id' => $id,
        );
        return $query->execute($parameters);
    }

}
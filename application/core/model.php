<?php
namespace Application\core;
use cebe\markdown\Markdown as Markdown;

class Model {
    public $parser;

    /**
     * Model constructor
     */
    function __construct() {
        $this->textToMarkdown();
    }
    
    private function textToMarkdown() {
        $this->parser = new Markdown();
    }

    public function getAllItems($table, $m_id) {
        $sql = "select * from $table where m_id = :m_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':m_id' => $m_id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }


    protected function getItem($table, $id, $mode) {
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
}
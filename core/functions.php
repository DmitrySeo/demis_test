<?php
function dbInstance(): PDO
{
    static $db;
    if ($db === null) {
        $db = new PDO('mysql:host=localhost;dbname=cq86570_demis', 'cq86570_demis', 'FrsTJad1', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        $db->exec('SET NAMES UTF8');
    }

    return $db;
}

function dbQuery(string $sql, array $params = []): PDOStatement
{
    $db = dbInstance();
    $query = $db->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $query;
}

function dbCheckError(PDOStatement $query): bool
{
    $errInfo = $query->errorInfo();

    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }

    return true;
}

function makeValidData($value)
{
    $value = trim($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}

function addFeedback($data)
{
    $sql = "INSERT INTO feedback (user_name,user_address,user_phone,user_email) VALUES (:user_name,:user_address,:user_phone,:user_email)";
    $db = dbInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute($data);
    return $db->lastInsertId();
}

function getFeedbacks(){
    $sql = "SELECT * FROM feedback";
    $db = dbInstance();
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function getNews(){
        $sql = "SELECT * FROM news";
        $db = dbInstance();
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
}

function getSentence($text,$count){
    return implode('. ', array_slice(explode('.', $text), 0, $count)) . '.';
}

function getLastNews(){
    $sql = "SELECT * FROM news ORDER BY timestamp DESC LIMIT 3";
    $db = dbInstance();
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}
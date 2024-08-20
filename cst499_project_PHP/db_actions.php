<?php
require "header.php";
class Database
{
    public function executeSelectQuery($con, $sql)
    {
        try {
            $pdo = new PDO($con[0], $con[1], $con[2]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $prep = $pdo->prepare($sql);
            $prep->execute();
            $results = $prep->fetch();

            $pdo = null;
            return $results;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function executeQuery($con, $sql)
    {
        try {
            $pdo = new PDO($con[0], $con[1], $con[2]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $results = $pdo->exec($sql);

            $pdo = null;
            return $results;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function checkEmail($sub_email, $con)
    {
        try {
            $pdo = new PDO($con[0], $con[1], $con[2]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $pdo->prepare("SELECT * FROM user_profile WHERE email='$sub_email'");
            $sql->execute();
            $results = $sql->rowCount();
            if ($results == 1) {
                return 1;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
}


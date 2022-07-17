<?php

    class Functions {

        # função pra ver se o usuário está cadastrado no banco de dados
        public function authenticate($email, $password) {

            session_start();

            require_once('../db/connection.php');

            $email = stripcslashes($email);
            $password = stripcslashes($password);

            $md5Pass = md5($password);

            # query de login
            $query = $conn -> prepare('SELECT * FROM users WHERE email = ? AND password = ?');
            $query -> bindParam(1, $email);
            $query -> bindParam(2, $md5Pass);
            $query -> execute();

            # vê se o usuário consta realmente na database e configura as sessões
            if ($query -> rowCount() == 1) {
                $name;

                if (!isset($_SESSION['logged'])) {
                    $_SESSION['logged'] = TRUE;
                }

                if (!isset($_SESSION['sessionId'])) {
                    # pega o id do usuário e configura na sessão
                    $query2 = $conn -> prepare('SELECT * FROM users WHERE email = ?');
                    $query2 -> bindParam(1, $email);
                    $query2 -> execute();
                    $fetch = $query2 -> fetch(PDO::FETCH_ASSOC);
                    $id = $fetch['user_id'];
                    $name = $fetch['first_name'] . " " . $fetch['last_name'];

                    $_SESSION['sessionId'] = $id;
                }

                if (!isset($_SESSION['sessionName'])) {
                    $_SESSION['sessionName'] = $name;
                }

                return true;
            } else {
                # nesse caso o usuário não consta na database
                return false;
            }
            
        }

        # função pra deslogar o usuário
        public function logout() {

            session_start();
            unset($_SESSION['logged']);
            unset($_SESSION['sessionId']);
            unset($_SESSION['sessionName']);
            session_destroy();

            header('Location: ../public/marketplace.php');
            die();

        }

        # função para retornar o informações do usuário
        public function getInfo($userId, $info) {

            require('../db/connection.php');

            $query = $conn -> prepare("SELECT $info FROM users WHERE user_id = ?");
            $query -> bindParam(1, $userId);
            $query -> execute();

            $data = $query -> fetch(PDO::FETCH_ASSOC);
            return $data["$info"];
            die();

        }

        # função pra retornar as vendas que um usuário fez
        public function getSells($userId) {

            require('../db/connection.php');

            $bool = 0;

            $query = $conn -> prepare("SELECT * FROM products WHERE seller_id = ? AND sold = ?");
            $query -> bindParam(1, $userId);
            $query -> bindParam(2, $bool);
            $query -> execute();

            return $query;
            die();

        }

    }

?>
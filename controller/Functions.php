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

        public function productInfo($info, $url) {

            require('../db/connection.php');

            $query = $conn -> prepare("SELECT $info FROM products WHERE url_link = ?");
            $query -> bindParam(1, $url);
            $query -> execute();

            $data = $query -> fetch(PDO::FETCH_ASSOC);

            return $data["$info"];

        }

        # função pra mostrar as divs com os produtos no marketplace.php
        public function showAllProducts() {

            require_once('../db/connection.php');

            $bool = 0;

            $query = $conn -> prepare('SELECT * FROM products WHERE sold = ?');
            $query -> bindParam(1, $bool);
            $query -> execute();
            
            while($data = $query -> fetch(PDO::FETCH_ASSOC)) {

                $queryySellerName = $conn -> prepare('SELECT * FROM users WHERE user_id = ?');
                $queryySellerName -> bindParam(1, $data['seller_id']);
                $queryySellerName -> execute();
                $name = $queryySellerName -> fetch(PDO::FETCH_ASSOC);

                $sellerName = $name['first_name'] . " " . $name['last_name'];

                $pName = $data['product_name'];
                $pSeller = $sellerName;
                $pCategory = $data['category'];
                $pConditionOf = $data['condition_of'];
                $pPrice = $data['price'];
                $pDateOfPosting = $data['date_of_posting'];
                $pUrl = $data['url_link'];

                $dataArray = array(
                    $pName,
                    $pSeller,
                    $pCategory,
                    $pConditionOf,
                    $pPrice,
                    $pDateOfPosting,
                    $pUrl
                );

                echo "
                
                    <div class='card'>
                        <div class='card-img'> </div>
                        <div class='card-info'>
                            <p class='text-title'> $dataArray[0] </p>
                            <p class='text-body'> Vendedor: $sellerName </p>
                        </div>
                        <div class='card-footer'>
                            <span class='text-title'> R$ $dataArray[4] </span>

                            <a href='product.php?p=$dataArray[6]'>            
                                <div class='card-button'>
                                    <i class='fa-solid fa-cart-shopping'> </i> 
                                </div>
                            </a>
                        </div>
                    </div>
                
                ";

            }


        }

    }

?>
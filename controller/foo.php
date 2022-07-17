<?php

/*

    ### código para adicionar os produtos no banco de dados ###

    require_once('../db/connection.php');

    $fetchQuery = $conn -> prepare('SELECT product_id FROM products ORDER BY product_id DESC LIMIT 1');
    $fetchQuery -> execute();
    $data = $fetchQuery -> fetch(PDO::FETCH_ASSOC);
    $data2 = $data['product_id'];

    $yes = $data2 + 1;

    echo $yes;

    $query = $conn -> prepare("INSERT INTO `products`(`url_link`, `product_name`, `seller_id`, `category`, `condition_of`) VALUES (md5($yes), 'batata', 1, 1, 'good')");
    $query -> execute();

*/

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://sandbox.api.pagseguro.com/charges",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}



?>

<button onclick='teste()'>
    aaaaaa
</button>

<script>
    function teste() {
        const options = {
        method: 'POST',
        headers: {Accept: 'application/json', 'Content-type': 'application/json'}
        };

        fetch('https://sandbox.api.pagseguro.com/charges', options)
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(err => console.error(err));
    }
</script>
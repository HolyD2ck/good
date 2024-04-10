<?php
$api_url = 'http:///web/users';

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_error($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    
    if (is_array($data)) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Email</th></tr>';
        
        foreach ($data as $item) {
            echo '<tr>';
            echo '<td>' . $item['id'] . '</td>';
            echo '<td>' . $item['username'] . '</td>';
            echo '<td>' . $item['email'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'No data found or data is not an array';
    }
}

curl_close($ch);
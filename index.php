<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    // Initialize new cURL session
    $curl_handle = curl_init(API_URL);
    // Don't show on screen, only get the result
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    // Handle result
    $result = curl_exec($curl_handle);
    $data = json_decode($result, true);
    // Close cURL
    curl_close($curl_handle);
    echo $result
?>



<main>
    <h2>Next marvel film</h2>
</main>

<style>

    body{
        display: grid;
        place-content: center;
    }

</style>
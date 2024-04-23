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
?>

<head>
    <meta charset="UTF-8"/>
    <title>Next marvel film</title>
    <meta name="description" content="Next marvel film"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" href="styles.css"/>
    
</head>

<main>
    <section>
        <img id="poster" src="<?= $data["poster_url"];?>" width="300" alt="Logo" style="border-radius:10px;"/>
    </section>
    <hgroup>
        <h2><?= $data["title"];?> is released in <?= $data["days_until"];?> days</h2>
        <p>Release date : <?= $data["release_date"];?></p>
        <p>The next marvel film is : <?= $data["following_production"]["title"];?> <?= $data["following_production"]["release_date"];?></p>
    </hgroup>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    
    var poster = document.getElementById('poster');

    // Animate with gsap
    gsap.from(poster, {
        duration: 1.5, 
        y: "-100%", 
        ease: "elastic.out(1, 1)", // bounce effect
    });
});


</script>
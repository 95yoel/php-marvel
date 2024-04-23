<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    // Initialize new cURL session
    $curl_handle = curl_init(API_URL);
    // Don't show on screen, only get the result
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    // Handle result
    $result = curl_exec($curl_handle);
    //Handle posible errors
    if ($result === false) {
        throw new Exception("Error in the cURL request: " . curl_error($curl_handle));
    } else {
        $data = json_decode($result, true);
    }
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
        <img id="poster" src="<?= $data["poster_url"];?>" width="300" alt="Logo"/>
    </section>
    <hgroup>
        <h2><?= $data["title"];?></h2>
        <span id="countdown"></span>
        <p>Release date : <?= $data["release_date"];?></p>
        <p>The next marvel film is : <?= $data["following_production"]["title"];?> <?= $data["following_production"]["release_date"];?></p>
    </hgroup>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="mouseHoverImg.js"></script>
<script src="animations.js"></script>
<script src="main.js"></script>
<script>
    // Obtain the release date from PHP
    var releaseDate = new Date("<?php echo $data["release_date"]; ?>");

    // Update Countdow
    function updateCountdown() {
        // Current date
        var currentDate = new Date();
        // Difference between dates
        var difference = releaseDate - currentDate;

        if (difference > 0) { 
            // Calculate day , hours , minutes , seconds
            var days = Math.floor(difference / (1000 * 60 * 60 * 24));
            difference -= days * (1000 * 60 * 60 * 24);
            var hours = Math.floor(difference / (1000 * 60 * 60));
            difference -= hours * (1000 * 60 * 60);
            var minutes = Math.floor(difference / (1000 * 60));
            difference -= minutes * (1000 * 60);
            var seconds = Math.floor(difference / 1000);

            // Update the remaining time
            var countdownText = "Remaining time: " + days + " days, " + hours + " hours, " + minutes + " minutes, " + seconds + " seconds";
            document.getElementById('countdown').innerHTML = countdownText;
        } else {
            // If the film is already released
            document.getElementById('countdown').innerHTML = "The film has already been released.";
        }
    }

    // Update countdown
    updateCountdown();
    setInterval(updateCountdown,1000);
</script>

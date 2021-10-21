<?php
    $endpoint = "https://dog-facts-api.herokuapp.com/api/v1/resources/dogs/all"; // api endpoint
    $ch = curl_init(); // initialise CURL
    curl_setopt($ch, CURLOPT_URL, $endpoint); //give curl endpoint
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //return response as string
    $resp = curl_exec($ch); //execute query
    curl_close($ch);  // close connection to save memory
    $factsarr = json_decode($resp); // turn json string into object
    $element = $factsarr[mt_rand(0, count($factsarr) - 1)]->fact; // use rng to get a random index from facts array
    $json = json_encode($element); // turn the object back into string for printing
?>
<html>
    <style>
        body
        {
            height:100%;
            width:100%;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .fact
        {
            width: 70%;
            display:flex;
            text-align:center;
            flex-direction: column;
            font-size:50px;
            font-weight:700;
            font-family:Helvetica;
        }
        button
        {
            width: 10%;
            height: 5%;
            margin: 50px auto;
            font-size:20px;
            border-radius:10px;
        }

  
    </style>
    <title>Random dog fact generator</title>
    <body>
        <div class="fact">
            <?php echo $json; ?>
            <button onclick="window.location.reload()">New fact</button>
        </div>
    </body>
</html>
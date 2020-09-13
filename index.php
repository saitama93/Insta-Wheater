<?php
if (
    stristr($_SERVER['HTTP_USER_AGENT'], "Android")
    || strpos($_SERVER['HTTP_USER_AGENT'], "iPod")
    || strpos($_SERVER['HTTP_USER_AGENT'], "iPhone")
) {
    // Mettre ici du code php optimisé pour les mobiles
?>
    <script>
        console.log('Mobile');
    </script>
<?php
} else {
    // Et ici du code php classique...Pas forcement optimisé
?>
    <script>
        console.log('PC');
    </script>
<?php
}


//(source : http://www.charlesen.fr/mon-blog/35-tutoriel/75-un-script-de-detection-de-mobiles-en-php)
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="assets/images/icon.png" />
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="assets/css/app.css">
    <title>Projet Météo</title>
</head>
<script>
    //if browser support service worker
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("sw.js");
    }
</script>

<body>
    <section id="app" class="container-fluid">
        <div class="col-12 text-center">
            <h1 class="h1 my-5">Insta Alert</h1>
        </div>

        <div class="card col-12 offset-lg-4 col-lg-4 d-flex flex-column justify-content-around align-items-between my-5">
            <div class="search d-flex">
                <input type="text" class="text-left pl-5 offset-1 col-10 input-city mt-3 mb-5" placeholder="Saisir une ville">
                <i class="fas fa-search-location"></i>
            </div>

            <div class="main-infos d-flex justify-content-between align-items-center">

                <i class="wi wi-day-rain"></i>
                <div class="temp-infos d-flex justify-content-between align-items-right flex-column">

                    <span class="conditions text-right"></span>
                    <span class="temp-celcius temperature text-right"></span>
                    <p class="min-max text-right">
                        <span class="min temperature"></span>/<span class="max temperature"></span>
                    </p>
                    <p class="location"><span class="city"></span>, <span class="country"></span></p>
                </div>
            </div>

            <hr class="seperation" style=" border: 1px solid black; width:100%;">

            <div class="second-infos d-flex justify-content-between align-items-center flex-column">
                <div class="feel d-flex justify-content-between">
                    <p>Ressentie</p>
                    <span class="feel-like temperature"></span>
                </div>
                <div class=" d-flex justify-content-between">
                    <p>Humidité</p>
                    <span class="humidity"></span>
                </div>
                <div class="wind d-flex justify-content-between">
                    <p>Vent</p>
                    <span class="wind-speed"></span>
                </div>
            </div>
        </div>

    </section>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="sw.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/alert.js"></script>
</body>

</html>
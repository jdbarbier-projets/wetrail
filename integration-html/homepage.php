<?php

?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <title>WeTrail</title>
</head>
<body>

<!-- Header -->
<?php include 'header.php';?>


<div class="zones">
    <!-- Carousel -->
    <div id="carouselHome" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5000" style="background-image: url('images/festival-templiers.jpg');">
                <div class="carousel-caption">
                    <span class="infos"> 15.09.2019 | Millau, France | Trail</span>
                    <h2>Les templiers</h2>
                    <p class="white">Notre compte rendu du fameux festival des templiers</p>
                    <div class="buttons">
                        <a href="#" class="btn btn-rond">Lire l'article</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-interval="5000" style="background-image: url('images/viaduc-millau.jpg');">
                <div class="carousel-caption">
                    <span class="infos"> 12.05.2019 | Millau, France | Trail</span>
                    <h2>Course du Viaduc</h2>
                    <p class="white">Notre compte rendu de la Course Eiffage du Viaduc de Millau</p>
                    <div class="buttons">
                        <a href="#" class="btn btn-rond">Lire l'article</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container container-medium presentation">
    <img class="presentation-image img-cover" src="images/us.jpg" />
    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi auctor vehicula enim, sit amet suscipit nisl mollis a. Vivamus iaculis sagittis mollis. Quisque sit amet nibh sit amet lacus posuere accumsan. Praesent hendrerit laoreet eros ac tristique. Nulla facilisi. Sed congue lorem condimentum neque vehicula volutpat. Praesent interdum quam vel lorem luctus tristique. Integer sed ex nec massa efficitur euismod.</p>
    <div class="buttons text-uppercase">
        <a href="#" class="btn btn-rond black padding-large">Qui sommes nous ?</a>
    </div>
</div>

<div id="topics" class="container container-large">
    <h2>Sujets</h2>
    <div class="row">
        <div class="topic-item col-12 col-sm-6 col-xl-3">
            <a href="#" class="thumbnail">
                <img class="img-cover" alt="" src="images/light_stairs_nature.jpg" />
                <span>Trails</span>
            </a>
        </div>
        <div class="topic-item col-12 col-sm-6 col-xl-3">
            <a href="#" class="thumbnail">
                <img class="img-cover" alt="" src="images/trail_bag.jpg" />
                <span>Équipements</span>
            </a>
        </div>
        <div class="topic-item col-12 col-sm-6 col-xl-3">
            <a href="#" class="thumbnail">
                <img class="img-cover" alt="" src="images/deadlift.jpg" />
                <span>Entrainements</span>
            </a>
        </div>
        <div class="topic-item col-12 col-sm-6 col-xl-3">
            <a href="#" class="thumbnail">
                <img class="img-cover" alt="" src="images/healthy_food.jpg" />
                <span>Alimentation</span>
            </a>
        </div>
    </div>
</div>

<div id="latestsPosts" class="container container-full-width">
    <h2>Nos derniers posts</h2>
    <div class="row">
        <div class="post-item col-12 col-md-7 col-xl-8" style="background-image: url('images/trail_batons.jpg');">
            <div class="content"></div>
            <div class="details">
                <span class="infos"> 15.09.2019 | Millau, France | Trail</span>
                <h3><a href="#">Trail de Saint-Guilhem</a></h3>
                <p class="white">Notre compte rendu du fameux festival des templiers</p>
            </div>
        </div>
        <div class="post-item col-12 col-md-5 col-xl-4" style="background-image: url('images/trail_soleil.jpg');">
            <div class="content"></div>
            <div class="details">
                <span class="infos"> 15.09.2019 | Alès, France | Trail</span>
                <h3><a href="#">Trail de Canabias</a></h3>
                <p class="white">Notre compte rendu du fameux festival des templiers</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="post-item col-md-5 col-xl-4" style="background-image: url('images/food.jpg');">
            <div class="content"></div>
            <div class="details">
                <span class="infos"> 17.04.2019 | Mireval, France | Trail</span>
                <h3><a href="#">Trail de Mireval</a></h3>
                <p class="white">Notre compte rendu du fameux festival des templiers</p>
            </div>
        </div>
        <div class="post-item col-12 col-md-7 col-xl-8" style="background-image: url('images/traileur.jpg');">
            <div class="content"></div>
            <div class="details">
                <span class="infos"> 22.11.2019 | Montpellier, France | Route</span>
                <h3><a href="#">10km de Montpellier</a></h3>
                <p class="white">Notre compte rendu du fameux festival des templiers</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="post-item col-12 col-md-7 col-xl-8" style="background-image: url('images/black_food.jpg');">
            <div class="content"></div>
            <div class="details">
                <span class="infos"> 18.01.2020 | Angkor, Cambodge | Trail</span>
                <h3><a href="#">Trail des temples d'Angkor</a></h3>
                <p class="white">Notre compte rendu du fameux festival des templiers</p>
            </div>
        </div>
        <div class="post-item col-12 col-md-5 col-xl-4" style="background-image: url('images/race-india.jpg');">
            <div class="content"></div>
            <div class="details">
                <span class="infos"> 15.09.2019 | Alès, France | Trail</span>
                <h3><a href="#">Trail de Canabias</a></h3>
                <p class="white">Notre compte rendu du fameux festival des templiers</p>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include 'footer.php';?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/script.js"></script>
</body>
</html>
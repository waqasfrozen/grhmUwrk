<?php
$handle = curl_init();
$serverr = "http://34.238.235.155";
$url = "http://34.238.235.155:8000/test2";

//Sending Curl With empty payload..
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);

$output = curl_exec($handle);
curl_close($handle);
$output = json_decode($output,true);
//response received from API.


?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>


</head>
<body>

<div class="loader">

</div>

<div class="container">
    <h1>
        <span  class="first" style="font-size: 30px;color:black;font-family: 'Raleway', sans-serif;font-weight: bolder">Click on the square you like to get it in the center </span>
        </br> <span  class="second" style="font-size: xx-large">click on the center to purchase ($9)</span>
    </h1>
    <div class="main-box">
        <div class="inner">
            <div class="row">
                <?php foreach($output as $i=>$v){ ?>
                <div class="col-md-4 pad">
                    <div class="box">
                        <img class="img-responsive" src="<?= $serverr ?><?= $v['image'] ?>" alt="">
                        <div class="overlay">
                            <h2>Click me</h2>
                            <a class="info first <?= ($i == 5) ? "middle" : "outerr"; ?>" id="<?= $v['key']; ?>" style="cursor: pointer;">Click me</a>
                        </div>
                    </div>
                </div>

                <?php if ($i % 3 == 0){ ?></div><div class="row"><?php } ?>
                    <?php } ?>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-sm in" role="dialog" tabindex="-1" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel">Engage Payment</h4>
                </div>
                <div class="modal-body clearfix">
                    <div class="col-md-12">
                        <p style="text-align: center">
                            <img src="https://logos-download.com/wp-content/uploads/2016/03/PayPal_logo_logotype_emblem.png" style="width: 100px">
                        </p>
                        <form class="form-horizontal" action="">
                            <div class="form-group">
                                <input type="text" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <a href="" target="_blank" id="downloaddd" class="form-control">Pay Now</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="pad">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h5>
                        Copyrights 2019
                    </h5>

                </div>
                <div class="col-md-4 col-xs-12 text-center">
                    <h5>
                        All Rights Reserved
                    </h5>
                </div>
                <div class="col-md-4 col-xs-12 text-center">
                    <h5>
                        Beta Version
                    </h5>
                </div>
            </div>
        </div>
    </footer>

</div>




<script>

    $(document).ready(function(){
        $(".loader").fadeOut(3000);
    });


</script>



<script>
    //Sending outer 8 squares to http://34.238.235.155:8000/test2 with key of the image
    $(".outerr").click(function(){

        var img = $(this).attr('id');

        console.log("Outer Box image clicked...");
        console.log("Sending: {'key':'"+ img +"'} to http://34.238.235.155:8000/test2 ");
        $.post("test2.php",{key:img},function (e) {

            console.log("Response Received : " + e );

        });


    });

    //Sending middle square to http://34.238.235.155:8000/test3 with key of the image
    $(".middle").click(function(){

        var img = $(this).attr('id');

        console.log("Middle Box image clicked...");
        console.log("Sending: {'key':'"+ img +"'} to http://34.238.235.155:8000/test3 ");

        $.post("test3.php",{key:img},function (e) {
            $("#downloaddd").attr("href","http://34.238.235.155" + e);
            $(".bs-example-modal-sm").modal("show");

            console.log("Response Received : " + e );

        });


    });
</script>
</body>
</html>

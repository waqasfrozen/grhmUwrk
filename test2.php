<?php

$handle = curl_init();
$serverr = "http://34.238.235.155/";
$url = "http://34.238.235.155:8000/test2";
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
$x = json_encode(array("key"=>$_POST['key']));
curl_setopt($handle, CURLOPT_POSTFIELDS, $x);

$output = curl_exec($handle);
curl_close($handle);
$output = json_decode($output,true);
//echo str_replace('"',"",$output);

?>
<div class="row">
<?php foreach($output as $i=>$v){ ?>
<div class="col-md-4 pad">
    <div class="box">
        <img class="img-responsive" src="<?= $serverr ?><?= $v['image'] ?>" alt="">
        <div class="overlay">
            <h2>Click me </h2>

            <a class="info first" onclick="<?= ($i == 5) ? "middle('".$v['key']."')" : "outerr('".$v['key']."');"; ?>" style="cursor: pointer;">Click me</a>

        </div>
    </div>
</div>

<?php if ($i % 3 == 0){ ?></div><div class="row"><?php } ?>

    <?php } ?>
</div>

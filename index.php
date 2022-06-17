<html>
<head>
<title>Read Json</title>
<link href="./css/bootstrap.min.css" rel="stylesheet">
<script src="./js/bootstrap.bundle.min.js" ></script>
<script src="./js/bootstrap.min.js" ></script>
</head>
<body>
    <div style="width:95% !important;margin:0 auto">
<?php
    $json = file_get_contents("repor_file.json");
    $data = json_decode($json);

    echo '</br>';
    echo '<h6>Report Name</h4>';
    echo '</br>';
    echo "<b>Scan</b> - ".$data->imageScanFindings->imageScanCompletedAt;
    echo "</br>";
    echo "</br>";
    echo "<h5>Resumo - Vulnerabilidades Encontradas</h5>";
    echo'<small style="background-color:red;border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:red;"><b>CRITICAL '.$data->imageScanFindings->findingSeverityCounts->CRITICAL.'</b></span>';
    echo "</br>";
    echo'<small style="background-color:orange;border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:orange;"><b>HIGH '.$data->imageScanFindings->findingSeverityCounts->HIGH.'</b></span>';
    echo "</br>";
    echo'<small style="background-color:blue;border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:blue;"><b>MEDIUM '.$data->imageScanFindings->findingSeverityCounts->MEDIUM.'</b></span>';
    echo "</br>";
    echo'<small style="background-color:green;border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:green;"><b>LOW '.$data->imageScanFindings->findingSeverityCounts->LOW.'</b></span>';
    echo "</br>";
    echo'<small style="background-color:gray;border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:gray;"><b>UNDEFINED '.$data->imageScanFindings->findingSeverityCounts->UNDEFINED.'</b></span>';
    echo "</br>";
    echo'<small style="background-color:gray;border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:gray;"><b>INFORMATIONAL '.$data->imageScanFindings->findingSeverityCounts->INFORMATIONAL.'</b></span>';
    echo "</br>";
    echo "</br>";
    echo'<table class="table table-hover" style="font-size:10pt">';   
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Id</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Severity</th>';
    echo '<th scope="col">Description</th>';
    echo '<th scope="col">Uri</th>';
    echo '<th scope="col">Attributes</th>';
    echo '</tr>';
    echo '</thead>';
      
    echo'<tbody>';
    
    $cont = 1;

    foreach ($data->imageScanFindings as $base) {
        foreach ($base as $data) {

            if(isset($data->name)){
                $name = $data->name;
            }else{
                $name = "";
            }

            if(isset($data->description)){
                $descricao = $data->description;
            }else{
                $descricao = "";
            }

            if(isset($data->uri)){
                $uri = $data->uri;
            }else{
                $uri = "";
            }

            if(isset($data->severity)){
                $severity = $data->severity;
            }else{
                $severity = "";
            }

            if(isset($data->attributes)){
                $Dtaattributes = $data->attributes;
            }else{
                $Dtaattributes = [];
            }
                
            if($severity == "CRITICAL"){
                $cor = "red";
            }elseif($severity == "HIGH"){
                $cor = "orange";
            }elseif($severity == "MEDIUM"){
                $cor = "blue";
            }elseif($severity == "LOW"){
                $cor = "green";
            }else{
                $cor = "gray";
            }


            echo'<tr>';
            echo'<td th scope="row" >'.$cont.'</td>';
            echo'<td th scope="row">'.$name.'</td>';
            echo'<td th scope="row"><small style="background-color:'.$cor.';border-radius:20pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small> <span style="color:'.$cor.';"><b>'.$severity.'</b></span></td>';
            echo'<td th scope="row" style="width:200px !important">'.$descricao.'</td>';
            echo'<td th scope="row">'.$uri.'</td>';            
            echo'<td th scope="row">';
                foreach ($Dtaattributes as $attributes) {
                    echo ' + '.$attributes->key." - ".$attributes->value."</br>";
                }
            echo'</td>';
            echo'</tr>'; 
                
               
                $cont = $cont + 1;
                
            }
            break;
        }
    
    echo '</tbody>';
    echo'</table>';

    
?>
</div>
</body>
</html>

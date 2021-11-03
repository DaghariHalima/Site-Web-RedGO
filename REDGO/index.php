<?php
echo "<script type='text/javascript' src='total.js'></script>";
//connexion BD
try{
 $conn = new PDO("sqlsrv:Server=172.16.3.50;Database=REDGO", "rep", "rep");

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$mois = date("m");
$mois =  (int)$mois;

$sql= "SELECT REGION, ACTIVITE, SUM(CA_HT) AS ca
,SUM(CMD_NL)+SUM(CMD_LNF) AS CMD_NL_LNF
,SUM(CA_HT)+ SUM(CMD_NL)+SUM(CMD_LNF) AS TOT_CA,
 SUM(OBJ_CA) AS obj,
(SUM(CA_HT)/SUM(OBJ_CA))* 100 AS taux
FROM   VENTE_ALL WHERE ANNEE=2020 AND MOIS= ".$mois." 
GROUP BY REGION,ACTIVITE
ORDER BY REGION";

echo "<h1 align='center' style='color:#DA1A38'> CHIFFRE D'AFFAIRE PAR REGION,ACTIVITE:  Mois ".$mois." </h1>";
echo "<table id='tableau' width='50%'align='center' border='1'>";
echo "<tr style='background-color:#DA1A38'>
     
            <td id='reg'>REGION </td>
            <td >ACTIVITE </td>
            <td >CA_HT </td>
            <td >CMD_NL_LNF </td>
            <td >TOT_CA </td>
            <td >OBJ_CA </td>
            <td > TAUX </td>";
echo "</tr>";

foreach( $conn->query($sql) as $row) {
    
    if($row['REGION']!='' && $row['ACTIVITE']!=''&& $row['ca']!=0 && $row['taux'] !=0  ){
        echo "<tr>";
        echo "<td>". $row['REGION']."</td>";
        echo "<td>". $row['ACTIVITE']."</td>";
        echo "<td>". number_format($row['ca'],0,',',' ')."</td>";
        echo "<td>". number_format($row['CMD_NL_LNF'],0,',',' ')."</td>";
        echo "<td>". number_format($row['TOT_CA'],0,',',' ')."</td>";
        echo "<td>". number_format($row['obj'],0,',',' ')."</td>";
        echo "<td>".number_format( $row['taux'],0,',',' ').'%'."</td>";
        echo "</tr>";   
   }}

   $sql1 ="SELECT SUM(CA_HT) AS ca,SUM(CMD_NL)+SUM(CMD_LNF) AS CMD_NL_LNF,
   SUM(CA_HT)+ SUM(CMD_NL)+SUM(CMD_LNF) AS TOT_CA, SUM(OBJ_CA) AS obj,
   (SUM(CA_HT)/SUM(OBJ_CA))* 100 AS taux FROM  VENTE_ALL WHERE ANNEE=2020 AND MOIS= ".$mois." ";

   foreach( $conn->query($sql1) as $row) {
    echo "<tr>";
    echo "<td><strong>".'TOTAL'."</strong></td>";
    echo"<td>".'None'."</td>";
    echo"<td>".number_format($row['ca'],0,',',' ')."</td>";
    echo "<td>".number_format($row['CMD_NL_LNF'],0,',',' ')."</td>";
    echo "<td>".number_format($row['TOT_CA'],0,',',' ')."</td>";
    echo"<td>".number_format($row['obj'],0,',',' ')."</td>";
    echo"<td>".number_format( $row['taux'],0,',',' ').'%'."</td>";
}
 echo "</tr>";

  //modele chart
   echo "<script> var obj_json = [";

   foreach( $conn->query($sql) as $row) {
    if($row['REGION']!='' && $row['ACTIVITE']!='' && $row['ca']!=0 && $row['taux'] !=0){

        echo "{";
        echo "REGION: ".'"'. $row['REGION'].'"' . ",";
        echo "ACTIVITE: ".'"'. $row['ACTIVITE'].'"' . ",";
        echo "CA_HT: ".'"'. $row['ca'].'"' .",";
        echo "CMD_NL_LNF: ".'"'. $row['CMD_NL_LNF'].'"' .",";
        echo "TOT_CA: ".'"'. $row['TOT_CA'].'"' .",";
        echo "OBJ_CA: ".'"'. $row['obj'].'"' .",";
        echo "TAUX: ".'"'. number_format( $row['taux'],0).'"'.",";
        echo "color: ".'"'. $mycolor = '#FAB2BD'.'"';
        echo "},";   
   }}

   echo "]</script>";
?>
<?php
function getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $ret['Lunes'] = $dto->format('Y-m-d');
    $dto->modify('+1 days');
    $ret['Martes'] = $dto->format('Y-m-d');
    $dto->modify('+1 days');
    $ret['Miercoles'] = $dto->format('Y-m-d');
    $dto->modify('+1 days');
    $ret['Jueves'] = $dto->format('Y-m-d');
    $dto->modify('+1 days');
    $ret['Viernes'] = $dto->format('Y-m-d');
    $dto->modify('+1 days');
    $ret['Sabado'] = $dto->format('Y-m-d');
    $dto->modify('+1 days');
    $ret['Domingo'] = $dto->format('Y-m-d');
    return $ret;
}
?>

<?php
$options="";
$NWeek= $_POST['elegido'];
$NYear=date("Y");
$week_array = getStartAndEndDate($NWeek,$NYear);
foreach($week_array as $key => $value){
    $options= $options.'<option value='.$value.'>'.$key.' '.$value.'</option>'; //dia de la semana
}

echo $options;    
?>
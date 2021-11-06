<?php
    require('conexion.php');

    $idDosimetro           = $_POST['numero_dosimetro'];
    $zeroLevelDate         = $_POST['zeroLevelDate'];
    $measurementDate       = $_POST['measurementDate'];
    $hp007CalcDose         = $_POST['hp007CalcDose'];
    $hp007BackgroundDose   = $_POST['hp007BackgroundDose'];
    $hp10CalcDose          = $_POST['hp10CalcDose'];
    $hp10BackgroundDose    = $_POST['hp10BackgroundDose'];
    $hp10RawDose           = $_POST['hp10RawDose'];
    $ezclipCalcDose        =  $_POST['ezclipCalcDose'];
    $ezclipBackgroundDose       = $_POST['ezclipBackgroundDose'];
    $ezclipRawDose              = $_POST['ezclipRawDose'];
    $verificationDate           = $_POST['verificationDate'];
    $verificationRequiredBefore = $_POST['verificationRequiredBefore'];
    $remainingDaysForUse        = $_POST['remainingDaysForUse'];
    $tipoDosimetro         = $_POST['tipo_dosimetro'];
    $hp007RawDose          = $_POST['hp007RawDose'];
    $ocupacionDosimetro    = $_POST['ocupacion_dosimetro'];
    $periodoRecambio       = $_POST['periodoRecam_dosimetro'];
    $energiaDosimetro      = $_POST['energia_dosimetro'];
    $fechaIngresoServicio  = $_POST['fechaIngresoServicio_dosimetro'];
    



    $instruccion_SQL1 = "insert into dosimetro (id_dosimetro, codigo_dosimeter, zero_level_date, measurement_date, Hp007_calc_dose, 
    Hp007_background_dose, Hp10_calc_dose, Hp10_background_dose, Hp10_raw_dose, Cu_calc_dose, Cu_background_dose, 
    Cu_raw_dose, Pb_Sn_calc_dose, Pb_Sn_background_dose, Pb_Sn_raw_dose, EzClip_calc_dose, EzClip_background_dose, 
    EzClip_raw_dose, Hp3_calc_dose, Hp3_background_dose, Hp3_raw_dose, H_10_calc_dose, 
    verification_date, verification_required_on_or_before, remaining_days_available_for_use, tipo_dosimetro, 
    Hp007_raw_dose, ocupacion, periodo_recambio, energia, fecha_ingreso_servicio) values ('', '$idDosimetro', '$zeroLevelDate',
    '$measurementDate', '$hp007CalcDose', '$hp007BackgroundDose', '$hp10CalcDose', '$hp10BackgroundDose', 
    '$hp10RawDose', 'null', 'null', 'null', 'null', 'null', 'null', '$ezclipCalcDose', '$ezclipBackgroundDose', 
    '$ezclipRawDose', 'null', 'null', 'null', 'null', '$verificationDate', '$verificationRequiredBefore', '$remainingDaysForUse', 
    '$tipoDosimetro', '$hp007RawDose', '$ocupacionDosimetro', '$periodoRecambio', '$energiaDosimetro', '$fechaIngresoServicio')";

    $ejecutar1 = $mysqli->query($instruccion_SQL1);
    $ultimo_id = mysqli_insert_id($mysqli);

    if(!$ejecutar1){
        echo "Hay algun error no se almacenaron los datos en la consulta 1";
    }else{
        echo "Datos almacenados correctamente de la consulta 1";
        echo $ultimo_id;
    }
?>
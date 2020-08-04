<?php
    include_once('dbConn.php');
    $patient_username=$_POST['patient_username'];
    $doctor_username=$_POST['doctor_username'];
    $date=$_POST['date'];
    
    if($patient_username!=""&&$date!=""&&$doctor_username!="")
    {
        $current_date=date("y-m-d");
        if(strtotime($date)<=strtotime($current_date))
        {
            header("Location:appointment.php?event=wrong&username=".$patient_username);
        }
        else{
            $query="insert into appointment(patient,doctor,appointmentDate,confirm,reject) values('$patient_username','$doctor_username','$date',0,0)";
            $result=mysqli_query($conn,$query);
            $row=mysqli_num_rows($result);
            header("Location:view_appointment.php?username=".$patient_username);
        }
    }
?>
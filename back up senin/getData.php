<?php
    include "connect.php";
    date_default_timezone_set("Asia/Jakarta");
    $getDate = date("Y-m-d h:i:s");
    $getNoPol = $_GET["nopol"];
    $getSensor = $_GET["pembacaan"];
    $getKelas = $_GET["kelas"];
	
	$getDataKendaraan = mysqli_query($link, "SELECT * FROM tblkendaraan WHERE noPol = '$getNoPol'");
	if(mysqli_num_rows($getDataKendaraan) >0)
	{
	    $getDataKendaraan = mysqli_query($link, "SELECT * FROM tblkendaraan WHERE noPol = '$getNoPol'");
	    while($valDataKendaraan = mysqli_fetch_array($getDataKendaraan) )
    	{
    		$reqIdKendaraan = $valDataKendaraan["idKendaraan"];
    		$reqJenis = $valDataKendaraan["jenis"];
    		$reqMax = $valDataKendaraan["maximal"];
    		$reqKosong = $valDataKendaraan["kosong"];
    		$reqKelas = $valDataKendaraan["kelas"];
    		
    		if($getSensor < 0)
    		{
    		    $getSensor = 0;
    		}
    		$beratKeseluruhan = $getSensor + $reqKosong;
    		
    		$query = "INSERT INTO tbluji(idKendaraan,noPol,kelas,jenis,kosong,maximal,pembacaan,waktu) 
    					VALUES('$reqIdKendaraan','$getNoPol','$getKelas','$reqJenis','$reqKosong','$reqMax','$beratKeseluruhan','$getDate')";
    		$command = mysqli_query($link, $query);
    		if($beratKeseluruhan > $reqMax)
    		{
    			echo "Danger";
    		}
    		if($getKelas > $reqKelas)
    		{
    		    echo "Kelas Tdk Sesuai";
    		}
    		if($getKelas <= $reqKelas && $beratKeseluruhan <= $reqMax)
    		{
    		    echo "Done";
    		}
    		
    	}    
	}
	else
	{
	    echo "Nopol Tdk Terdaftar";
	}
	
	
    
    
?>
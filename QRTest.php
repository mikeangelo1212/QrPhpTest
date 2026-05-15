<?php

echo "soy un baboso\n";
// 32 letras en total hexadecimal
//cada letra es un bit (0101)2 (5)16
//dos bits es un byte (1100 0101)2 (C5)16
//32 letras son los 16 bytes del unique identifier de sql
//Significa 8 "clusters" de hexadecimales
//      C12A-587B-64CF-47DE=F215-1234-E7D2-26CB
$hexVar="C12A587B64CF47DEF2151234E7D226CB";
include 'phpqrcode/qrlib.php';

// $path variable store the location where to 
// store image and $file creates directory name
// of the QR code file by using 'uniqid'
// uniqid creates unique id based on microtime
$path = 'images/';
$file = $path."jaja".".png";
//El          ^^uniqid^^
//es una variable generada al azar, esto lo podemos cambiar por algo relacional
//a la base de datos, ya sea a el evento o asi para guardar la foto en la base de datos, o le ponemos siempre el mismo
// nombre ya que siempre deberia haber solo una de todos modos


// $ecc stores error correction capability('L')
$ecc = 'L';
$pixel_Size = 15;   //Que tan grande quieres el codigo
$frame_Size = 3;    //Es como si fuera un "padding" 
                    //espacio en blanco afuera del QR

// Generates QR Code and Stores it in directory given
QRcode::png($hexVar, $file, $ecc, $pixel_Size, $frame_Size);

// Displaying the stored QR code from directory
echo "<center><img src='".$file."'></center>";
?>
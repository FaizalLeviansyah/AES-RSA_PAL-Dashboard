<?php
session_start();
include "../config.php";
include "RSA.php"; // Make sure RSA class is correctly included

$idfile    = mysqli_escape_string($connect, $_POST['fileid']);
$pwdfile   = mysqli_escape_string($connect, substr(md5($_POST["pwdfile"]), 0, 16));
$query     = "SELECT password FROM file WHERE id_file='$idfile' AND password='$pwdfile'";
$sql       = mysqli_query($connect, $query);

if (mysqli_num_rows($sql) > 0) {
    $query1 = "SELECT * FROM file WHERE id_file='$idfile'";
    $sql1   = mysqli_query($connect, $query1);
    $data   = mysqli_fetch_assoc($sql1);

    $file_path  = $data["file_url"];
    $file_name  = $data["file_name_source"];
    $file_size  = filesize($file_path);

    // Generate RSA keys or use existing keys
    $privateKey = "MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDi8574kFX/OBQs
9SZyy25pzI0vsjELetQhk5gPuekCYqDDAGvKZT2HukcQNT+ChYSMtp7JBofSNtE6
NOgjZPG++Io2ChCIKFHOIS7JcxcesCI6b50savlKarnE1yscsBOrLzClz286Wzm8
g4hjQqKTmf26/F/NRcjcwOLKv2ANmpJS87Uc38PsIG0Qh1+HbzOdHqQXsWaiUrCk
qc5uVU5FiphifUuqS7+phr4cmKFkq1ZDKfzzYn0DGaKq4VduFJCVg2tS5NzoX5co
W1laj+A/m3Vsohzu9PtaYaOwD311YLf4t4/I086JemfvF8z1jiMvb9gZreUvLdEN
TJJgKlRTAgMBAAECggEALhFTqJLr0eWZOtL8XfrrS7CIzDC4geMJ4lLqX+7V3HUW
ut6AAtJwHffy6thULvNZR5LeQmH/+ezEpbMNl/mqlKAwte1vE6RTjqrvq1agT8ti
90emuNhyB+gIE2u1xZn8NBhdIJstscPIwXpVmghxpdJxTZ5i9/D9Z8oDfzI/liLz
OJwiTs2yNGm8VgSu+PXB1VE+l7gfhJB9sI0LeZ9gxm8LYEctiXlQHtZNAuPSHQ54
4GcxX3FbSmvdWu9DWKZhFnoBVK8g/SGMjXbpu62nqbqboPC96wkNZIZN66xes++W
hjasKMMQeBNuyw/4wnHY1SzlDHeeAvZW3+bFPUCocQKBgQD6oWvWxpAIG5TVIwR1
VySazpNK+NzAImtWxrkw1kElygafzWYYB/sntNyi0HYozcKr9OrDwhVoeCTuwJ8o
IcNAp3SD6CaQl7uvapbwCiIwJzsoOfBrXQf2Qdz9bEsg8/6sei32XBSasD7YDd9Y
GSSPXIsHpvo0UxjqklT3cdB/mwKBgQDn0FVMJLNvfeAKPZWZxpcsAETNWoLXLFPr
aCdiBY825lJsBQVisRjQTHJNdlbpCINKUfDAaAkdyLm0pnNnqjGuNT06OpsWmcGa
vyTRpH9AOUcfsfcgvuFA87rZwvGOyJRR7iq4Zh9qv5Uk86kc7ZrMNShk4zoKrbKH
fQh6soE1qQKBgQCQua3f9AEv7V1gRjxI1e1ZR3hejp5KhJWfIlnGDbLI84Qnux/9
OH6bSyEtE1tn7IlBasg2Clj6XoZVJ/2/2t848nmhweijDjte7BoEupVLYRwT+oEO
PkZeuWG3JVWszbh+OH9aB4oOWT+w2zHhWYN3FWVjIdTRajq1GZLe4GYZiQKBgQCg
jfO2BClfTBBzJ0pJMnmbmSgODuVWQLZy8jVst6sEfCuT8zpSq5QjGP+F1TPGvQWp
4OzdZnEB9vdgPnTp1MAKB4e7n8GwupeUJVVL+iHEiqdPNYSTYoFC6kx87H8/xH6t
7EYcZ2bVGZIkALsddRfk3eB3V8XohXuESb4otR+22QKBgQDFYsZSa295dT7njj+B
SQw9Vc9DoqxZspf0FpmD0KI1+pvT1LV58svTOH0D6biR0RCeCPyroKGwzysPU80R
VBPH2HMBljuWd3gklyKl3ibfAgB9kSLaQ0q4EK/ZG4IZ5tuefZwaHI1sDSDsdnFr
n3Yxycz05wQF3e5NBu41xYLfTg==";
    $publicKey  = "-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4vOe+JBV/zgULPUmcstu
acyNL7IxC3rUIZOYD7npAmKgwwBrymU9h7pHEDU/goWEjLaeyQaH0jbROjToI2Tx
vviKNgoQiChRziEuyXMXHrAiOm+dLGr5Smq5xNcrHLATqy8wpc9vOls5vIOIY0Ki
k5n9uvxfzUXI3MDiyr9gDZqSUvO1HN/D7CBtEIdfh28znR6kF7FmolKwpKnOblVO
RYqYYn1Lqku/qYa+HJihZKtWQyn882J9AxmiquFXbhSQlYNrUuTc6F+XKFtZWo/g
P5t1bKIc7vT7WmGjsA99dWC3+LePyNPOiXpn7xfM9Y4jL2/YGa3lLy3RDUySYCpU
UwIDAQAB
-----END PUBLIC KEY-----";
    
    $rsa        = new RSA($publicKey, $privateKey);

    // Open the encrypted file for reading
    $fopen1 = fopen($file_path, "rb");
    // Prepare a file to write the decrypted content
    $cache  = "hasil_dekripsi/$file_name";
    $fopen2 = fopen($cache, "wb");

    // Set execution and memory limits
    ini_set('max_execution_time', -1);
    ini_set('memory_limit', -1);

    // Decryption loop
    while ($filedata = fread($fopen1, 256)) {
        $plain = $rsa->decrypt($filedata);
        if ($plain === false) {
            fclose($fopen1);
            fclose($fopen2);
            echo "<script language='javascript'>
                window.alert('Error: Decryption failed. Possible key mismatch or data corruption.');
                window.location.href='decrypt-file.php?id_file=$idfile';
                </script>";
            exit;
        }
        fwrite($fopen2, $plain);
    }

    // Close file resources
    fclose($fopen1);
    fclose($fopen2);

    // Store the path to the decrypted file in the session
    $_SESSION["download"] = $cache;

    // Redirect and alert the user of successful decryption
    echo("<script language='javascript'>
        window.open('download.php', '_blank');
        window.location.href='dekripsi.php';
        window.alert('Berhasil mendekripsi file.');
        </script>");
} else {
    echo("<script language='javascript'>
        window.location.href='decrypt-file.php?id_file=$idfile';
        window.alert('Maaf, Password tidak sesuai.');
    </script>");
}
?>

<?php
session_destroy();
echo "<script>alert('Anda telah berhasil logout !');</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
?>
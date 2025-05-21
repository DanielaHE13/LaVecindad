<?php
session_start();
session_destroy();

// Redirigir al index con indicador de logout
header("Location: ../index.php?logout=1");
exit();


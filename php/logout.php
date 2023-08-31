<?php
session_start();
session_destroy();
echo "<script>alert('logout');location.href='../index.html'</script>"
?>
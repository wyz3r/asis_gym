<?php
echo "Hola mundo ";
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
        echo "primera vez";
}
else
{
        echo "mas de primera";
}
?>
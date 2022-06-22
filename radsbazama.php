<?php 
    
    $dbname = 'prezime';
    $db = new PDO('mysql:host=rp2.studenti.math.hr;dbname=' . $dbname . ';charset=utf8', 'ime', 'pass');


    $st = $db->query('SELECT JMBAG,Ime,Prezime FROM Studenti');

    foreach($st->fetchAll() as $row)
    {
        echo "JMBAG = " . $row['JMBAG'];
        echo " Ime = " . $row['Ime'];
        echo " Prezime = " . $row['Prezime'];
        echo "<br>";
    }


?> 

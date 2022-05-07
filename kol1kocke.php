<?php
class kocke{

    public $kockice=array(10);


    function __construct()
    {
        $kockice = array(10);
    }

    function ispiskockica()
    {
        echo '<table>';
        foreach ($this->kockice as $value)
        {
            echo '<tr>';
            for($i=1;$i<=$value;$i++)
            {
                echo '<td>';
                echo 'k';
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<br><br>';
    }


    function ispisforme(){?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <style>
            th,td{
           border: 1px solid;
            }
        </style>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            
            <form action="kol1kocke.php" method="get">
                
                <input type="radio" value="dodaj" name="rad" checked>Dodaj</radio>
                <input type="text" name="dodajkocke" id="dodajkocke"> kocaka u red broj <!--dodaj padajuci-->
                <select name="broj1">
                <?php 
                $i=1;
                foreach ($this->kockice as $value)
                {
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                    $i++;
                }
                ?>
                </select>
                <br>
                <input type="radio" value="ukloni" name="rad">Ukloni</radio>
                <input type="text" name="uklonikocke" id="uklonikocke"> kocaka iz reda broj <!--dodaj padajuci-->
                <select name="broj2">
                <?php 
                $i=1;
                foreach ($this->kockice as $value)
                {
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php
                    $i++;
                }
                ?>
                </select>
                <br>
                <input type="radio" value="dodajred" name="rad">Dodaj novi red!</radio>
                <br>
                <button type="submit" name="save">Napravi</button>
                <button type="submit" name="krajigre">Kraj igre</button>
            </form>
    
        </body>
        </html>
<?php
    }
}




// --------------------------------------------------------------------------------------------

session_start();

if( isset($_GET['krajigre'])){
    echo "kliknut je kraj igre";
	session_destroy();
    exit();
    
}


if( !isset( $_SESSION['igra'] ) )
{
	$igra = new kocke();
	$_SESSION['igra'] = $igra;
}
else
{
	$igra = $_SESSION['igra'];
}

$t;
if(isset($_GET['rad']))
{
    $t = $_GET['rad'];

    if($t === 'dodajred')
    {
        array_push($igra->kockice,10);
    }
    else if ($t === 'ukloni')
    {
        $redred = (int)$_GET['broj2'];
        $brojbroj = (int)$_GET['uklonikocke'];
        if($igra->kockice[$redred-1] - $brojbroj >=0)
        {
            $igra->kockice[$redred-1] = $igra->kockice[$redred-1] - $brojbroj;
        }

    }
    else if ($t === 'dodaj')
    {
        $redred = (int)$_GET['broj1'];
        $brojbroj = (int)$_GET['dodajkocke'];
        if($igra->kockice[$redred-1] + $brojbroj <=10)
        {
            $igra->kockice[$redred-1] = $igra->kockice[$redred-1] + $brojbroj;
        }

    }
}



$igra->ispiskockica();
$igra->ispisforme();



$_SESSION['igra'] = $igra;	


<?php
    
    if(isset($_POST['invia']))
    {
        $name = $_REQUEST['nome'];
        $value = $_REQUEST['valore'];
        $date = strtotime($_REQUEST['data']);
        setcookie($name, $value, $date, "/");
        header("Location: index.php");
    }
    else if(isset($_POST['elimina']))
    {
        foreach ($_COOKIE as $chiave => $valore) 
        {
            if(isset($_REQUEST[$chiave]))
                setcookie($chiave, "", null, "/");
        }
        header("Location: index.php");
    }
?>

<html>
<head>
            <title>
                Cookies
            </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>

	<body>
            <div class="table-responsive">
			
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
				    
				    <div class="container">
    					
    					<div class="row">
    						<div class="jumbotron text-center"><h2>Cookies</h2></div>
    					</div>
				
    				    <div class="row">
    				        <div class="col-sm-6">
                                <?php
                                    if(count($_COOKIE)>0)
                                    {
                                        foreach ($_COOKIE as $chiave => $valore) 
                                        {
                                            echo "<table class='table table-bordered'><tbody><tr><td>" . $chiave . "</td></tr>";
                                            echo "<tr><td>" . $valore . "</td></tr>";
                                            echo "<tr><td>Elimina <input type='checkbox' name=" . $chiave . "></td></tr></tbody></table>";
                                        }
                                        
                                        echo "<input type='submit' class='btn btn-default btn-block' name='elimina' value='Rimuovi cookies selezionati'>";
                                    }
                                ?>
                            </div>
                        
                        </div>
				
				        <br>
    					
    					<div class="row">
    					   <div class="col-sm-6">
        					   <table class="table table-bordered">
                                    <tbody>
                                      <tr>
                                        <td>Nome: </td>
                                        <td><input type="text" class="form-control" align="center" name="nome"></td>
                                      </tr>
                                      <tr>
                                        <td>Valore: </td>
                                        <td><input type="text" class="form-control" align="center" name="valore"></td>
                                      </tr>
                                      <tr>
                                        <td>Data di scadenza: </td>
                                        <td><input type="date" class="form-control" align="center" name="data"></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2"><input class="btn btn-default btn-block" align="center" type="submit" name="invia" value="Invia"></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                            
    				    </div>
                        
    				</div>		
				
				</form>
			
            </div>
	</body>
</html>
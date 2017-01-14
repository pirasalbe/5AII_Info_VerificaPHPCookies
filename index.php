<?php
    if(!isset($_COOKIE["cookies"]))
        $Cookie = "";
    else
        $Cookie = $_COOKIE["cookies"] . ",";
    
    $name=$valuee="";
    
    if(isset($_POST['invia']))
    {
        $name = $_REQUEST['nome'];
        $valuee = $_REQUEST['valore'];
        $Cookie = $Cookie . $name;
        setcookie("cookies", $Cookie, time() + (86400 * 30), "/");
        setcookie($name, $valuee, time() + (86400 * 30), "/");
    }
    else if(isset($_POST['elimina']))
    {
        $cookies="";
        foreach (explode(",", $Cookie) as &$c) 
        {
            if(isset($_REQUEST[$c]))
                setcookie($c, "", time() - (86400 * 30), "/");
            else if(strcmp($c,"") != 0)
            {
                if(strcmp($cookies,"") != 0)
                    $cookies = $cookies . ",";
                $cookies = $cookies . $c;
            }
        }
        
        $Cookie = $cookies;
        setcookie("cookies", $Cookie, time() + (86400 * 30), "/");
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
                                    if(strcmp($Cookie,"") != 0)
                                    {
                                        foreach (explode(",", $Cookie) as &$c) 
                                        {
                                            if(!isset($_COOKIE[$c]))
                                                $value = $valuee;
                                            else
                                                $value = $_COOKIE[$c];
                                            echo "<table class='table table-bordered'><tbody><tr><td>" . $c . "</td></tr>";
                                            echo "<tr><td>" . $value . "</td></tr>";
                                            echo "<tr><td>Elimina <input type='checkbox' name=" . $c . "></td></tr></tbody></table>";
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
                                        <td><input type="text" class="form-control" align="center" name="data"></td>
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
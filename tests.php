
    <head>
        <meta charset="UTF-8">
        <title>Wicklow Country house B&B</title>
        <link rel="icon" href="images/logo2.png" type="image" >
        <?php include_once 'includes/cdn.php';?>
          <link href="css/nav_css.css" rel="stylesheet" type="text/css"/>
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
         <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
         <link href="css/css.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Muli:100,300" rel="style">
	<link href="https://fonts.googleapis.com/css?family=Celtic+Hand:300" rel="style">
        <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
        <link href="css/footercss.css" rel="stylesheet" type="text/css"/>
    </head>    
    <body>
         <div class="container col-md-11">
            <?php

require_once("includes/database.php");
include_once 'includes/header.php';
        


class ConnectionTest {

	public $results = array();

	public function startOutput(){

		// Table and Table headers
		echo "<h2 style='text-align:center'>Results Table for Tests</h2><br>";
		echo "<table>";
		echo "<th class='col0' >No.</th>";
		echo "<th class='col1' >Function name</th>";
		echo "<th class='col2' >Outcome</th>";
		echo "<th class='col3' >Time(s)</th>";
	}

	public function endOutput(){

		// End of Results Table
		echo "</table>";

		// Statistics
		$count = 0;
		foreach( $this->results as $r ){
			if( $r === "T" ){
				$count += 1;
			}
		}

		$testsScore = round( $count/count($this->results), 4 )*100 . "% Tests Passed";
		echo "<h3>".$testsScore."</h3>";
	}

	public function formatter( $functionName, $result, $time ){
		
		// Add result to statistcs
		array_push( $this->results, $result );

		// Formatter function for Test Results
		$output  = "<tr><td>".count($this->results)."</td>";
		$output .= "<td>"	.$functionName			."</td>";
		$output .= "<td class='".$result."'>".$result 	."</td>";
		$output .= "<td>"		.round( $time, 8 ) 		."</td></tr>";

		echo $output;

	}

	public function makeCSS(){

		echo '
			<style>
			table, td, tr{
				border: 1px solid black;
			}
			td{
				padding: 3px;
			}
			h2, h3{
				padding-left: 25px;
			}
			.F{
				background-color: red;
			}
			.T{
				background-color: green;
			}
			.col1{
				min-width: 300px;
			}
			.col2{
				min-width: 100px;
			}
			.col3{
				min-width: 100px;
			}
			</style>
			';

	}

	public function testConnectionIsValid(){

		// Connection Test Example
		// Record start time of test
		$startTime = microtime(true);

		// Get DB Connection
		$connectionObj = new Connection();
		$db = $connectionObj->connectToDB();
		
		if( $db && get_class( $db ) === 'PDO'){
			// if result is a PDO object (success)
			$result = "T";
		}else{
			// any other outcome
			$result = "F";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
		
	}

	public function testGetListOfUsers(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$users = $connectionObj->getListOfusers();

		// Compare result to a value desired
		if( is_array($users) && sizeof($users) > 0 ){
			$result = "T";
		}else {
			$result = "F";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}

	public function testFindUserByID_Existing(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$user = $connectionObj->findUserByID( 1 );

		// Compare result to a value desired
		if( $user && $user->name === 'Kayleigh' ){
			$result = "T";
		}else {
			$result = "F";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}


	public function testFindUserByID_Unexisting(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$user = $connectionObj->findUserByID( 0 );

		// Compare result to a value desired
		if( $user ){
			$result = "F";
		}else {
			$result = "T";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}


	public function testFindUserByID_Null(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$user = $connectionObj->findUserByID( Null );

		// Compare result to a value desired
		if( $user ){
			$result = "F";
		}else {
			$result = "T";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}
        
        public function testValidClient(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$client = $connectionObj->validClient( 2 );

		// Compare result to a value desired
		if( $client && $client->firstName === 'Maggy' ){
			$result = "T";
		}else {
			$result = "F";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}
        
        public function testGetListOfClients(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$client = $connectionObj->getListOfClients();

		// Compare result to a value desired
		if( is_array($client) && sizeof($client) > 0 ){
			$result = "T";
		}else {
			$result = "F";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}
        
        public function testClientRes(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$res = $connectionObj->checkClientResRoom( 1 );

		// Compare result to a value desired
		if( $res && $res->roomID ==3){
			$result = "T";
		}else {
			$result = "F";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}
        
        public function testInvalidClientRes(){

		// Record start time of test
		$startTime = microtime(true);

		// Get result from a function
		$connectionObj = new Connection();
		$res = $connectionObj->checkClientResRoom( 2 );

		// Compare result to a value desired
		if( $res && $res->roomID ==10){
			$result = "F";
		}else {
			$result = "T";
		}

		// End time of test
		$endTime = microtime(true);
		$this->formatter( __FUNCTION__ , $result, $endTime-$startTime );
	}
        
}

// List of tests to run
$tests = [
	"testConnectionIsValid",
	"testGetListOfUsers",
	"testFindUserByID_Existing",
	"testFindUserByID_Unexisting",
	"testFindUserByID_Null",
        "testValidClient",
        "testGetListOfClients",
        "testClientRes",
        "testInvalidClientRes"
    
	];

$c = new ConnectionTest();

$c-> makeCSS();
$c-> startOutput();

// Loop through list of tests and call each function
foreach ( $tests as $test ){
	call_user_func( array($c, $test) );
}


$c-> endOutput();


?>
         </div>
        <?php include_once 'includes/footer.php';?>
    </body>
    </html>
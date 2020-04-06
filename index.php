<!DOCTYPE html>
<html>
<head>
	<title>Petals Game</title>
	<style type="text/css">
		body{
			background-color: tan;
			font-family: "Comic Sans MS";
			text-align: center;
		}
		.green{
			color: green;
		}
		.red{
			/*color: red;*/
		}
		.wrong-answer{
			background-color: red;
			color: white;
			border-radius: 5px;
			width: 50%;
			margin: auto;
			padding: 5px;
		}
	</style>
</head>
<body>
	<h1>Petals Around the Rose</h1>

	<?php 
		printGreeting();
		printDice();
		printForm();
	?>

	<?php

	function printGreeting()
	{
		global $guess, $numPetals;
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$guess = $_POST['guess'];
			$numPetals = $_POST['numPetals'];
		}

		if (empty($guess)) {
			echo "<h3> Welcome to Petals Around the Rose Game</h3>";
		}elseif ($guess == $numPetals) {
			echo "<h1 class='green' >You Got It!</h1>";
		}else{
			echo "<div class='wrong-answer' >";
			echo "<span class='red' >";
			echo "From last try you guessed: ".$guess."<br>";
			echo "The correct answer was: ".$numPetals." petals around the rose.";
			echo "</span>";
			echo "</div>";
		}

	}

	function printDice()
	{
		global $numPetals;

		echo "<hr>";

		echo "<h3> New Dice Set:</h3>";

		$numPetals = 0;


		$die1 = rand(1,6);
		$die2 = rand(1,6);
		$die3 = rand(1,6);
		$die4 = rand(1,6);
		$die5 = rand(1,6);

		showDie($die1);
		showDie($die2);
		showDie($die3);
		showDie($die4);
		showDie($die5);

		addPetals($die1);
		addPetals($die2);
		addPetals($die3);
		addPetals($die4);
		addPetals($die5);


	}

	function showDie($value)
	{
		echo "<img style='margin: 5px;' src='".$value.".png'>";
	}

	function addPetals($value)
	{
		global $numPetals;

		switch ($value) {
			case 3:
				$numPetals += 2;
				break;
			
			case 5:
				$numPetals += 4;
				break;
		}
	}

	function printForm(){
  		global $numPetals;

  		echo "<h3>How many petals around the rose?</h3>";
?>
		<form method="post">
			<input type="text" name="guess" autofocus="" placeholder="Your answer here..." >
			<input type="hidden" name="numPetals" value="<?php echo($numPetals) ?>">
			<br>
			<input type="submit" value="Submit Guess" >
		</form>
<?php

	} // end printForm

?>
	
</body>
</html>
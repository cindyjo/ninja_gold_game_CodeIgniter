<html>
<head>
	<title>Ninja Money</title>
	<style type="text/css">
		*{
			font-family: sans-serif;
		}
		#wrapper {
			width: 970px;
			height: auto;
			overflow: auto;
		}
		#gold {
			border: 1px solid silver;
			padding: 4px;
			display:inline-block;
			width: 80px;
		}
		.places {
			border: 1px solid silver;
			margin: 5px;
			text-align: center;
			padding: 20px;
			width: 180px;
			display: inline-block;
		}
		.places input, #reset input {
			color: white;
			background-color: black;
			padding: 5px;
			width: 80px;
		}
		#activity p{
			font-size: .85em;
		}
		#activity {
			margin-bottom: 10px;
		}
		#box{
			border: 1px solid silver;
			width: 940px;
			height: 80px;
			overflow: scroll;
		}
		.red {
			color: red;
			margin: 0px;
		}
		.green {
			color: green;
			margin: 0px;
		}
		#reset input {
			margin-left: 860px;
		}
	</style>


</head>
<body>
	<div id="Wrapper">
		<p>Your Gold: <span id="gold"><?=$this->session->userdata('gold')?></span></p>	
		<div id = "middle">
			<div class="places">
				<h3>Farm</h3>
				<p>(earns 10-20 golds)</p>
				<form action="/process_money" method="post">
					<input type="hidden" name="building" value="farm" />
					<input type="submit" value="Find Gold!"/>
				</form>
			</div> 
			<div class="places">
				<h3>Cave</h3>
				<p>(earns 5-10 golds)</p>
				<form action="/process_money" method="post">
					<input type="hidden" name="building" value="cave" />
					<input type="submit" value="Find Gold!"/>
				</form>
			</div>
			<div class="places">
				<h3>House</h3>
				<p>(earns 2-5 golds)</p>
				<form action="/process_money" method="post">
					<input type="hidden" name="building" value="house" />
					<input type="submit" value="Find Gold!"/>
				</form>
			</div>
			<div class="places">
				<h3>Casino</h3>
				<p>(earns/take 0-50 golds)</p>
				<form action="/process_money" method="post">
					<input type="hidden" name="building" value="casino" />
					<input type="submit" value="Find Gold!"/>
				</form>
			</div>		
		</div><!-- end of middle -->
		<div id="activity">
			<p>Activities:</p>
			<div id="box">			
<?php 			if(isset($this->session->userdata['log']))
				{
					for($i= count($this->session->userdata['log'])-1; $i >=0; $i--)
					{?>
						<p class="<?=$this->session->userdata['log'][$i]['color']?>">Earned <?=$this->session->userdata['log'][$i]['gold']?> golds from the <?=$this->session->userdata['log'][$i]['location']?>! (<?=$this->session->userdata['log'][$i]['time']?>)</p>
<?php				}
				}?>
			</div>
		</div>
		<div id="reset">
			<form action="/destroy" method="post">
				<input id = "reset" type="submit" value="Reset">
			</form>
		</div>
	</div>
</body>
</html>
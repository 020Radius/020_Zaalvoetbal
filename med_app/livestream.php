<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">
<style>
.badge {
	font-size: 26px;
	line-height: 32px;
	margin-left: 20px;
}

.now {
    font-size: 3em;
    font-weight: bold;
}

#wedstrijdschema tr:nth-of-type(1) {
    display: none;
}


</style>
</head>
<body>
	<div class="container">
		<div id="loading"></div>
		<h1 class="text-center">Live stream voetbaltoernooi AMO1</h1>
		<div class="col-md-8">
			<iframe width="100%" height="500" src="http://www.ustream.tv/embed/17699591?v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;">    </iframe>
<br /><a href="http://www.ustream.tv/" style="padding: 2px 0px 4px; width: 400px; background: #ffffff; display: block; color: #000000; font-weight: normal; font-size: 10px; text-decoration: underline; text-align: center;" target="_blank"></a>
            <div>

                <h2>Nu speelt:</h2>
                <table class="table">
                    <tbody class="nowplaying">
                      
                    </tbody>
                </table>
            </div>
            <div class="wedstrijdschema">
                <h2>Komende wedstrijden</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Wedstrijdnr</th>
                            <th>team</th>
                            <th>vs.</th>
                            <th>team</th>
                        </tr>
                    </thead>
                    <tbody id="wedstrijdschema">
                   	     
                    </tbody>
                </table>
            	
            	<table class="table table-striped">
            		<h2>Gespeelde wedstrijden</h2>
            		<thead>
            			<tr>
            				<th>wedstrijdnr</th>
            				<th>team</th>
            				<th>vs</th>
            				<th>team</th>
            				<th>score</th>
            			</tr>
            		</thead>
            		<tbody id="gespeelde_wedstrijden">
            		
            		</tbody>
            	</table>
            </div>

            
		</div>
		<aside class="col-md-4">
			<div class="poule">
				<h2>Real-time Poulestanden</h2>
				<table class="table table-striped">
					<thead>
						<legend>Poule A</legend>
						<tr>
							<th></th>
							<th>Team</th>
							<th>Punten</th>
						</tr>
					</thead>
					<tbody id="poule-a">
					
					</tbody>
				</table>
					
				<table class="table table-striped">
					<thead>
						<legend>Poule B</legend>
						<tr>
							<th></th>
							<th>Team</th>
							<th>Punten</th>
						</tr>
					</thead>
					<tbody id="poule-b">
				
					</tbody>
				</table>	
					
			</div>
			<div class="topscorer">
				
			</div>
		</aside>
	</div>
	
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
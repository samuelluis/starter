<html>
	<head>
		<title>Starter</title>
		<!-- Style Sheets -->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- Java Scripts -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jqueryui.js"></script>
		<script type="text/javascript" src="js/datatable.js"></script>
		<script type="text/javascript" src="js/base.js"></script>
	</head>
	<body class="container_16">
		<div id="connection" class="grid_8 push_4 section">
			<fieldset>
				<div class="field" id="connection_server_field">
					<label>
						<div class="label">Server:</div>
						<input name="connection_server" id="connection_server" value="localhost" />
					</label>
				</div>
				<div class="field" id="connection_port_field">
					<label>
						<div class="label">Port:</div>
						<input name="connection_port" id="connection_port" value="8889" />
					</label>
				</div>
				<div class="field" id="connection_user_field">
					<label>
						<div class="label">User:</div>
						<input name="connection_user" id="connection_user" value="root" />
					</label>
				</div>
				<div class="field" id="connection_pass_field">
					<label>
						<div class="label">Password:</div>
						<input name="connection_pass" id="connection_pass" value="root" />
					</label>
				</div>
				<div class="grid_4 push_2">
					<button onclick="test();">Test</button>
					<button onclick="connect();">Connect</button>
				</div>
			</fieldset>
		</div>
		<div id="databases"  class="grid_8 push_4 section">
			<fieldset>
				<table>
					<thead>
						<tr><th>Database</th><th>&nbsp;</th></tr>
					</thead>
					<tbody></tbody>
				</table>
			</fieldset>
		</div>
		<div id="tables"  class="grid_8 push_4 section">
			<fieldset>
				<table>
					<thead>
						<tr><th>Tables</th><th>&nbsp;</th></tr>
					</thead>
					<tbody></tbody>
				</table>
				<br>
				<div class="grid_5 push_1">
					<button onclick="generate();">Generate</button>
					<button class="push_1" onclick="configure();">Configure</button>
				</div>
			</fieldset>
		</div>
	</body>
</html>
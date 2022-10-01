<?php

	if (array_key_exists( 'username', $_POST )) {
		$_SESSION['user'] = $_POST['username'];
	}

	$user = $_SESSION['user'];

	include 'connect'

	include 'addOnlineUser.php';
?>
<html>
<head>
	<title><?php echo $user; ?> -- Chatting</title>
	<script src="../script/prototype.js"></script>
	<script src="../script/underscore.js"></script>
	<link rel="stylesheet" href="../script/style.css">
</head>
<body>
	<h1>You're chatting as <b><?php echo $user; ?></b></h1><br/><br/>	

	<div id="chat" class="messages" ></div>
	<div id="Online Users" class="center" ></div>


	<script>
		function process(e) {
			var code = (e.keyCode ? e.keyCode : e.which);

			if (code == 13 && (document.getElementById("messageText").value != "")) {
				event.preventDefault();
				document.getElementById("submitMessage").click();
			}
		}

				
		function scroll() {
			var messageBox = document.getElementById("chat");
			messageBox.scrollTop = messageBox.scrollHeight;
		}	

		function addmessage() {
			var user = '<?php echo $user ?>';
			var theMessage = _.escape(document.getElementById("messageText").value);

			new Ajax.Updater( 'chat', 'add.php', {
				method: 'post',
				parameters: { message : theMessage, username : user},
				onSuccess: function() {
					$("messagetext").value = "";
				}
			});
			document.getElementById("messageText").value = "";
			scroll();
		}

	</script>

	</br></br>

	<form id="chatmessage" class="center">	
		<textarea onkeypress="process(event, this)" name="message" id="messageText"></textarea>
	</form>

	<button onclick="addmessage()" class="center" id="submitMessage">Send</button>

	<div class="server_time_display">
		<p>Server Time: <span id="Server Time"></span></p>
	</div>
	<script>
		
		function getServerTime(){
			new Ajax.Request("server_time.php", {
				method : 'post',
				asynchronous : true,
				onSuccess : function (result) {
					document.getElementById("Server Time").innerHTML = result.responseText;
				}
			});
		}

		function getOnlineUsers() {
			new Ajax.Request("onlineUsers.php", {
				method : 'post',
				asynchronous : true,
				onSuccess : function (result) {
					document.getElementById("Online Users").innerHTML = result.responseText;
				}
			})
		}

		//This function works as the primary loop for the other key functions
		function getMessages() {
			var user = '<?php echo $user ?>';
			new Ajax.Updater( 'chat', 'messages.php', {
				method: 'post',
				parameters: {username : user},
				onSuccess: function() {	
					window.setTimeout( getMessages, 1000);
					getServerTime();
					getOnlineUsers();
				}
			});
			scroll();
		}
		getMessages();

		window.onunload = (event) => {
			console.log('d');
			exit();
		}

		function exit() {
			var user = '<?php echo $user?>';

			console.log('ye');
			new Ajax.Request("removeOnlineUser.php", {
				method : 'post',
				asynchronous : false,
				parameters: {username : user}
			});
		}

		

	</script> 
	
</body>
</html>

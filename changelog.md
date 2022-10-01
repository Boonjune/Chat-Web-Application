#CHANGE LOG

## VERSION 1 -- 19/12/20

Basic version of the chat server. All of source code in verison was made using guide from the below IBM server.

https://www.ibm.com/developerworks/web/library/x-ajaxxml8/index.html?ca=drs-

## VERSION 2 -- 26/12/20

Added
	- CSS
		Created CSS file which is used across index and chat pages

Changed

	- Moved prototype.js
		Moved from /pages/ to /script/. Changes to the chat.php soruce code where made to work with new location
		
## VERSION 3 -- 30/12/20

Added
	- Javascript scroll() function in chat.php page 
		This function scrolls the chat window to the bottem. This function is called everytime a message is added and the message div is updated. This means that the div is allways scrolled to the bottem showing the most recent messages

	- Contextual place of text within the message window (div in chat.php)
		Messages will now appear in a format which is simmlar to popular messaging platforms
	
	- UI in chat.php updated
		Screen elements are new center to the windows
		Heading at the top will display what username is being used as well as in the title of the page
		
Fixed
	- Made adjustments to the php code in messages.php
		Sight adjustments in the code where made to slightly improve exercution time and readability of the source code 

## VERSION 4 -- 3/12/20

Added
	- Enter Can now be used as an alternaive to pressing the send button
Fixed
	- Display issue in add.php
		add.php's code had not been updated to correctly display the table. This would result in a blank screen when ever the user sent a message 
	- HTML safe encoding of user inputs in chat.php
		The user can post characters like ' " & $ without it causing unintended side effects
	- Text Area now clears when the user posts the message
		When the user posts the message, the input feild where the message is intally store will now become blank

## VERSION 5 -- 3/12/20

Added
	- Server Time
		A new div tag is was created to show the current time on the server. This feature 

	- Message Time Stamps
		Each new message will now have a time stamp showing when it was posted


## VERSION 6 -- 15/12/20

Added
	- Activity User List
		A div now displays which users are currently in the server
	- Features set
		index.html now contains a list of features I'm planning to add	
		
## VERISON 7 -- 1/10/22

CHANGED
	- Corrected spelling issues and changed phrasing throughout the changelog.md and the readme.md files.
	
	- Removed unessessary comments throughout the source code. These comments where used for debugging the application.

	- Removed features_to_add.txt

	- Created a new dbconnect.php and refactored database connectivity in source files
		Previously each php which required the use of a database implemented the boiler plate code to connect to the database. This included the username/password of the account used on the database. Should this need to change, then each implementation of this boiler plate code would need to updated. This change addresses this issue.
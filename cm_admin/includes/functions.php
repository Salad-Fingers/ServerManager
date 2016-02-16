<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','xxxxxxx');
define('DB_NAME','cmv1');





$connection = mysql_connect(DB_HOST,DB_USER,DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());


// Post stuffs
function getPosts() {
	$query = mysql_query("SELECT * FROM cm_posts") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($post = mysql_fetch_assoc($query)) {
			echo "<tr><td>" . $post['ID'] . "</td><td>" . $post['Title'] . "</td><td>" . $post['Author'] . "</td><td>" . $post['PostedOn'] . "</td><td><div class='col-md-3 col-sm-4'><a href=\"deletepost.php?id=" . $post['ID'] . "\"><i class='fa fa-fw fa-trash'></i></a></div></td>";
		}
	}
}
	
function addPost($pName, $pAuth, $pContent, $pCats = null, $PostedOn)
{ 
$PostedOn = date("Y, F j G:i");  // ex:. March 10, 2001, 5:16 pm
echo $sql = "INSERT INTO cm_posts VALUES(null,'$pName','$pAuth','$pContent','$pCats','$PostedOn')"; $query = mysql_query($sql) or die(mysql_error()); 
}


function deletePost($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_posts WHERE ID = '$id'") or die(mysql_error());
	header("Location: posts.php");
}

function getPostNum() {
	$result = mysql_query("SELECT * FROM cm_posts");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}

function getUser($usern) {
	$res = mysql_query("SELECT * FROM cm_users WHERE Username='$usern'");
	return mysql_fetch_assoc($res);
}

function getUSGNavatar($id) {
	$id = intval($id);
	$query = mysql_query("SELECT * FROM cm_users WHERE ID = $id") or die(mysql_error());
	if (mysql_num_rows($query) == 0) return;
	
	$row = mysql_fetch_assoc($query);
	
    $ch = curl_init('http://www.unrealsoftware.de/getuserdata.php?id='.$row['USGN'].'&data=avatar');
    curl_exec($ch);
	
    if(!curl_errno($ch)) {
        $info = curl_getinfo($ch);
    }
    curl_close($ch);
}

function getUSGNname($id) {
	$id = intval($id);
	$query = mysql_query("SELECT * FROM cm_users WHERE ID = $id") or die(mysql_error());
	if(mysql_num_rows($query) == 0) return;
	
	$row = mysql_fetch_assoc($query);
	
	$ch = curl_init('http://www.unrealsoftware.de/getuserdata.php?id='.$row['USGN'].'&data=name');
	curl_exec($ch);
	
	if(!curl_errno($ch)) {
	 $info = curl_getinfo($ch);
	}
	curl_close($ch);
	
}

// Admin News

function addNews($mSentDate, $mTime, $mSender, $mCat, $mContent)
{ 
$mSentDate = date("Y-m-d");  // ex:. 2015-06-07
$mTime = date("H:i"); // ex:. 14:42
echo $sql = "INSERT INTO cm_news VALUES(null,'$mSentDate','$mTime','$mSender','$mCat','$mContent')"; $query = mysql_query($sql) or die(mysql_error()); 
}



function getNews() {;

	$query = mysql_query("SELECT * FROM cm_news") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($post = mysql_fetch_assoc($query)) {
			echo "<li class='time-label'><span class='bg-blue'><i class='fa fa-calendar'></i> " . $post['SentDate'] . "</span></li><li><div class='timeline-item'><span class='time blue'><i class='fa fa-clock-o'></i> " . $post['SentTime'] . "</span><h3 class='timeline-header'><div class='user-block'><b><a href='#'>" . $post['Sender'] . "</a></b>
                      <h6>Shared with <i class='fa fa-envelope'></i><span class='text-muted'><span class='text-green'> Support Staff</span></span></h6>
                      </div></h3><div class='timeline-body'>" . $post['Content'] . "</div><div class='timeline-footer'><a class='btn btn-danger btn-xs' href=\"deletenews.php?id=" . $post['ID'] . "\">Remove</a>&nbsp;<a class='btn btn-warning btn-xs' href=\"#?id=" . $post['ID'] . "\">Mark Read</a></div></div></li>";
		}
	}
}

function deleteNews($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_news WHERE ID = '$id'") or die(mysql_error());
	header("Location: news.php");
}

function getNewsNum() {
	$result = mysql_query("SELECT * FROM cm_news");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}


// Users stuffs
function getUsers() {
	
	$query = mysql_query("SELECT * FROM cm_users") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($users = mysql_fetch_assoc($query)) {
			
			echo "<tr><td>" . $users['ID'] . "</td><td>" . $users['Username'] . "</td><td>" . $users['Email'] . "</td><td>" . $users['USGN'] . "</td><td>" . $users['Full_Name'] . "</td><td>" . $users['RegisterDate'] . "</td><td><div class='col-md-3 col-sm-4'><a href=\"deleteuser.php?id=" . $users['ID'] . "\"><i class='fa fa-fw fa-trash'></i></a></div><a href=\"edituser.php?id=" . $users['ID'] . "\"><i class='fa fa-fw fa-edit'></i></a></td>";
		}
	}
}

function getUserNum() {
	$result = mysql_query("SELECT * FROM cm_users");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}

function addUser($cID, $cUsername, $cEmail, $cPassword, $cFullName, $RegisterDate, $Rights, $USGN) {
	$RegisterDate = date("Y-m-d");
	$query = mysql_query("INSERT INTO cm_users VALUES('$cID', '$cUsername', '$cEmail', md5('$cPassword'), '$cFullName', '$RegisterDate', '$Rights', '$USGN')") or die(mysql_error());
		
}


function deleteUser($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_users WHERE ID = '$id'") or die(mysql_error());
	header("Location: users.php");
}

function editUser($uID, $uName, $uEmail, $uPassword, $uFull_Name, $uRights, $uUSGN, $id) {
	$id = (int) $id;
	$query = mysql_query("UPDATE cm_users SET Username = '$uName', Email = '$uEmail', Password = md5('$uPassword'), Full_Name = '$uFull_Name', rights = '$uRights', USGN = '$uUSGN' WHERE ID = '$id'") or die(mysql_error());
} 

function userid($id) {
	$id = (int) $id;
	$query = mysql_query("SELECT * FROM cm_users WHERE ID = '$id'") or die(mysql_error());
	return mysql_fetch_assoc($query);
}

// Category Functions

function getCategories() {
	$query = mysql_query("SELECT * FROM cm_categories") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($cat = mysql_fetch_assoc($query)) {
			echo "<tr><td>" . $cat['ID'] . "</td><td>" . $cat['Title'] . "</td><td>" . $cat['Description'] . "</td><td><div class='col-md-3 col-sm-4'><a href=\"deletecat.php?id=" . $cat['ID'] . "\"><i class='fa fa-fw fa-trash'></i></a></div><a href=\"editcat.php?id=" . $cat['ID'] . "\"><i class='fa fa-fw fa-edit'></i></a></td>";
		}
	}
}

function getCategoriesNum() {
	$result = mysql_query("SELECT * FROM cm_categories");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}

function deleteCategory($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_categories WHERE ID = '$id'") or die(mysql_error());
	header("Location: categories.php");
}

function addCategory($cID, $cName, $cDesc) {
	$query = mysql_query("INSERT INTO cm_categories VALUES('$cID','$cName','$cDesc')") or die(mysql_error());
}

function editCategory($cID, $cName, $cDesc, $id) {
	$id = (int) $id;
	$query = mysql_query("UPDATE cm_categories SET Title = '$cName', Description = '$cDesc' WHERE ID = '$id'") or die(mysql_error());
}


function getCat($id) {
	$id = (int) $id;
	$query = mysql_query("SELECT * FROM cm_categories WHERE ID = '$id'") or die(mysql_error());
	return mysql_fetch_assoc($query);
}
// Website Informations

function getVersion() {
	$query = mysql_query("SELECT * FROM cm_configurations") or die(mysql_error());
		while($inf = mysql_fetch_assoc($query)) {
		echo "<a>" . $inf["version"] . "</a>";
	}
}
 
function getWebsiteName() {
	$query = mysql_query("SELECT * FROM cm_configurations") or die(mysql_error());
		while($inf = mysql_fetch_assoc($query)) {
		echo "" . $inf["name"] . "";
	}
}

// Server Functions
function getServerID($id) {
	$id = (int) $id;
	$query = mysql_query("SELECT * FROM cm_servers WHERE ID = '$id'") or die(mysql_error());
	return mysql_fetch_assoc($query);
}

function server_status($ip,$port){
	$status = @fsockopen("udp://".$ip, $port, $errno, $errstr);
	if ($status) {
		$return="<span class='badge bg-green'>ONLINE</span>";
	} else {
		$return="<span class='badge bg-red'>OFFLINE</span>";
	}
	return $return;
}

function server_status2($ip,$port){
	$status = @fsockopen("udp://".$ip, $port, $errno, $errstr);
	if ($status) {
		$request = chr(1) . chr(0) . chr(251) . chr(2);
		fwrite($status, $request);
		$read = fread($status, 15);
		if ($read != "") {$return="<nav><div class='nav-wrapper green'><h5 style='padding-left:10px; paddig-bottom:50px'>Online</h5></div></nav>";} else { $return="<nav><div class='nav-wrapper red'><h5 style='padding-left:10px; paddig-bottom:50px'>Offline</h5></div></nav>";}
	} else {
		$return=0;
	}
	return $return;
}


function getPort() {
	$query = mysql_query("SELECT * FROM cm_servers") or die(mysql_error());
		while($udp = mysql_fetch_assoc($query)) {
		echo "" . $udp["port"] . "";
	}
	
}

function getRconPass($id) {
	$query = mysql_query("SELECT * FROM cm_servers WHERE ID = '$id'") or die(mysql_error());
		while($pass = mysql_fetch_assoc($query)) {
		echo $pass["rcon"];
	}
	
}


function StartServer($id) {


	$query = mysql_query("SELECT * FROM `cm_servers` WHERE ID = '".mysql_real_escape_string($id)."' LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
		echo "<button class='btn btn-block btn-danger btn-xs'>Server couldn't start.</button><meta http-equiv='refresh' content='3; url=servers.php' /><br />";
	} else {
		while($srv = mysql_fetch_assoc($query))
		//$connection = ssh2_connect('127.0.0.1', 22);
		// ssh2_auth_password($connection, 'marci', 'football');
		echo getcwd();
		chdir("/home/masterserver");
		$var = shell_exec("./cs2d_dedicated");
		var_dump($var);
		}
		

		echo "<button class='btn btn-block btn-success btn-xs'>Server has been started successfully.</button><meta http-equiv='refresh' content='3; url=servers.php' /><br />";
	
}

function StopServer($id) {
	$query = mysql_query("SELECT * FROM `cm_servers` WHERE ID = '".mysql_real_escape_string($id)."' LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
		echo "<button class='btn btn-block btn-danger btn-xs'>Server couldn't stop.</button><meta http-equiv='refresh' content='3; url=servers.php' /><br />";
	} else {
		while($srv = mysql_fetch_assoc($query))
		passthru("cat ./_servers/pid_".$srv["ID"].".pid |xargs kill");
		}
		echo "<button class='btn btn-block btn-success btn-xs'>Server has been stopped successfully!</button><meta http-equiv='refresh' content='3; url=servers.php' /><br />";
}

function RestartServer($id) {
	StopServer($id);
	StartServer($id);
}


function SetupScript($id) {
	$query = mysql_query("SELECT * FROM `cm_servers` WHERE ID = '".mysql_real_escape_string($id)."' LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($query) == 1) {
		passthru("bash /var/www/cm_admin/_scripts/sh/admin.sh ".$id);
	}
}

function InstallMasterServer() {
	$output = passthru('bash /var/www/cm_admin/_scripts/masterserver.sh');
	echo "<b>$output</b>";
}			

function getServers() {
	$se = new StatsExtract;
	$query = mysql_query("SELECT * FROM cm_servers") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($srv = mysql_fetch_assoc($query)) {
			//$svinfo = $se->parse_htmlstats($srv['directory'].'/serverstats.html'); //this is how you do it when you extract it for the server
			$svinfo = $se->parse_htmlstats('serverstats.html'); //demo
			$sv = $se->parse_live_server_stats('212.224.76.67', (int)$srv['port']);
			$players = 0;
			if(!empty($sv)){$players=$sv['total-players'];}else{$players="0/?";}
			$server_status = "<span class='badge bg-red'>OFFLINE</span>";
			if(!empty($sv)){$server_status="<span class='badge bg-green'>ONLINE</span>";}
			echo "<tr><td>" . $srv['ID'] . "</td><td>" . $srv['name'] . "</td><td>" .  $srv['port'] . "</td><td>" . $srv['rcon'] . "</td><td>" .  $srv['directory'] . "</td><td>" .  $srv['userid'] . "</td><td>".$players."</td><td>".$svinfo['stats']['uptime']." h</td></td><td>".$server_status." </td><td><div class='btn-group btn-xs'>
                      <button type='button' class='btn btn-info'>Action</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
						<li><a href=\"?id=" . $srv['ID']. "&action=start\"><i class='fa fa-fighter-jet'></i>Start Server</a></li>
                        <li><a href=\"?id=". $srv['ID'] . "&action=stop\"><i class='fa fa-stop'></i>Stop Server</a></li>
						<li><a href=\"?id=". $srv['ID'] . "&action=restart\"><i class='fa fa-eject'></i>Restart Server</a></li>
						<li class='divider'></li>
						<li><a href=\"editrcon.php?id=" . $srv['ID'] . "\"><i class='fa fa-bomb'></i>Change rCON Password</a></li>
						<li><a href='#'><i class='fa fa-cloud'></i>Access WebFTP</a></li>
						<li><a href=\"viewstats.php?id=" . $srv['ID'] . "\"><i class='fa fa-image'></i>View Stats</a></li>
						<li><a href=\"statistics.php?id=" . $srv['ID'] . "\"><i class='fa fa-image'></i>View Stats (S:E)</a></li>
                        <li class='divider'></li>
						<li><a href=\"editserv.php?id=" . $srv['ID'] . "\"><i class='fa fa-edit'></i>Edit</a></li>
                        <li><a href=\"deleteserv.php?id=" . $srv['ID'] . "\"><i class='fa fa-remove'></i>Delete</a></li>
                      </ul>
                    </div></td>";
		}
	}
}

function ViewStats($id) {
        $id = (int) $id;
        $query = mysql_query("SELECT * FROM cm_servers WHERE ID = '".$id."'") or die(mysql_error());
        if(mysql_num_rows($query)!= 0) {
            while($srv = mysql_fetch_assoc($query)) {
                        echo "<br><br><br>";
                        include ($srv['directory']."/serverstats.html");
            }
        }
    }

function getServersNum() {
	$result = mysql_query("SELECT * FROM cm_servers");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}

function deleteServer($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_servers WHERE ID = '$id'") or die(mysql_error());
	header("Location: servers.php");
}

function addServer($svID, $svOwner, $svName, $svPort, $svMP, $svDir, $svrCON) {
	$svName = mysql_escape_string($svName);
	$query = mysql_query("INSERT INTO cm_servers (ID, userid, name, port, maxplayers, directory, rcon) VALUES ('','".$svOwner."','".$svName."','".$svPort."','".$svMP."','".$svDir."','".$svrCON."')") or die(mysql_error());	
}

function editServer($svID, $svName, $svPort, $svMP, $svDir, $id) {
	$id = (int) $id;
	$query = mysql_query("UPDATE cm_servers SET name = '$svName', port = '$svPort', maxplayers = '$svMP', directory = '$svDir' WHERE ID = '$id'") or die(mysql_error());
}

function getServ($id) {
	$id = (int) $id;
	$query = mysql_query("SELECT * FROM cm_servers WHERE ID = '$id'") or die(mysql_error());
	return mysql_fetch_assoc($query);
}

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 13; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}


// RCon Functions 

function editRCON($svID, $svRCON, $id) {
	$id = (int) $id;
	$query = mysql_query("UPDATE cm_servers SET rcon = '$svRCON' WHERE ID = '$id'") or die(mysql_error());
}


function getRcon($id) {
	$id = (int) $id;
	$query = mysql_query("SELECT * FROM cm_servers WHERE ID = '$id'") or die(mysql_error());
	return mysql_fetch_assoc($query);
}

// Invoice Functions

function getInv($id) {
	$id = (int) $id;
	$query = mysql_query("SELECT * FROM cm_invoices WHERE ID = '$id'") or die(mysql_error());
	return mysql_fetch_assoc($query);
}

function getInvoices() {
       
        $query = mysql_query("SELECT * FROM cm_invoices") or die(mysql_error());
        if(mysql_num_rows($query) == 0) {
        } else {
        while($inv = mysql_fetch_assoc($query)) {               
				echo "<tr><td>INV_" . $inv['id'] . "</td><td>" . $inv['client'] . "</td><td>$ " . $inv['amount'] . "</td><td>" . $inv['created'] . "</td><td>" . $inv['due'] . "</td><td>";
		if ($inv['status']=="Paid"){
				echo "<span class='badge bg-green'>" . $inv['status'] . "</span>";}
		elseif ($inv['status']=="Unpaid"){
				echo "<span class='badge bg-red'>" . $inv['status'] . "</span>";}
		elseif ($inv['status']=="Canceled"){
				echo "<span class='badge bg-black'>" . $inv['status'] . "</span>";}
		else {
				echo "<span class='badge bg-orange'>" . $inv['status'] . "</span>";}
                echo "</td><td><a href=\"deleteinvoice.php?id=" . $inv['id'] . "\"><i class='fa fa-fw fa-trash'></i></a><a href=\"editinv.php?id=" . $inv['id'] . "\"><i class='fa fa-fw fa-edit'></i></a></div><a href=\"view_invoice.php?id=" . $inv['id'] . "\"><i class='fa fa-fw fa-list-alt'></i></a></td>";
                }
        }
}
function editInvoice($invID, $invAmount, $invCreated, $invDue, $invStatus, $id) {
	$id = (int) $id;
	$query = mysql_query("UPDATE cm_invoices SET amount = '$invAmount', created = '$invCreated', due = '$invDue', status = '$invStatus' WHERE ID = '$id'") or die(mysql_error());
}

function deleteInvoice($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_invoices WHERE ID = '$id'") or die(mysql_error());
	header("Location: invoices.php");
}

function addInvoice($invID, $invClient, $invAmount, $invCreated, $invDue, $invStatus) {
	$query = mysql_query("INSERT INTO cm_invoices (id, client, amount, created, due, status) VALUES ('".$invID."','".$invClient."','".$invAmount."','".$invCreated."','".$invDue."','".$invStatus."')") or die(mysql_error());	
}

function SendInvoiceEmail($id) {
	$query = mysql_query("SELECT * FROM `cm_invoices` WHERE ID = '".mysql_real_escape_string($id)."' LIMIT 1") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
		echo "<button class='btn btn-block btn-danger btn-xs'>Something bad happened. Couldn't send email.</button><meta http-equiv='refresh' content='3; url=invoices.php' /><br />";
	} else {
		while($srv = mysql_fetch_assoc($query))
		require_once('./class.phpmailer.php');
		$mail             = new PHPMailer(); // defaults to using php "mail()"
		$mail->IsSendmail(); // telling the class to use SendMail transport

		$body             = "Your invoice has been attached.";
		$body             = eregi_replace("[\]",'',$body);

		$mail->SetFrom('info@cs2dservices.com', 'ServerManager');

		$address = "sqpp15@gmail.com";
		$mail->AddAddress($address, "Marcell Csendes");
		$mail->Subject    = "Invoice: INV1";
		$mail->MsgHTML($body);
		$mail->AddAttachment("_invoices/invoice-print.html");      // attachment
		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}
		echo "<button class='btn btn-block btn-success btn-xs'>Email has been sent.</button><br />";
	
}

function getInvoiceNum() {
	$result = mysql_query("SELECT * FROM cm_invoices");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}

// Package Manager Functions

function addPackage($pkgID, $pkgName, $pkgType, $pkgPayType, $pkgSetup, $pkgPrice) {
	$query = mysql_query("INSERT INTO cm_packages (id, name, type, paytype, setup, price) VALUES ('".$pkgID."','".$pkgName."','".$pkgType."','".$pkgPayType."','".$pkgSetup."','".$pkgPrice."')") or die(mysql_error());	
}

function deletePackage($id) {
	$id = (int) $id;
	mysql_query("DELETE FROM cm_packages WHERE ID = '$id'") or die(mysql_error());
	header("Location: packages.php");
}

function getPackages() {
	
	$query = mysql_query("SELECT * FROM cm_packages") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($pkg = mysql_fetch_assoc($query)) {
			echo "<tr><td>" . $pkg['id'] . "</td><td>" . $pkg['name'] . "</td><td>" . $pkg['type'] . "</td><td>" . $pkg['paytype'] . "</td><td>" . $pkg['setup'] . "</td><td>" . $pkg['price'] . "</td><td><a href=\"deletepackage.php?id=" . $pkg['id'] . "\"><i class='fa fa-fw fa-trash'></i></a><a href=\"editinv.php?id=" . $pkg['id'] . "\"><i class='fa fa-fw fa-edit'></i></a></div></td>";
		}
	}
}




// Order Functions

function newOrder($odrID, $odrBillstatus, $odrServicestatus, $odrPlan, $odrClient, $odrDiscount, $odrInvoice, $odrExpires, $odrCreated, $odrActivated, $odrNotes) {
	$query = mysql_query("INSERT INTO cm_orders (id, billstatus, servicestatus, plan, client, price, discount, invoice, expires, created, activated, notes) VALUES ('".$odrID."','".$odrBillstatus."','".$odrServicestatus."','".$odrPlan."','".$odrClient."','".$odrDiscount."','".$odrInvoice."','".$odrExpires."','".$odrCreated."','".$odrActivated."','".$odrNotes."')") or die(mysql_error());	
}

function cancelInvoice($odrID, $id) {
	$id = (int) $id;
	$query = mysql_query("UPDATE cm_invoices SET billstatus = 'inactive', servicestatus = 'inactive' WHERE ID = '$id'") or die(mysql_error());
}

function listOrders() {
	
	$query = mysql_query("SELECT * FROM cm_orders") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($order = mysql_fetch_assoc($query)) {
			echo "<tr><td>#" . $order['id'] . "</td><td>" . $order['client'] . "</td><td>";
			if ($order['billstatus']=="active"){
				echo "<span class='badge bg-green'>" . $order['billstatus'] . "</span>";}
			elseif ($order['billstatus']=="inactive"){
				echo "<span class='badge bg-red'>" . $order['billstatus'] . "</span>";}
			echo "</td><td>";
			if ($order['servicestatus']=="active"){
				echo "<span class='badge bg-green'>" . $order['servicestatus'] . "</span>";}
			elseif ($order['servicestatus']=="inactive"){
				echo "<span class='badge bg-red'>" . $order['servicestatus'] . "</span>";}
			
			
			
			echo "</td><td>" . $order['created'] . "</td><td>" . $order['expires'] . "</td><td width='340px'><a href='#'><button type='button' class='btn btn-danger'>Cancel</button></a> <a href=\"view.php?id=" . $order['id'] . "\"><button type='button' class='btn btn-info'>Manage</button></a> <button type='button' class='btn btn-warning'>Suspend</button> <button type='button' class='btn btn-success'>Renew</button></div></td>";
		}
	}
}

function getOrdersNum() {
	$result = mysql_query("SELECT * FROM cm_orders");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}


// Ticket Functions

class convertToAgo {

    function convert_datetime($str) {
	
   		list($date, $time) = explode(' ', $str);
    	list($year, $month, $day) = explode('-', $date);
    	list($hour, $minute, $second) = explode(':', $time);
    	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
    	return $timestamp;
    }

    function makeAgo($timestamp){
	
   		$difference = time() - $timestamp;
   		$periods = array("sec", "min", "hour", "day", "week", "month", "year", "decade");
   		$lengths = array("60","60","24","7","4.35","12","10");
   		for($j = 0; $difference >= $lengths[$j]; $j++)
   			$difference /= $lengths[$j];
   			$difference = round($difference);
   		if($difference != 1) $periods[$j].= "s";
   			$text = "$difference $periods[$j] ago";
   			return $text;
    }
	
} // END CLASS



function getTickets() {
       
        $query = mysql_query("SELECT * FROM cm_tickets") or die(mysql_error());
        if(mysql_num_rows($query) == 0) {
        } else {
        while($tic = mysql_fetch_assoc($query))
		{     
		$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions
		// Query your database here and get timestamp
		$ts = $tic['lastreply'];
		$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
		$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
				echo "<tr><td>#" . $tic['id'] . "</td><td><a href='./view_ticket.php?id=" . $tic['id'] . "'>" . $tic['subject'] . "</a></td><td>" . $tic['submitter'] . "</td><td>";
		if ($tic['status']=="Open"){
				echo "<span class='badge bg-green'>" . $tic['status'] . "</span>";}
		elseif ($tic['status']=="Closed"){
				echo "<span class='badge bg-red'>" . $tic['status'] . "</span>";}
		elseif ($tic['status']=="On Hold"){
				echo "<span class='badge bg-black'>" . $tic['status'] . "</span>";}
		else {
				echo "<span class='badge bg-orange'>" . $tic['status'] . "</span>";}
                echo "</td><td>$when</td><td>";
				if ($tic['department']=="1"){
				echo "General";}
				elseif ($tic['department']=="2"){
				echo "Sales";}
				elseif ($tic['department']=="3"){
				echo "Technical Support";}
				elseif ($tic['department']=="4"){
				echo "Billing";}
				echo "</td>";
                
				}
        }
}



function newTicket($id, $department, $subject, $submitter = null, $status = 'Open', $sent, $message)
{ 
$sent = date("Y-m-d H:i:s");  // ex:. March 10, 2001, 5:16 pm
echo $sql = "INSERT INTO cm_tickets VALUES('$id','$department','$subject','$submitter','$status','$sent','$message')"; $query = mysql_query($sql) or die(mysql_error()); 

		
}



function getTicketsNum() {
	$result = mysql_query("SELECT * FROM cm_tickets");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}

// Client Functions

function getClients() {
       
        $query = mysql_query("SELECT * FROM cm_clients") or die(mysql_error());
        if(mysql_num_rows($query) == 0) {
        } else {
        while($cid = mysql_fetch_assoc($query)) {               
				echo "<tr><td>cID" . $cid['id'] . "</td><td>" . $cid['username'] . "</td><td><a href=view_user.php>" . $cid['client_name'] . "</a></td><td>" . $cid['email'] . "</td><td>";
		if ($cid['country']=="ad"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Andorra";}
		elseif ($cid['country']=="ae"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> United Arab Emirates";}
		elseif ($cid['country']=="af"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ag"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Antigua and Barbuda";}
		elseif ($cid['country']=="ai"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Anguilla";}
		elseif ($cid['country']=="al"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Albania";}
		elseif ($cid['country']=="am"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Armenia";}
		elseif ($cid['country']=="an"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Netherlands Antilles";}
		elseif ($cid['country']=="ao"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Anga";}
		elseif ($cid['country']=="ar"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Argentina";}
		elseif ($cid['country']=="as"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> American Samoa";}
		elseif ($cid['country']=="at"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Austria";}
		elseif ($cid['country']=="au"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Australia";}
		elseif ($cid['country']=="aw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Aruba";}
		elseif ($cid['country']=="ax"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Aland Islands";}
		elseif ($cid['country']=="az"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Azerbaijan";}
		elseif ($cid['country']=="ba"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bosnia and Herzegovina";}
		elseif ($cid['country']=="bb"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Barbados";}
		elseif ($cid['country']=="bd"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bangladesh";}
		elseif ($cid['country']=="be"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Belgium";}
		elseif ($cid['country']=="bf"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Burkina Faso";}
		elseif ($cid['country']=="bg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bulgaria";}
		elseif ($cid['country']=="bh"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bahrain";}
		elseif ($cid['country']=="bi"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Burundi";}
		elseif ($cid['country']=="bj"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Benin";}
		elseif ($cid['country']=="bm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bermuda";}
		elseif ($cid['country']=="bn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Brunei Darussalem";}
		elseif ($cid['country']=="bs"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bahamas";}
		elseif ($cid['country']=="bt"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bhutan";}
		elseif ($cid['country']=="bv"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Bouvet Island";}
		elseif ($cid['country']=="bw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Botswana";}
		elseif ($cid['country']=="by"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Belarus";}
		elseif ($cid['country']=="bz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Belize";}
		elseif ($cid['country']=="ca"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Canada";}
		elseif ($cid['country']=="cc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cocos Islands";}
		elseif ($cid['country']=="cd"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Congo (Democratic)";}
		elseif ($cid['country']=="cg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Congo";}
		elseif ($cid['country']=="ch"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Switzerland";}
		elseif ($cid['country']=="ci"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cote d'lvoire";}
		elseif ($cid['country']=="ck"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cook Islands";}
		elseif ($cid['country']=="cl"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Chile";}
		elseif ($cid['country']=="cm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cameroon";}
		elseif ($cid['country']=="cn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> China";}
		elseif ($cid['country']=="co"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Colombia";}
		elseif ($cid['country']=="cr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Costa Rica";}
		elseif ($cid['country']=="cs"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Serbia and Montenegro";}
		elseif ($cid['country']=="cu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cuba";}
		elseif ($cid['country']=="cv"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cabo Verde";}
		elseif ($cid['country']=="cx"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Christmas Island";}
		elseif ($cid['country']=="cy"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Cyprus";}
		elseif ($cid['country']=="cz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Czech Republic";}
		elseif ($cid['country']=="de"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Germany";}
		elseif ($cid['country']=="dj"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Djibouti";}
		elseif ($cid['country']=="dk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Denmark";}
		elseif ($cid['country']=="dm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Dominica";}
		elseif ($cid['country']=="do"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Dominican Republic";}
		elseif ($cid['country']=="dz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Algeria";}
		elseif ($cid['country']=="ec"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Ecuador";}
		elseif ($cid['country']=="ee"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Estonia";}
		elseif ($cid['country']=="eh"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="en"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="er"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="es"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="et"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="fi"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="fj"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="fm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ga"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gb"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gd"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ge"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gh"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gi"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gl"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gp"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gq"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gs"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gt"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="gy"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="hk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="hn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="hr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ht"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="hu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Hungary";}
		elseif ($cid['country']=="id"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ie"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="il"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="in"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="io"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="iq"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ir"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="is"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="it"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="jm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="jo"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="jp"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ke"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kh"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ki"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="km"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kp"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="ky"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="kz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="la"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="lb"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="lc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="li"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		elseif ($cid['country']=="lk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="lr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ls"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="lt"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="lu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="lv"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ly"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ma"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="md"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mh"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ml"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mo"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mp"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mq"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ms"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mt"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mv"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mx"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="my"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="mz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="na"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="nc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ne"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="nf"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ng"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ni"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="nl"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="no"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="np"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="nr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="nu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="nz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="om"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pa"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pe"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pf"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ph"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pl"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ps"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pt"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="pw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="py"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="qa"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ro"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ru"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="rw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sa"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sb"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="scotland"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sd"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="se"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sh"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="si"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sl"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="so"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="st"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sv"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sy"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="sz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="td"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tf"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="th"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tj"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tk"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tl"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="to"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tr"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tv"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="tz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ua"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ug"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="um"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="us"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="uy"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="uz"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="va"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="vc"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ve"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="vg"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="vi"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="vn"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="vu"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="wales"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="wf"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ws"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="ye"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="yt"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="za"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="zm"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}				
		elseif ($cid['country']=="zw"){
				echo "<img src='./images/langs/" . $cid['country'] . ".png'></img> Afghanistan";}
		else {
				echo "Unknown";}
				
        echo "</td><td>" . $cid['signup'] . "</td><td>";
				
		if	($cid['status']=="active"){
			 echo "<span class='badge bg-green'>" . $cid['status'] . "</span>";}
		elseif ($cid['status']=="inactive"){
				echo "<span class='badge bg-red'>" . $cid['status'] . "</span>";}		
				echo "</td>";
                }
        }
}

function getClientsNum() {
	$result = mysql_query("SELECT * FROM cm_clients");
	$num_rows = mysql_num_rows($result);
	echo "$num_rows";
}


// System Functions

function get_server_memory_usage(){
 
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem);
	$mem = array_merge($mem);
	$memory_usage = $mem[2]/$mem[1]*100;
 
	return $memory_usage;
}

function get_server_cpu_usage(){
 
	$load = sys_getloadavg();
	return $load[0];
 
}

// Message Functions

function getMessages() {
	$query = mysql_query("SELECT * FROM cm_messages") or die(mysql_error());
	if(mysql_num_rows($query) == 0) {
	} else {
		while($message = mysql_fetch_assoc($query)) {
					echo "<tr><td>" . $message['ID'] . "</td><td>" . $message['subject'] . "</td><td>" . $message['fromuser'] . "</td><td>" . $message['sent'] . "</td><td><div class='col-md-3 col-sm-4'><a href=\"deleteuser.php?id=" . $message['ID'] . "\"><i class='fa fa-fw fa-trash'></i></a></div></td>";
		}
	
	}
}


?>


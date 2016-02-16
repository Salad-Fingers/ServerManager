<?php

/**
*
*	Stats.Extract
*	@author Nighthawk <thesynchronousdeveloper@gmail.com>
*	@version 0.2d
*	@copyright Copyright (c) 2015, Nighthawk
*
*/


/**
*	Preload
*/
define("NAME", "Stats:Extract");
define("VERSION", "0.2d");
define("LOG", true);
define("LOG_PATH", "log.se");
define("SIMPLE_HTML_DOM_PATH", "libs/simple_html_dom.php");
define("SIMPLE_HTML_DOM_FILECHECK", true);
define("POWERED_BY", "Powered by <a target=\"_blank\" title=\"Running Stats:Extract 0.2d\" href=\"http://www.unrealsoftware.de/files_show.php?file=16081\">Stats:Extract</a>");
define("DEFAULT_SOCKET_TIMEOUT", 5);
/**
*	Class: StatsExtract (Main Class)
*	Methods:
*		[Public]
*			@method parse_htmlstats(string $file) @return array
*			@method parse_userstats(string $file) @return array
*			@method parse_live_server_stats(string $ip,int $port {,int $timeout}) array
*			@method float_fix(float $float, int $round) int|float
*			@method calc_avg(array $arr) 
*			@method calc_peak(array $arr) 
*			@method calc_total(array $arr) 
*			@method calc_tos(int $s) 
*			@method calc_kpd(int $usgn) 
*			@method usgn_avatar(int $usgn) @return string
*			@method usgn_name(int $usgn) @return string
*/
class StatsExtract{
	//	Vars
	public $user = array();
	public $server = array();
	public $svinfo = array();
	public $entry = 0;
	protected $userdata_file = null;
	protected $userdata_file_path = null;
	protected $serverstats_file = null;
	protected $serverstats_file_path = null;
	protected $log = null;
	//	Public
	//	Main Methods
/**
*	__construct(), On loading, calls the simple_html_dom library.
*	If LOG is true then opens the log path. It's done in __construct() because more efficiency
*/
	public function __construct(){
		if(LOG){$this->log = fopen(LOG_PATH, "a+");}
		if(SIMPLE_HTML_DOM_FILECHECK){if(self::file_check(SIMPLE_HTML_DOM_PATH)){require SIMPLE_HTML_DOM_PATH;}else{die(self::log("Error: Could not load Simple HTML DOM library: \"".SIMPLE_HTML_DOM_PATH."\" [Invalid Path/Permission Error] You can set SIMPLE_HTML_DOM_FILECHECK to FALSE if you don't need this dependacy"));}}
	}
/**
*	__construct(), On loading, calls the simple_html_dom library.
*	If LOG is true then closes the log path. 
*/
	public function __destruct(){
		if(LOG){fclose($this->log);}
	}
/**
*	@param string $string
*	@method mixed log() log(string $string) logs error/debugs
*	@access protected
*/
	protected function log($string){if(LOG){fwrite($this->log, "[".date('d.m.Y.h:i:sa')."] ".$string."\n");}}

/**
*	Parses the serverstats.html to extract the user ranks, server information & graph values.
*	@param array parse_htmlstats() parse_htmlstats(string $file) Returns server HTML statistics
*	in an array; @return array(
*			['stats']=>array(
*				int ['uptime'],
*				float ['upload'],
*				float ['download'],
*				float ['total'],
*				int ['ranked-players']
*			),
*			['user']=>array(
*				[n]=>array(
*					string ['name'],
*					int ['usgn'],
*					float ['kpd'],
*					int ['score'],
*					int ['kills'],
*					int ['deaths'],
*					int ['tos']
*				),
*			),
*			['graph']=>array(
*				[0]=>array(
*					float ['upload'],
*					float ['download'],
*					int ['players']
*				),
*				[n]=>array(
*					float ['upload'],
*					float ['download'],
*					int ['players']
*				),
*				[23]=>array(
*					float ['upload'],
*					float ['download'],
*					int ['players']
*				),
*			)
*		)
*	@example $svstats = self::parse_htmlstats("path/to/serverstats.html")
*	@return array
*	@access public
*/
	public function parse_htmlstats($file){
		if(!is_null($file)){if(is_string($file)){if(self::file_check($file) && preg_match("/[Hh][Tt][Mm][Ll]$/", basename($file))){$this->serverstats_file_path = $file;$this->serverstats_file = fopen($this->serverstats_file_path, "r");self::log("Debug: [".__FUNCTION__."] Loaded \"".$file."\", ready for parsing");}else{die(self::log("Error: [".__FUNCTION__."] File \"".$file."\" does not exist or invalid file type"));}}else{die(self::log("Error: [".__FUNCTION__."] File path parameter must be a string type"));}}else{die(self::log("Error: [".__FUNCTION__."] Missing file path parameter"));}
		if(!is_null($this->serverstats_file)){
			self::log("Debug: Parsing \"".$this->serverstats_file_path."\"");
			$_serverstats = array();
			$_userstats = array();
			$_graphstats = array();
			//Extract User Ranking Stats
			self::log("Debug: Parsing user ranking stats");
			$l=0;$ul=0;$ll=0;
			while(($line=fgets($this->serverstats_file))!==false){
				$l++;
				$lines[] = $line;
				if(preg_match("/<div class=\"sec\">Player Ranking <span class=\"descr\">Top 30<\/span><\/div>/", $line)){
					$ul = $l+13;
				}
				if(preg_match("/<div class=\"sec\">Traffic Today <span class=\"descr\">/", $line)){
					$ll = $l-6;
				}
			}
			$temp1 = array();
			for($i=$ul;$i<=$ll;++$i){
				$temp1[] = trim($lines[$i]);
			}
			$temp1_count = count($temp1)-1;
			for($i=$temp1_count;$i>=0;$i--){
				if(preg_match("/<tr>/", $temp1[$i]) || preg_match("/<\/tr>/", $temp1[$i]) || preg_match("/<tr /", $temp1[$i])){
					unset($temp1[$i]);
				}
			}
			sort($temp1);
			$temp1_count = count($temp1)-1;
			for($i=0;$i<=$temp1_count;++$i){
				$html = str_get_html($temp1[$i]);
				$this->entry++;
				$name = trim($html->childNodes(1)->plaintext);
				$s = strpos($name, '(#');
				$usgn = trim(substr($name, $s+2,-1));
				$_userstats[$this->entry]['name'] = (string)trim(substr($name,0,$s));
				$_userstats[$this->entry]['usgn'] = (int)$usgn;
				$_userstats[$this->entry]['kpd'] = (float)floatval($html->childNodes(2)->plaintext);
				$_userstats[$this->entry]['score'] = (int)$html->childNodes(3)->plaintext;
				$_userstats[$this->entry]['kills'] = (int)$html->childNodes(4)->plaintext;
				$_userstats[$this->entry]['deaths'] = (int)$html->childNodes(5)->plaintext;
				$_userstats[$this->entry]['tos'] = $html->childNodes(6)->plaintext;
			}
			fseek($this->serverstats_file, 0);
			self::log("Debug: Parsing server stats");
			$l=0;$ul=0;$ll=0;
			while(($line=fgets($this->serverstats_file))!==false){
				$l++;
				$lines[] = $line;
				if(preg_match("/<body>/", $line)){
					$ul = $l+9;
				}
				if(preg_match("/<div class=\"sec\">Player Ranking <span class=\"descr\">Top 30<\/span>/", $line)){
					$ll = $l-4;
				}
			}
			$temp2 = array();
			for($i=$ul;$i<=$ll;++$i){
				$temp2[] = trim($lines[$i]);
			}
			$_serverstats['uptime'] = (int)substr($temp2[0], strpos($temp2[0], "</span>")+9,strpos($temp2[0], " h"));
			$_serverstats['upload'] = floatval(substr($temp2[1], strpos($temp2[1], "</span>")+7,strpos($temp2[1], " mb")));
			$_serverstats['download'] = floatval(substr($temp2[2], strpos($temp2[2], "</span>")+7,strpos($temp2[2], " mb")));
			$_serverstats['total'] = floatval($_serverstats['upload']+$_serverstats['download']);
			$_serverstats['ranked-players'] = (int)substr($temp2[4], strpos($temp2[4], "</span>")+7,strpos($temp2[0], "<br>"));
			fseek($this->serverstats_file, 0);
			$this->entry = 0;
			self::log("Debug: Parsing graph stats");
			$l=0;$ul=0;$ll=0;
			while(($line=fgets($this->serverstats_file))!==false){
				$l++;
				$lines[] = $line;
				if(preg_match("/<div class=\"sec\">Traffic Today <span class=\"descr\">/", $line)){
					$ul = $l+33;
				}
				if(preg_match("/<div class=\"sec\">Traffic Yesterday <span class=\"descr\">/", $line)){
					$ll = $l-6;
					break;
				}elseif(preg_match("/<p class=\"note\">/", $line)){
					$ll = $l-7;
					break;
				}
			}
			$temp3 = array();
			for($i=$ul;$i<=$ll;++$i){
				$temp3[] = trim(substr($lines[$i],strpos($lines[$i],"title=\"")+7));
			}
			$temp3_count = count($temp3)-1;
			for($i=0;$i<=$temp3_count;++$i){
				$this->entry++;
				$upload_preset = strpos($temp3[$i], "up ")+3; 
				$upload_offset = strpos($temp3[$i], "mb,")-strlen($temp3[$i]);
				$_graphstats[$this->entry]['upload'] = floatval(trim(substr($temp3[$i], $upload_preset, $upload_offset)));
				$download_preset = strpos($temp3[$i], "down ")+5;
				$_graphstats[$this->entry]['download'] = floatval(trim(substr($temp3[$i], $download_preset)));
				$players_preset = strpos($temp3[$i], "<span class=\"plc\">")+18;
				$players_offset = strpos($temp3[$i], "</span></td>")-strlen($temp3[$i]);
				$_graphstats[$this->entry]['players'] = (int)trim(substr($temp3[$i], $players_preset, $players_offset));
			}
			foreach($_userstats as $key=>$value){
				$usr[$key] = $value['score'];
			}
			array_multisort($usr,SORT_DESC,$_userstats);
			//temp arrays to final array
			$this->server['stats'] = $_serverstats;
			$this->server['user'] = $_userstats;
			$this->server['graph'] = $_graphstats;
			//return & close loose ends
			return $this->server;
			fclose($this->serverstats_file);
			$this->entry = 0;
			$this->server = array();
			$this->serverstats_file = null;
			$this->serverstats_file_path = null;
			self::log("Debug: Parse complete");
		}else{die(self::log("Error: [".__FUNCTION__."] \"".$file."\" not loaded."));}
	}

/**
*	Parses the userstats.dat to extract user ranks and data.
*	Credits go to MikuAuahDark for the decoding script!
*	@param array parse_userstats() parse_userstats(string $file) Returns user statistics
*	in an array; @return array(
*		[n]=>array(
*			string ['name'],
*			int ['usgn'],
*			int ['score'],
*			int ['frags'],
*			int ['deaths'],
*			int ['tos']
*			),
*		)
*	@example $user = self::parse_userstats("path/to/userstats.dat")
*	@return array
*	@access public
*/
	public function parse_userstats($file){
		if(!is_null($file)){if(is_string($file)){if(self::file_check($file) && preg_match("/[Dd][Aa][Tt]$/", basename($file))){$this->userdata_file_path = $file;$this->userdata_file = fopen($this->userdata_file_path, "r");self::log("Debug: [".__FUNCTION__."] Loaded \"".$file."\", ready for parsing");}else{die(self::log("Error: [".__FUNCTION__."] File \"".$file."\" does not exist or invalid file type"));}}else{die(self::log("Error: [".__FUNCTION__."] File path parameter must be a string type"));}}else{die(self::log("Error: [".__FUNCTION__."] Missing file path parameter"));}
		if(!is_null($this->userdata_file)){
			self::log("Debug: Parsing \"".$this->userdata_file_path."\"");
			fseek($this->userdata_file, 0, SEEK_END);
			$size = ftell($this->userdata_file);
			fseek($this->userdata_file, 17, SEEK_SET);
			$this->entry = 0;
			while(ftell($this->userdata_file)!=$size){
				$this->entry++;
				$this->user[$this->entry] = array(
					"name"=>trim(fgets($this->userdata_file)),
					"usgn"=>(int)self::decode(),
					"score"=>(int)self::decode(),
					"frags"=>(int)self::decode(),
					"deaths"=>(int)self::decode(),
					"tos"=>(int)self::decode(),
				);
			}
			return $this->user;
			fclose($this->userdata_file);
			$this->user = array();
			$this->entry = 0;
			$this->userdata_file = null;
			$this->userdata_file_path = null;
			self::log("Debug: Parse complete");
		}else{die(self::log("Error: [".__FUNCTION__."] \"".$file."\" not loaded."));}
	}
/**
*	parse_live_server_stats() connects to a server that's online on it's respective port to get server details. Such as the ones displayed in CS2D's serverlist.
*	Credits go to DC for sharing his script for this!
*	@param array parse_live_server_stats() parse_live_server_stats(string $ip, int $port {, int $timeout}) Returns server stats via socket connection
*	in an array; @return array(
*		string ['name'],
*		string ['map'],
*		int ['players'],
*		int ['max-players'],
*		int ['bots'],
*		string ['total-players'],
*		bool ['password'],
*		bool ['usgn-only'],
*		bool ['fow'],
*		bool ['ff'],
*		bool ['lua'],
*		string ['game-mode']
*		)
*	@example $svinfo = self::parse_live_server_stats(192.168.0.1,25235) With DEFAULT_SOCKET_TIMEOUT seconds timeout
*	@example $svinfo = self::parse_live_server_stats(192.168.0.1,25235,20) With 20 seconds timeout
*	@return array
*	@access public
*/
	protected $socket_err = false;
	protected $conn = null;
	protected $socket_err_reason = null;
	public function parse_live_server_stats($ip,$port, $timeout = null){
		if(empty($ip)){die(self::log("Error: [".__FUNCTION__."] No IP Specified"));}else{if(is_string($ip)){if(!filter_var($ip, FILTER_VALIDATE_IP) === false){$ip = (string)$ip;}else{die(self::log("Error: [".__FUNCTION__."] Invalid IP"));}}else{die(self::log("Error: [".__FUNCTION__."] IP parameter must be a string type"));}}
		if(empty($port)){die(self::log("Error: [".__FUNCTION__."] No Port Specified"));}else{if(is_integer($port)){if($port > 0 && $port <= 65535){$port = (int)$port;}else{die(self::log("Error: [".__FUNCTION__."] Invalid Port range (Valid range: 1~65535)"));}}else{die(self::log("Error: [".__FUNCTION__."] Port must be a integer type"));}}
		if(is_null($timeout)){$timeout = DEFAULT_SOCKET_TIMEOUT;}
		self::log("Debug: [".__FUNCTION__."] Connecting to server (".$ip.":".$port.")");
		$this->conn = @fsockopen("udp://".$ip.":".$port);
		if($this->conn){
			self::log("Debug: Connected to server, sending request...");
			self::sendRequest(chr(1).chr(0).chr(251).chr(1), $timeout);
			if(!$this->socket_err){
			    	// Read UDP packet header
			    	$b0=self::readByte();
			    	$b1=self::readByte();
			    	$b2=self::readByte();
			    	$b3=self::readByte();
			    	// Check if header is valid
			    	if($b0==1 && $b1==0 && $b2=251 && $b3==1)
			    	{
			    		self::log("Debug: Success, retrieving data...");
			    		//Get Data
			    		$mode=self::readByte(); //Mode Bit Flags
			    		$name=self::readString(); //Server Name
			    		$map=self::readString(); //Map
			    		$players=min(self::readByte(),32); //Players
			    		$players_max=min(self::readByte(),32); //Players Max
       					$state=self::readByte();                  //Game State
			    		if ($mode & 32){ $gmi=self::readByte(); }else{ $gmi=0; } //Game Mode
			    		$bots=self::readByte();
			    		//load general data
			    		$this->svinfo['name'] = self::utf8_htmlentities($name);
			    		$this->svinfo['map'] = $map;
			    		$this->svinfo['players'] = $players;
			    		$this->svinfo['max-players'] = $players_max;
			    		$this->svinfo['bots'] = $bots;
			    		$this->svinfo['total-players'] = $players.'/'.$players_max;
			    		// Print Mode Flag Stuff
			    		if ($mode & 1){ $this->svinfo['password']=true; }else{ $this->svinfo['password']=false; }
			    		if ($mode & 2){ $this->svinfo['usgn-only']=true; }else{ $this->svinfo['usgn-only']=false; }
			    		if ($mode & 4){ $this->svinfo['fow']=true; }else{ $this->svinfo['fow']=false; } 
			    		if ($mode & 8){ $this->svinfo['ff']=true; }else{ $this->svinfo['ff']=false; }
			    		if ($mode & 64){ $this->svinfo['lua']=true; }else{ $this->svinfo['lua']=false; }
			    		// Print Game Mode
			    		switch ($gmi){
			    			case 0: $this->svinfo['game-mode'] ='Standard'; break;
			    			case 1: $this->svinfo['game-mode'] ='Deathmatch'; break;
			    			case 2: $this->svinfo['game-mode'] ='Team Deathmatch'; break;
			    			case 3: $this->svinfo['game-mode'] ='Construction'; break;
			    			case 4: $this->svinfo['game-mode'] ='Zombies'; break;
			    			default: $this->svinfo['game-mode']='Unknown ('.$gmi.')';
			    		}
			    		self::log("Debug: Done!");
			    		self::log("Debug: Closing Connection");
			    		return $this->svinfo;
				}else{
			    		self::log("Error: Unexpected server reply (',".$b0.",',',".$b1.",',',".$b2.",',',".$b3.",') - expected (1,0,251,1)");
			    		if(!is_null($this->socket_err_reason)){self::log("Error: Connection Failed; ".$this->socket_err_reason);}
			    		self::log("Debug: Closing Connection");
				}
			}
		}else{self::log("Error: [".__FUNCTION__."] Failed to connect to ".$ip.":".$port);}
		fclose($this->conn);
		$this->socket_err = false;
		$this->socket_err_reason = null;
		$this->conn = null;
		$this->svinfo = array();
	}
	//	Util Methods
	/**
	* 
	*/
	public function float_fix($float,$round){return round(floatval($float),$round);}
	public function calc_avg($arr){$sum = 0;$arr_count=count($arr)-1;for($i=0;$i<=$arr_count;++$i){$sum = $sum + $arr[$i];}return $sum/count($arr);}
	public function calc_peak($arr){$peak = 0;$arr_count=count($arr)-1;for($i=0;$i<=$arr_count;++$i){if($arr[$i] > $peak){$peak = $arr[$i];}}return $peak;}
	public function calc_total($arr){$total = 0;$arr_count=count($arr)-1;for($i=0;$i<=$arr_count;++$i){$total = $total + $arr[$i];}return $total;}
	public function calc_tos($s){$day = 0;$min = 0;$hour = 0;$time = "";$s=self::float_fix($s/60,0);if($s >= 1440){while($s >= 1440){$day++;$s -= 1440;}}if($s >= 60){while($s >= 60){$hour++;$s -= 60;}}if($s < 60){$min = $s;}if($day > 0){if($day == 1){$time .= $day." day ";}elseif($day > 1){$time .= $day." days ";}if($hour > 0){$time .= $hour." h ";}if($min > 0){$time .= $min." m";}}elseif($day == 0 && $hour > 0){if($hour == 1){$time .= $hour." hour ";}elseif($hour > 1){$time .= $hour." hours ";}if($min > 0){$time .= $min." m";}}elseif($day == 0 && $hour == 0 && $min > 0){if($min == 1){$time .= $min." minute";}elseif($min > 1){$time .= $min." minutes";}}elseif($day == 0 && $hour == 0 && $min == 0 && $s > 0){if($s == 1){$time .= $s." second";}elseif($s > 1){$time .= $s." seconds";}}else{$time .= "N/A";}return $time;}
	public function calc_kpd($frags,$deaths){if($frags>0 && $deaths>0){return self::float_fix($frags/$deaths,2);}elseif($deaths == 0){if($frags>0){return $frags;}elseif($frags==0){return floatval(0.00);				}}elseif($frags == 0){return floatval(0.00);}}
	public function usgn_avatar($usgn){$usgn = trim($usgn);$avatar = file_get_contents("http://www.unrealsoftware.de/getuserdata.php?id=".$usgn."&data=avatar");if(!empty($avatar)){$avatar = "http://www.unrealsoftware.de/".$avatar;}else{$avatar = "";}return $avatar;}
	public function usgn_name($usgn){$usgn = trim($usgn);return file_get_contents("http://www.unrealsoftware.de/getuserdata.php?id=".$usgn."&data=name");}
	//	Protected
	protected function sendRequest($data, $timeout){global $d;fwrite($this->conn, $data);stream_set_timeout($this->conn, $timeout);$d = fread($this->conn, 256);$md = stream_get_meta_data($this->conn);if ($md['timed_out'] == 1){$this->socket_err_reason = "connection timed out";$this->socket_err = true;}if (ord(substr($d, 0, 1)) == 0){$this->socket_err_reason = "connection timed out";$this->socket_err = true;}}
	protected function utf8_htmlentities($t,$q=ENT_COMPAT,$char='UTF-8',$denc=TRUE){return htmlentities($t,$q,$char,$denc);}
	protected function readLine(){global $d;$line='';do{$char=ord(substr($d,0,1));$line.=chr($char);$d=substr($d,1);}while($char!=13);$d=substr($d,1);return substr($line,0,strlen($line)-1);}
	protected function readString(){global $d;$length=ord(substr($d,0,1));$string=substr($d,1,$length);$d=substr($d,$length+1);return $string;}
	protected function readByte(){global $d;$byte=ord(substr($d,0,1));$d=substr($d,1);return $byte;}
	protected function readShort(){global $d;$short=substr($d,0,2);$d=substr($d,2);$r=unpack('S',$short);return $r[1];}
	protected function readInt(){global $d;$int=substr($d,0,4);$d=substr($d,4);$r=unpack('l',$int);return $r[1];}
	protected function readFloat(){global $d;$float=ord(substr($d,0,4));$d=substr($d,4);$r=unpack('f',$float);return $r[1];}
	protected function decode(){return ord(fread($this->userdata_file,1))+ord(fread($this->userdata_file,1))*256+ord(fread($this->userdata_file,1))*65536+ord(fread($this->userdata_file,1))*16777216;}
	protected function file_check($path){if(file_exists($path)){return true;}else{return false;}}
	protected function sort_by_score($a,$b){return strcasecmp($a['score'], $b['score']);}
}
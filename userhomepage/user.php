
<?PHP
		session_start();
		if (isset($_SESSION['sess_login']) && $_SESSION['sess_login'] == true) {
		} else {
			header ('Location: ../index.php');
		}
		require('../scripts/db.php');
		$email = $_SESSION['acct'];
		$SQL1 = "SELECT summoner FROM users WHERE email = $email";
		$result = mysql_query($SQL1);
		$row = mysql_fetch_row($result);
		if($row[0] == "" || $row[0] == NULL || $row[0] == "NULL"){
			header ('Location: ../homepage/confirm.php');
			exit();
		}
		/**
		* Getting news Items and preparing sql query with respect to request
		**/
		$sql = "SELECT * FROM newsfeed WHERE receiver = '".$_GET['summ']."' ORDER BY timestamp DESC";
		$resource = mysql_query($sql);
		$news = array();
		while($row = mysql_fetch_assoc($resource)){
			$news[] = $row;
		}
?>


<html dir="ltr">
    <head>
        <title>LoLcodex | Private social network</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
        <meta name="Keywords" content="">
        <meta name="Description" content="Private social network">
        <meta name="Generator" content="com 2.0">
        <meta name="Robots" content="index">
        <link rel="shortcut icon" href="/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/style.css" id="groups_template_style">
        <link rel="stylesheet" type="text/css" href="../css/general.css">
        <link rel="index" title="LoLcodex" href="http://LoLcodex.com">
        <link rel="alternate" type="application/rss+xml" title="RSS" href="http://com/rss/LoLcodex/home">
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/#.css" rel="stylesheet" type="text/css">
        <link href="../css/# #2.css" rel="stylesheet" type="text/css">
        <link href="../css/# #3.css" rel="stylesheet" type="text/css">
        <link href="../css/groups.module.chat.css" rel="stylesheet" type="text/css">
        <link href="../css/groups.main.bar.css" rel="stylesheet" type="text/css">
        <link href="../css/groups_admin_panel.css" rel="stylesheet" type="text/css">
        <link href="../css/groups_comments.css" rel="stylesheet" type="text/css">
        <link href="../css/groups_modal_box.css" rel="stylesheet" type="text/css">
        <link href="../css/groups_newsfeed.css" rel="stylesheet" type="text/css">
        <link href="../css/groups_share.css" rel="stylesheet" type="text/css">
        <link href="../css/groups_top_bar.css" rel="stylesheet" type="text/css">
        <link href="../css/groups.notification.menu.css" rel="stylesheet" type="text/css">
        <link href="../css/prototabs.css" rel="stylesheet" type="text/css">
        <link href="../css/general.css" rel="stylesheet" type="text/css">
        <link href="../css/accordion.css" rel="stylesheet" type="text/css">
		<!-- JQuery library inclusion -->
		<script src="../scripts/jquery.js" type="text/javascript"></script>
        <script type='text/javascript'>
            var _gaq = _gaq || [];

            _gaq.push(['_setAccount', 'UA-3121632-1']);
            _gaq.push(['_setDomainName', 'none']);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_setCustomVar', 1,'member_type', 'group_member', 3]);
            _gaq.push(['_setCustomVar', 2,'subdomain', 'LoLcodex.com', 3]);
            _gaq.push(['_setCustomVar', 3,'category', 'other', 3]);
            _gaq.push(['_setCustomVar', 4,'product_type', 'Free Pivot', 3]);
            _gaq.push(['_setCustomVar', 5,'custom_domain', 'false', 3]);
            _gaq.push(['_trackPageview']);

    

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>


        <!-- ehc -->

        <!-- /ehc -->

        <script type="text/javascript" charset="utf-8">
            var isTheBook = true;
            var blogsAllowed = true;
            var askAllowed = false;
        </script>
    </head>

    <body class="group_member" onload="myFunction()">	
        <div id="bg_differentiation" style="display: none"></div>
        <div id="ajax_popup" style="display: none">
            <div class="ajaxModalBox"> <a href="javascript:groups.modalBox.hide()" class="closeButton"></a>
                <div id="ajax_popup_content"></div>
            </div>
        </div>
        <div id="busy_popup"></div>

        <div id="groupsInfoBoxCont" style="visibility:hidden;"><img src="/images/InfoBoxArrow2up.png" class="arrow" />
            <div id="groupsInfoBox"> </div>
        </div>
        <!-- skfnsdfknsdlkfn LoLcodex -->


        <script>
			var acctID = 10;
			function myFunction(){
				var visiting = getUrlVars()["summ"];
				$.ajax({   
					type:"POST",
					url:"../scripts/checkFriend.php",
					data:{summoner:visiting},
					success: function(data) {
						if(data == 1)
							document.getElementById("userProfileBlock").children[2].innerHTML = "<a href='' style='line-height: 40px; font-size: 1.1em;'>Friend</a>";
					}
				});
				var name = getUrlVars()["summ"];
				var url = 'http://api.elophant.com/v2/na/summoner/' + name + '?key=orzAVNzOQCgT9R36YfW1';
				$.get(url,
				{
					summonerName: name,
				},
				function(data,status){
					var name = data.data.internalName;
					acctID = data.data.acctId;
					var profileIconID = data.data.profileIconId;
					var summonerLVL = data.data.summonerLevel;
					var summonerID = data.data.summonerId;
					//document.getElementById("userProfileBlock").children[1].textContent = name;
					if(profileIconID == 0)
						document.getElementById("userProfileBlock").children[0].children[0].src = "icons0.png";	
					getRecentGames();
				}, 'json');
				
			}
			function getUrlVars() {
				var vars = {};
				var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
					vars[key] = value;
				});
				return vars;
			}

			
			function getRecentGames(){
				var url1 = "http://api.elophant.com/v2/na/recent_games/" + acctID + "?key=orzAVNzOQCgT9R36YfW1";
					$.get(url1,
					{
						accountId: acctID
					},
					function(data1){
						/*alert(data1.data.gameStatistics[0].championId); ///GET ALL CHAMPIONS PLAYED LAST 10 GAMES
						alert(data1.data.gameStatistics[1].championId); ///9 IS MOST RECENT!
						alert(data1.data.gameStatistics[2].championId);
						alert(data1.data.gameStatistics[3].championId);
						alert(data1.data.gameStatistics[4].championId);
						alert(data1.data.gameStatistics[5].championId);
						alert(data1.data.gameStatistics[6].championId);
						alert(data1.data.gameStatistics[7].championId);
						alert(data1.data.gameStatistics[8].championId);
						alert(data1.data.gameStatistics[9].championId);*/
						var name = champions(data1.data.gameStatistics[9].championId);
						document.getElementById('recentMatch').innerHTML += name;
					}, 'json');
			}
			
			function champions(id){
			
				switch(id){
				case 1:
				  return 'Annie';
				  break;
				case 2:
				  return 'Olaf';
				  break;
				case 3:
				  return 'Galio';
				  break;
				case 4:
				  return 'Twisted Fate';
				  break;
				case 5:
				  return 'Xin Zhao';
				  break;
				case 6:
				  return 'Urgot';
				  break;
				case 7:
				  return 'LeBlanc';
				  break;
				 case 8:
				  return 'Vladimir';
				  break;
				  case 9:
				  return 'Fiddlesticks';
				  break;
				  case 10:
				  return 'Kayle';
				  break;
				  case 11:
				  return 'Master Yi';
				  break;
				  case 12:
				  return 'Alistar';
				  break;
				  case 13:
				  return 'Ryze';
				  break;
				  case 14:
				  return 'Sion';
				  break;
				  case 15:
				  return 'Sivir';
				  break;
				  case 16:
				  return 'Soraka';
				  break;
				  case 17:
				  return 'Teemo';
				  break;
				  case 18:
				  return 'Tristana';
				  break;
				  case 19:
				  return 'Warwick';
				  break;
				  case 20:
				  return 'Nunu';
				  break;
				  case 21:
				  return 'Miss Fortune';
				  break;
				  case 22:
				  return 'Ashe';
				  break;
				  case 23:
				  return 'Tryndamere';
				  break;
				  case 24:
				  return 'Jax';
				  break;
				  case 25:
				  return 'Morgana';
				  break;
				  case 26:
				  return 'Zilean';
				  break;
				  case 27:
				  return 'Singed';
				  break;
				  case 28:
				  return 'Evelynn';
				  break;
				  case 29:
				  return 'Twitch';
				  break;
				  case 30:
				  return 'Karthus';
				  break;
				  case 31:
				  return "Cho'Gath";
				  break;
				  case 32:
				  return 'Amumu';
				  break;
				  case 33:
				  return 'Rammus';
				  break;
				  case 34:
				  return 'Anivia';
				  break;
				  case 35:
				  return 'Shaco';
				  break;
				  case 36:
				  return 'Dr. Mundo';
				  break;
				  case 37:
				  return 'Sona';
				  break;
				  case 38:
				  return 'Kassadin';
				  break;
				case 39:
				  return 'Irelia';
				  break;
				  case 40:
				  return 'Janna';
				  break;
				  case 41:
				  return 'Gangplank';
				  break;
				  case 42:
				  return 'Corki';
				  break;
				  case 43:
				  return 'Karma';
				  break;
				  case 44:
				  return 'Taric';
				  break;
				  case 45:
				  return 'Veigar';
				  break;
				  case 48:
				  return 'Trundle';
				  break;
				  case 50:
				  return 'Swain';
				  break;
				  case 51:
				  return 'Caitlyn';
				  break;
				  case 52:
				  return 'Sona';
				  break;
				  case 53:
				  return 'Blitzcrank';
				  break;
				  case 54:
				  return 'Malphite';
				  break;
				  case 55:
				  return 'Katarina';
				  break;
				  case 56:
				  return 'Nocturne';
				  break;
				  case 57:
				  return 'Maokai';
				  break;
				  case 58:
				  return 'Renekton';
				  break;
				  case 59:
				  return 'Jarvan IV';
				  break;
				  case 60:
				  return 'Elise';
				  break;
				  case 61:
				  return 'Orianna';
				  break;
				  case 62:
				  return 'Wukong';
				  break;
				  case 63:
				  return 'Brand';
				  break;
				  case 64:
				  return 'Lee Sin';
				  break;
				  case 65:
				  return 'Sona';
				  break;
				  case 66:
				  return 'Sona';
				  break;
				  case 67:
				  return 'Vayne';
				  break;
				  case 68:
				  return 'Rumble';
				  break;
				  case 69:
				  return 'Cassiopeia';
				  break;
				  case 70:
				  return 'Vayne';
				  break;
				  case 71:
				  return 'Vayne';
				  break;
				  case 72:
				  return 'Skarner';
				  break;
				  case 73:
				  return 'Vayne';
				  break;
				  case 74:
				  return 'Heimerdinger';
				  break;
				  case 75:
				  return 'Nasus';
				  break;
				  case 76:
				  return 'Nidalee';
				  break;
				  case 77:
				  return 'Udyr';
				  break;
				  case 78:
				  return 'Poppy';
				  break;
				  case 79:
				  return 'Gragas';
				  break;
				  case 80:
				  return 'Pantheon';
				  break;
				  case 81:
				  return 'Ezreal';
				  break;
				  case 82:
				  return 'Mordekaiser';
				  break;
				  case 83:
				  return 'Yorick';
				  break;
				  case 84:
				  return 'Akali';
				  break;
				  case 85:
				  return 'Kennen';
				  break;
				  case 86:
				  return 'Garen';
				  break;
				  case 87:
				  return 'Vayne';
				  break;
				  case 88:
				  return 'Vayne';
				  break;
				  case 89:
				  return 'Leona';
				  break;
				  case 90:
				  return 'Malzahar';
				  break;
				  case 91:
				  return 'Talon';
				  break;
				  case 92:
				  return 'Riven';
				  break;
				  case 93:
				  return 'Vayne';
				  break;
				  case 94:
				  return 'Vayne';
				  break;
				  case 95:
				  return 'Vayne';
				  break;
				  case 96:
				  return "Kog'Maw";
				  break;
				  case 97:
				  return 'Vayne';
				  break;
				  case 98:
				  return 'Shen';
				  break;
				  case 99:
				  return 'Lux';
				  break;
				  case 100:
				  return 'Vayne';
				  break;
				  case 101:
				  return 'Xerath';
				  break;
				  case 102:
				  return 'Shyvana';
				  break;
				  case 103:
				  return 'Ahri';
				  break;
				  case 104:
				  return 'Graves';
				  break;
				  case 105:
				  return 'Fizz';
				  break;
				  case 106:
				  return 'Volibear';
				  break;
				  case 107:
				  return 'Rengar';
				  break;
				  case 108:
				  return 'Vayne';
				  break;
				  case 109:
				  return 'Vayne';
				  break;
				  case 110:
				  return 'Varus';
				  break;
				  case 111:
				  return 'Nautilus';
				  break;
				  case 112:
				  return 'Viktor';
				  break;
				  case 113:
				  return 'Sejuani';
				  break;
				  case 114:
				  return 'Fiora';
				  break;
				  case 115:
				  return 'Ziggs';
				  break;
				  case 116:
				  return 'Vayne';
				  break;
				  case 117:
				  return 'Lulu';
				  break;
				  case 119:
				  return 'Draven';
				  break;
				  case 120:
				  return 'Hecarim';
				  break;
				  case 121:
				  return "Kha'Zix";
				  break;
				  case 122:
				  return 'Darius';
				  break;
				  case 126:
				  return 'Jayce';
				  break;
				  case 131:
				  return 'Diana';
				  break;
				  case 134:
				  return 'Syndra';
				  break;
				  case 143:
				  return 'Zyra';
				  break;
				  case 238:
				  return 'Zed';
				  break;
				  case 254:
				  return 'Vi';
				  break;
				  case 267:
				  return 'Nami';
				  break;
				  case 412:
				  return 'Thresh';
				  break;			 	  
				default:
				  return "N/A"
				}
			}
				
            function searchGroups()
            {

                var searchText = document.search.searchText.value;

                searchText = searchText.replace(/%/g, "%25");

                if(searchText) {

                    window.location = "http://com/home/search/" + searchText;
                }
            }

            function keys(e)
            {
                if(e.keyCode) {
                    var k = e.keyCode;
                } else {
                    var k = e.which;
                }
                return k;
            }
            function isEnters(e)
            {
                var k = keys(e);
                if(k == 13) {
                    searchGroups();
                    // return true;
                } else {
                    return false;
                }

            }
			
			function searchFunc(){
				var searched = document.getElementById('book_search_form').summ.value;
				window.location = "http://lolcodex.com/userhomepage/user.php?summ=" + searched;
				return false;
				
			}
			
			var summonerRequest;
			var int=self.setInterval(function(){updateNotifications()},60000);
			function updateNotifications(){
				$.ajax({
				  type: "POST",
				  url: "../scripts/notificationCenter.php",
				  success: function(data) {
						if(data != "" && data != 'NULL'){
							summonerRequest = data;
							document.getElementById("headerNotificationsIcons").children[0].children[1].style.display = "";
							document.getElementById("headerNotificationsIcons").children[0].children[1].children[1].innerHTML = "<h2>" + summonerRequest + " wants to be friends! </h2><br> <input type='submit' id='acceptRequest' name='submit' value='Accept'/><input type='submit' id='declineRequest' name='submit' value='Decline'/>";
						}
					}
				});
			}
			
			$("#acceptRequest").live('click',function() {
				$.ajax({   
					type:"POST",
					url:"../scripts/acceptRequest.php",
					data:{summoner:summonerRequest},
					success: function(data) {
						document.getElementById("headerNotificationsIcons").children[0].children[1].children[1].innerHTML = "<h2>Friend was added!</h2><br> <input type='button' id='removeNotification' name='submit' value='Ok'/>";
					}
				});
			});
			
			$("#removeNotification").live('click',function() {
					document.getElementById("headerNotificationsIcons").children[0].children[1].style.display = "none";
			});
	
			$("#declineRequest").live('click',function() {
				$.ajax({
					type:"POST",
					url:"../scripts/deleteNotification.php",
					data:{summoner:summonerRequest},
					success: function(data) {
					document.getElementById("headerNotificationsIcons").children[0].children[1].style.display = "none";
					}
				});
			});
			
			function openChat(){
				var visibility = document.getElementById("groups_chat_panel_g_LoLcodex").style.visibility;
				if(visibility == ""){
					document.getElementById("groups_chat_panel_g_LoLcodex").style.visibility = 'hidden';
				}else{
					document.getElementById("groups_chat_panel_g_LoLcodex").style.visibility = '';
				}
			}
        </script>

		
        <div id="layout" class="module_home ">
            <div id="header">
                <div id="hgroups">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="td_group_title" valign="bottom"><div id="h1">
                                    <a id="groupTitle" href="http://LoLcodex.com/">
                                        <h1>LoLcodex</h1>
                                    </a>
                                </div>
                            </td>
                            <td class="td_notifications" valign="bottom">
                                <ul id="headerNotificationsIcons">
                                    <li>
                                        <a id="headerFriendRequestItem" onclick="return false" href="#"> </a>
                                        <ul class="notificationMenu" style="display: none">
                                            <h3> Friend Requests </h3>
                                            <div class="notificationContent"> </div>
                                            <li class="bottom">
                                                <a href="http://LoLcodex.com/alerts">See All Friend Requests</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a id="headerMessagesItem" onclick="return false" rel="setAllMessagesPassive" href="#"> </a>
                                        <ul class="notificationMenu" style="display: none">
                                            <h3>Messages
                                                <div class="notificationAction">
                                                    <a href="http://lolcodex/homepage/composemessage.php">Compose New Message</a>
                                                </div>
                                            </h3>
                                            <div class="notificationContent">
                                                <li class="notificationNoContent">No Messages</li>
                                            </div>
                                            <li class="bottom">
                                                <a href="http://LoLcodex.com/incomingmessages.php">See All Messages</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a id="headerNotificationsItem" onclick="return false" rel="setAllNotificationsPassive" href="#"> </a>
                                        <ul class="notificationMenu" style="display: none">
                                            <h3> Notifications </h3>
                                            <div class="notificationContent"> </div>
                                            <li class="bottom">
                                                <a href="http://LoLcodex.com/notifications">See All Notifications</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td class="td_search" valign="bottom">
                                <div id="searchBoxDiv">
                                    <form id="book_search_form">
                                        <input id="book_groups_search_text" type="search" name="summ" placeholder="Search" autocomplete="off" data-placeholder-bound="true">
                                        <input id="searchSubmitInput" type="submit" onclick="return searchFunc()">
                                        <ul id="book_search_types_box" class="autocomplete" style="display: none">
                                            <li id="searchPeopleModule" class="searchModule" onClick="groups.search.goToAdvancedSearch()">
                                                <div class="searchModuleTitle">People</div>
                                                <div class="searchModuleSubtitle">Advanced Search</div>
                                            </li>
                                            <li id="searchPeopleModuleLoading" class="searchResultsLoading" style="display: none"></li>
                                            <li id="searchMessagesModule" class="searchModule" onClick="groups.search.searchInModule('messages')">
                                                <div class="searchModuleTitle">Messages</div>
                                                <div class="searchModuleSubtitle">More?</div>
                                            </li>
                                            <li id="searchBlogsModule" class="searchModule" onClick="groups.search.searchInModule('blogs')">
                                                <div class="searchModuleTitle">Blogs</div>
                                                <div class="searchModuleSubtitle">More?</div>
                                            </li>
                                            <li id="searchBlogsModuleLoading" class="searchResultsLoading" style="display: none"></li>
                                            <li class="noResultsFound centered hovered" style="display: none" class="hovered">
                                                No results found for <span class="searchKeyword"></span>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </td>
                            <td class="td_user_nav" valign="bottom" align="right"><ul id="basicMenu">
                                    <li id="basicItemHome"><a href="http://LoLcodex.com/userhomepage/userhomepage.php?summ=<?PHP print $_SESSION['summoner']; ?>">Home</a></li>
                                    <li id="basicItemProfile"><a href="http://LoLcodex.com/userhomepage/userhomepage.php?summ=<?PHP print $_SESSION['summoner']; ?>">Profile</a></li>
                                    <li id="basicItemAccount"><a href="#">Account <span class="downArrowIcon">&#9660;</span></a>
                                        <ul id="accountMenu">
                                            <div class="userAvatar"><a href="http://LoLcodex.com/userhomepage/userhomepage.php?summ=<?PHP print $_SESSION['summoner']; ?>"><img src="no_image.png" alt=<?PHP if($_SESSION['summoner'] == NULL) print "Please associate a Summoner name"; else print $_SESSION['summoner']; ?> width="50" height="50" align="absmiddle"></a><p><a href="http://LoLcodex.com/userhomepage/userhomepage.php?summ=<?PHP print $_SESSION['summoner']; ?>"><?PHP if($_SESSION['summoner'] == NULL) print "Please associate a Summoner name"; else print $_SESSION['summoner']; ?></a></p></div>
                                            <li><a href="http://LoLcodex.com/userhomepage/userhomepage.php?summ=<?PHP print $_SESSION['summoner']; ?>">Edit Profile</a></li>
                                            <!--<li><a href="http://LoLcodex.com/preferences">Account Settings</a></li>-->
                                            <li><a href="http://LoLcodex.com/privacy_settings/privacysettings.php">Privacy Settings</a></li>
                                            <!--<li><a href="http://lolcodex/homepage/composemessage.php">Compose New Message</a></li>
                                            <li><a href="http://lolcodex/homepage/change_password.php">Change Credentials</a></li>
                                            <li><a href="http://lolcodex/homepage/emailsettings.php">E-mail Settings</a></li>-->
                                            <li><a href="http://LoLcodex.com/invite/invite.php">Invite People</a></li>
                                            <li><a href="../scripts/logout.php">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="contentWrapper" class="">
                <div id="aSide">
                    <div id="userProfileBlock">
                        <a href="http://LoLcodex.com/people/person/oajiivhbldxbldhwi"><img
                                src="no_image.png"
                                alt=<?PHP if($_GET['summ'] == NULL) print "Please associate a Summoner name"; else print $_GET['summ']; ?>
                                width="100" height="100"></a>
                        <h1><a href="http://LoLcodex.com/people/person/oajiivhbldxbldhwi" style="font-size: 1.5em;"><?PHP if($_GET['summ'] == NULL) print "Please associate a Summoner name"; else print $_GET['summ']; ?></a></h1>
						<p><a href="../scripts/notifyUser.php?summ=<?PHP echo $_GET['summ']; ?>&summoner=<?PHP echo $_SESSION['summoner']; ?>" style="line-height: 40px; font-size: 1.1em;">Invite to Friends</a></p>
                    </div>  
					<div id="solo_queue" style="text-align: center;">
						<h2 style="text-align: center; font-size: 16px; border-bottom: 2px solid #000000;">Solo Queue<h2>
					</div>
					<div id="5v5_team" style="text-align: center;">
						<h2 style="text-align: center; font-size: 16px; border-bottom: 2px solid #000000;">5v5 Team<h2>
					</div>
					<div id="3v3_team" style="text-align: center;">
						<h2 style="text-align: center; font-size: 16px; border-bottom: 2px solid #000000;">3v3 Team<h2>
					</div>
                             
                </div>           
                <div id="content">
                    <div id="col_two_main_side" class="col_two_main_side">
                        <div id="top_block_no_1202933"  class="movable"  data-type="newsfeed">
                            <div class="box">
                                <div class="box_top" id="block_title_no_1">
                                    <h2>Newsfeed</h2>
                                </div>
                                <div style="clear:both"></div>
                                <div class="box_mid">
                                    <div class="content" id="block_no_1202933">
                                        <div id="status_form">
                                            <form action="../scripts/newsfeed.php?summ=<?PHP print $_GET['summ'] ?>" method="post">
                                                <div id="status_form_media">	
                                                    <ul>		
                                                        <li class="update_status active">
                                                            <a href="javascript:;">Update Status</a>
                                                        </li>		
                                                        <li class="title_attach" >Share:</li>
                                                        <li class="add_photos">
                                                            <a href="http://LoLcodex.com/photos/add">Screenshots</a>
                                                        </li>
                                                        <li class="add_video">
                                                            <a href="http://LoLcodex.com/videos/add">Video</a></li><li class="add_blog"><a href="http://LoLcodex.com/blogs/add">Blog</a></li></ul></div>

                                                <div id="statusMsgContainer">
                                                    <textarea class="special_border" id="status_msg" name="msg" cols="70" placeholder="What's happening in the rift, Summoner? "></textarea>
                                                </div>
                                                <div id="status_form_actions">
                                                    <div class="status_form_action"><input id="status_form_update_button" type="submit" value="Update" onclick="updateStatus()"/></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="newsfeed_filters" class="special_border">
                                            <a id="newsfeed_filter_everybody"  class="special_bg special_text" href="javascript:;" data-type="everybody">Everyone</a>
                                            <a id="newsfeed_filter_only_friends"  href="javascript:;" data-type="friends">Only Friends</a>
                                        </div>
                                        <div id='updateNewsFeed' class='special_bg special_border special_text' style='display: none' onclick='groups.RenderController.toggleNewStatusUpdates()'>
                                            <div id='lastUpdateSentOn' style='display: none'>2013-02-13 03:13:49</div>
                                            <img src='http://com/images/icons/newsfeedNewUpdate.png'> <span class='updateNewsFeedText'></span>
                                        </div>
                                        <style>
                                            #newsfeed .userStream .pic {
                                                margin-left: -100% !important;
                                                width: 50px !important;
                                            }
                                            #newsfeed .userStream .msgCont {
                                                width: 100% !important;
                                            }
                                            #newsfeed .userStream .msgCont .msg,
                                            #newsfeed .userStream .msgCont .media,
                                            #newsfeed .userStream .msgFooter,
                                            #newsfeed .userStream .msgCont .userBox {
                                                margin-left: 60px !important;
                                            }
                                            #newsfeed .userStream .msgCont .userCommentStream .pic {
                                                width: 35px !important;
                                            }
                                            #newsfeed .userStream .msgCont .userCommentStream .msgFooter {
                                                margin-left: 0 !important;
                                                margin-right: 3px !important;
                                            }
                                            #newsfeed .userStream .msgCont .userCommentStream .msg .msgBody,
                                            #newsfeed .userStream .msgCont .userCommentStream .msg .msgFooter {
                                                margin-left: 43px !important;
                                                line-height: 16px;
                                            }
                                            #newsfeed .userStream .msgCont .userCommentStream .msg {
                                                margin-left: 0 !important;
                                                width: 100% !important;
                                            }
                                        </style>
                                        <div id="newsfeed">
											<ul style="list-style-type: none;">
												<!--IF THERES A WIN-->
													<li id="Recent_game" style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(0, #00611A), color-stop(1.0, #004D14)); background: -moz-linear-gradient(center top , #00611A 0%, #004D14 100%) repeat scroll 0 0 transparent;">
														<div id="msg42694927-1" class="userStream special_border">
															<div id="match">
																<h2 style="font-size: 135%; color: white; text-shadow: grey 0.1em 0.1em 0.2em;"> Recent Match </h2><br>
																<div style="float: right; padding: 5px 10px;text-align: center; display: table-cell; vertical-align: middle; font-size: 14px; white-space: nowrap;" class="match_details_cell">
																	<div style="width: 100px;">
																		<div style="font-size: 12px; font-weight: bold;"> Normal 5v5 </div>
																		<div style="font-weight: bold; font-size: 16px; color: #66CC33;"> WIN </div>
																	</div>
																</div>
																<div style="float: right; padding: 5px 10px;text-align: center; display: table-cell; vertical-align: middle; font-size: 14px; white-space: nowrap;" class="match_details_cell">
																	<div style="width: 70px;">
																		<strong>0</strong> <span style="color: #BBBBBB; font-size: 10px; line-height: 6px;">Kills</span><br />
																		<strong>1</strong> <span style="color: #BBBBBB; font-size: 10px; line-height: 6px;">Deaths</span><br />
																		<strong>0</strong> <span style="color: #BBBBBB; font-size: 10px; line-height: 6px;">Assists</span>
																	</div>
																</div>
																<div id="champ_pic" style="width: 80px; height: 80px;"> 
																	 <img src="../Champions/Annie.jpg" id="inventory" style="width: 100%; height: 100%;">
																</div>
															</div>													
																													
														</div>
													</li>
													<!--IF THERES A loss
													<li id="Recent_game" style="background: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(0, #690019), color-stop(1.0, #4F0011)); background: -moz-linear-gradient(center top , #690019 0%, #4F0011 100%) repeat scroll 0 0 transparent;">
														<div id="msg42694927-1" class="userStream special_border">
															<div id="match">
																<h2 style="font-size: 135%; color: white; text-shadow: grey 0.1em 0.1em 0.2em;"> Recent Match </h2><br>
																<div id="champ_pic" style="width: 80px; height: 80px;"> 
																	 <img src="../Champions/Annie.jpg" id="inventory" style="width: 100%; height: 100%;">
																</div>

															</div>													
																													
														</div>
													</li>-->
												<?php foreach($news as $item): ?>
													<li id="<?php echo $item['timestamp'] ?>">
														<div class="userStream special_border" id="msg42694927-1">
															<div class="msgCont" id="msgCont42694927-1">
																<div class="msgArrow"></div>
																<div class="msg"><span class="name"><a href="http://LoLcodex.com/people/oajiivhbldxbldhwi" data-userid="13530230" data-username="oajiivhbldxbldhwi"><?php echo $item['poster'] ?></a></span>   <?php echo $item['message'] ?></div>
																<div class="media"></div>
																<div class="msgFooter">
																	<div class="time">
																		<div class="icon">
																			<img width="16, height="16" src="balloon.gif" alt="comment" />
																		</div>

																		<a href="http://LoLcodex.com/newsfeed/post/42694927" rel="1360721629"><?php echo $item['timestamp'] ?></a>
																	</div>
																	<div class="actions" id="actions42694927-1"><a id="newComment42694927-1" href="javascript:;">Comment</a> 
																		<a id="like42694927-1" href="javascript:;">Like</a>  
																		<a id="deleteAction42694927-1" href="javascript:;" redirectBackHome="false">Delete</a>
																	</div>
																</div>
															</div>
															<div class="pic">
																<a href="http://LoLcodex.com/people/person/oajiivhbldxbldhwi" data-userid="13530230" data-username="oajiivhbldxbldhwi"><img src="no_image.png" width="50" height="50" border="0" style=""  /></a>
															</div>
														</div>
													</li>
												<?php endforeach; ?>
											</ul>
                                        </div>
                                        <a id="newsfeed_loadMsgs" class="moreButton radius special_bg special_text special_border" href="javascript:;" style="display:none">Load More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box_bottom"><span class="box_bottom_right"></span><span class="box_bottom_left"></span></div>
                        </div>
                    </div>
                    <div class="col_two_sidebar" id="col_two_sidebar">
                        <div id="top_block_no_1202929"  class="movable" ><div class="box"><div class="box_top" id="block_title_no_1"><h2>League Status</h2></div><div style="clear:both"></div><div class="box_mid box_mid_sidebar_ie_width_fix"><div class="content" id="block_no_1202929"><style>
                                            #col_2 .group_description_block .desc_logo {float: left; width: 20%;}
                                            #col_2 .group_description_block .freetellafriend {text-align:right; margin-top: 10px;}
                                            .group_description_block .freetellafriend {margin-top: 10px;}
                                            .group_description_block .desc_logo {text-align:center;}
                                        </style>
                                        <div class="group_description_block">
                                            <div class="desc_logo"></div><div class="desc_text"></div>
                                        </div></div></div></div><div class="box_bottom"><span class="box_bottom_right"></span><span class="box_bottom_left"></span></div></div>
                        <div id="top_block_no_1202930"  class="movable" ><div class="box"><div class="box_top" id="block_title_no_1"><h2>Weekly Stats</h2></div><div style="clear:both"></div><div class="box_mid box_mid_sidebar_ie_width_fix"><div class="content" id="block_no_1202930">
                                       </div></div></div><div class="box_bottom"><span class="box_bottom_right"></span><span class="box_bottom_left"></span></div></div>
                        <div id="top_block_no_1202931"  class="movable" >
                            <div class="box">
                                <div class="box_top" id="block_title_no_1">
                                    <h2></h2>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <div class="box_bottom"><span class="box_bottom_right"></span><span class="box_bottom_left"></span></div></div>		
                    </div>
                </div>
            </div>

            <div id="footer"> &copy; 2013 LoLcodex
            </div>




            <div id="groups_bar">
                <span id="groups_search_button" class="button">
                    <form id="search_form" autocomplete="off" method="POST" action="http://LoLcodex.com/people/search">
                        <input id="groups_search_text" type="search" placeholder="Search in group" name="q" data-placeholder-bound="true">
                    </form>
                </span>
                <a id="groups_notifications_button" class="button" href="javascript:;" title="Notifications">
                    Notifications
                    <div id="groups_notification_count" class="count" style="display:none;">
                        <img class="groups_bar_overlay" src="/images/groups_bar/overlay.png">
                        0
                    </div>
                </a>
                <div id="groups_notifications_panel" class="panel" style="right: 91px;">
                    <h6>Notifications</h6>
                    <ul>
                        <a href="http://LoLcodex.com/alerts">There are no new Notifications.</a>
                    </ul>
                </div>
                <a id="groups_chat_button_g_LoLcodex" class="chat group button active" href="javascript:openChat()" title="Group Chat">
                    <span>Chat (1 online)</span>
                    <div class="count" style="display: none;" id="groupsfw13607291338465400">
                        <img class="groups_bar_overlay" src="/images/groups_bar/overlay.png">
                        <span id="groups_chat_unread_count_g_LoLcodex">0</span>
                    </div>
                </a>
                <div id="groups_chat_panel_g_LoLcodex" class="chat group panel" style="visibility:hidden; right: -1px;">
                    <h6 class="special_highlight">
                        <a class="chat_close_button" style="display:block" href="/_trigger/chat/action/close_group_panel"> </a>
                        <a id="groups_chat_sound_g_LoLcodex" class="groups_chat_sound on" href="/_trigger/chat/toggle/beep/g_LoLcodex" title="Chat Sound"> </a>
                        <a id="groups_chat_state_g_LoLcodex" class="groups_chat_state online" href="/_trigger/chat/toggle/offline/g_LoLcodex" title="Chat State">Online</a>
                        Chat
                    </h6>
                    <ol id="groups_chat_conversation_g_LoLcodex" class="hConversation"></ol>
                    <ul id="groups_chat_user_list_g_LoLcodex" class="chat_user_list">
                        <li id="panel_chat_user_13530230" class="vcard">
                            <a href="_trigger/chat/with/13530230" data-userid="13530230">
                                <img class="avatar" width="30" height="30" src="http://LoLcodex.com/avatars/b/80.png" alt="<?PHP if($_GET['summ'] == NULL) print "Please associate a Summoner name"; else print $_GET['summ']; ?>'s avatar">
                                <span class="fn"><?PHP if($_GET['summ'] == NULL) print "Please associate a Summoner name"; else print $_GET['summ']; ?></span>
                            </a>
                        </li>
                    </ul>
                    <div class="chat_new_message">
                        <textarea id="groups_chat_new_message_g_LoLcodex" class="message_area"></textarea>
                        <button id="groups_chat_send_message_g_LoLcodex" class="message_send">Send</button>
                    </div>
                </div>
            </div>

            <div id="groups_toaster_vcard" class="special_bg special_text special_border"></div>



            <iframe style="display:none;" name="_rlcdn" width=0 height=0 frameborder=0 src="http://ei.rlcdn.com/362258.gif?x=50b6c8d56ee2089ab2920555bfb0468ad7a137f72601a5d9&c=bf-ecb"></iframe>

            <!-- footer scripts begin -->


            <!-- tpl:cm -->
            <script type="text/javascript">
                window.groups = {_info:{module:{}},langStrings:{}};

        
                if(window._kmq) {
                    _kmq.push(['identify', 'username_oajiivhbldxbldhwi']);
                }
            </script>
            <!-- tpl:gp -->

            <!--script src="/public/js/src/lib/LAB/LAB.js?b=1359739035"></script-->

            <script type="text/javascript">
                /*subgroup*/
    
                /*gadmin*/
    
                /*album*/
    
                groups._info.domName = 'http://LoLcodex.com';
                groups._info.groupName = 'LoLcodex';
                groups._info.groupNameX = '';
                groups._info.isMember = '1';
                groups._info.isGroupAdmin = '';
                groups._info.subscriptionName = '';
                groups._info.shouldEmailSubscriptionNotification = '';
                groups._info.obj1 = '';
                groups._info.userId = '13530230';
                groups._info.userName = 'oajiivhbldxbldhwi';
                groups._info.isMobile = '';
                groups._info.module.name = 'home';
                groups._info.module.profileOwnerId = '';
                groups._info.previewImage = '';

                groups._info.module.layout = 'TriColumns';
    
                groups._info.module.designMode = !!window.hasPermission;

                /*--------------*/

                /*javascript_variables*/
    
                groups._info.groupId = 704597;
                groups._info.title = 'LoLcodex';
                groups._info.moduleTitle = '';
                groups._info.searchTypes = {'blogs':{title:'Blogs',actionURL:'http://LoLcodex.com/blogs/search'},'chat':{title:'Chat',actionURL:'http://LoLcodex.com/chat/search'},'people':{title:'Members',actionURL:'http://LoLcodex.com/people/search'},'messages':{title:'Priv. Messages',actionURL:'http://LoLcodex.com/search_messages'}};
                groups._info.language = 'english';
                groups._info.languageRevision={custom:135260045,main:424,name:'english'};
                groups._info.bannedWords = '';
                groups._info.titleSeperator = ' | ';
                groups._info.userNameSurname = '<?PHP if($_GET['summ'] == NULL) print "Please associate a Summoner name"; else print $_GET['summ']; ?>';
                groups._info.userAvatar = 'no_image.png';
                groups._info.chatConfig = {"jid":"13530230-704597@im.com","room":"704597@conference.im.com","token":"7e4422157878949a9db1641dec01d6af","bind_endpoint":"http:\/\/LoLcodex.com\/http-bind","mode":"xmpp"};groups._info.membershipId = '31280300';
                groups._info.isAdmin = '';
                groups._info.defaultAvatar = 'http://com/avatars/b/208.png?0';
                groups._info.defaultAvatarMini = 'http://com/avatars/b/16.png?0';
        

                /*javascript_language_strings*/
    
                groups.langStrings['See %s new update(s)'] = 'See %s new update(s)';
                groups.langStrings['Delete'] = 'Delete';
                groups.langStrings['Like'] = 'Like';
                groups.langStrings['Unlike'] = 'Unlike';
                groups.langStrings['Are you sure you want to delete this comment?'] = 'Are you sure you want to delete this comment?';
                groups.langStrings['Are you sure you want to delete this entry and all related data with it?'] = 'Are you sure you want to delete this entry and all related data with it?';
                groups.langStrings['Liked by %s.'] = 'Liked by %s.';
                groups.langStrings['Reply'] = 'Reply';
                groups.langStrings['Write a reply'] = 'Write a reply';
                groups.langStrings['Name surname'] = 'Name surname';
                groups.langStrings['Email'] = 'Email';
                groups.langStrings['Comment'] = 'Comment';
                groups.langStrings['Please enter values for the following fields: %s'] = 'Please enter values for the following fields: %s';
                groups.langStrings['persons'] = 'persons';
                groups.langStrings['person'] = 'person';
                groups.langStrings['liked'] = 'liked';
                groups.langStrings['comments'] = 'comments';
                groups.langStrings['comment'] = 'comment';
                groups.langStrings['ago'] = 'ago';
                groups.langStrings['just now'] = 'just now';
                groups.langStrings['seconds'] = 'seconds';
                groups.langStrings['1 minute from now'] = '1 minute from now';
                groups.langStrings['1 minute ago'] = '1 minute ago';
                groups.langStrings['minutes'] = 'minutes';
                groups.langStrings['hours'] = 'hours';
                groups.langStrings['1 hour ago'] = '1 hour ago';
                groups.langStrings['1 hour from now'] = '1 hour from now';
                groups.langStrings['months'] = 'months';
                groups.langStrings['years'] = 'years';
                groups.langStrings['minutes'] = 'minutes';
                groups.langStrings['from now'] = 'from now';
                groups.langStrings['yesterday'] = 'yesterday';
                groups.langStrings['tomorrow'] = 'tomorrow';
                groups.langStrings['days'] = 'days';
                groups.langStrings['last week'] = 'last week';
                groups.langStrings['weeks'] = 'weeks';
                groups.langStrings['next week'] = 'next week';
                groups.langStrings['last month'] = 'last month';
                groups.langStrings['last year'] = 'last year';
                groups.langStrings['last century'] = 'last century';
                groups.langStrings['next century'] = 'next century';
                groups.langStrings['centuries'] = 'centuries';
                groups.langStrings['next year'] = 'next year';

                groups.langStrings['Adding your comment...'] = 'Adding your comment...';
                groups.langStrings['Comment added.'] = 'Comment added.';
                groups.langStrings['Comment deleted.'] = 'Comment deleted.';
                groups.langStrings['Deleting comment...'] = 'Deleting comment...';
                groups.langStrings['Group Chat'] = 'Group Chat';

                groups.langStrings['Page design saved.'] = 'Page design saved.';
                groups.langStrings['Deleting block...'] = 'Deleting block...';
                groups.langStrings['Add New Standard Modules'] = 'Add New Standard Modules';
                groups.langStrings['Saving page design...'] = 'Saving page design...';
                groups.langStrings['Getting block info...'] = 'Getting block info...';
                groups.langStrings['Updating block...'] = 'Updating block...';
                groups.langStrings['Adding block...'] = 'Adding block...';
                groups.langStrings['Add New Block'] = 'Add New Block';
                groups.langStrings['You can use some HTML'] = 'You can use some HTML';
                groups.langStrings['Back'] = 'Back';
                groups.langStrings['Add'] = 'Add';
                groups.langStrings['Add New Google Gadget'] = 'Add New Google Gadget';
                groups.langStrings['Standard Blocks'] = 'Standard Blocks';
                groups.langStrings['App Gadgets'] = 'App Gadgets';
                groups.langStrings['Google Gadgets'] = 'Google Gadgets';
                groups.langStrings['Flexible HTML Box'] = 'Flexible HTML Box';
                groups.langStrings['Built-in blocks tailored to this app, such as top contributors.'] = 'Built-in blocks tailored to this app, such as top contributors.';
                groups.langStrings['Check out the Google Gadget Gallery to find nifty new features to add to your network.'] = 'Check out the Google Gadget Gallery to find nifty new features to add to your network.';
                groups.langStrings['The block you want is not here? Enter your own HTML code here to integrate external codes, create ads, and more.'] = 'The block you want is not here? Enter your own HTML code here to integrate external codes, create ads, and more.';
                groups.langStrings['Use this module if you would like to display feeds from other apps.'] = 'Use this module if you would like to display feeds from other apps.';
                groups.langStrings['You have already added all the blocks.'] = 'You have already added all the blocks.';

                groups.langStrings['Deleting draft...'] = 'Deleting draft...';
                groups.langStrings['Delete External Blogs'] = 'Delete External Blogs';
                groups.langStrings['There is no blog to delete.'] = 'There is no blog to delete.';
                groups.langStrings['Click to continue...'] = 'Click to continue...';
                groups.langStrings['Content'] = 'Content';
                groups.langStrings['Title'] = 'Title';
                groups.langStrings['New Entry'] = 'New Entry';
                groups.langStrings['Add Blog'] = 'Add Blog';
                groups.langStrings['RSS Feed'] = 'RSS Feed';
                groups.langStrings['Write a new blog post from right here inside this network.'] = 'Write a new blog post from right here inside this network.';
                groups.langStrings['Add an RSS feed/a blog from another website to the blog section in this network.'] = 'Add an RSS feed/a blog from another website to the blog section in this network.';

                groups.langStrings['Select a video file'] = 'Select a video file';

                groups.langStrings['Save as template'] = 'Save as template';

                groups.langStrings['Uploading image...'] = 'Uploading image...';
                groups.langStrings['Cropping image...'] = 'Cropping image...';
                groups.langStrings['Updating profile information...'] = 'Updating profile information...';
                groups.langStrings['Information saved successfully. (You need to <a style="text-decoration:underline" href="javascript:void(document.location.reload(true))">refresh the page</a> to see the changes.)'] = 'Information saved successfully. (You need to <a style="text-decoration:underline" href="javascript:void(document.location.reload(true))">refresh the page</a> to see the changes.)';
                groups.langStrings['Updating answers to profile questions...'] = 'Updating answers to profile questions...';
                groups.langStrings['Freezing profile...'] = 'Freezing profile...';
                groups.langStrings['Unfreezing profile...'] = 'Unfreezing profile...';
                groups.langStrings['Adding to friend list...'] = 'Adding to friend list...';
                groups.langStrings['Poking %s...'] = 'Poking %s...';
                groups.langStrings['Loading cropper...'] = 'Loading cropper...';
                groups.langStrings['Adjusting thumbnail...'] = 'Adjusting thumbnail...';
                groups.langStrings['Saving tab settings...'] = 'Saving tab settings...';

                groups.langStrings['Tag This Photo'] = 'Tag This Photo';
                groups.langStrings['Finish Tagging'] = 'Finish Tagging';
                groups.langStrings['You should write more for a tag.'] = 'You should write more for a tag.';
                groups.langStrings['Deleting tag...'] = 'Deleting tag...';
                groups.langStrings['Rotating...'] = 'Rotating...';
                groups.langStrings['Loading rotated image...'] = 'Loading rotated image...';
                groups.langStrings['Saving tags...'] = 'Saving tags...';

                groups.langStrings['Oops, temporary error occurred. Please try again...'] = 'Oops, temporary error occurred. Please try again...';
                groups.langStrings['Search in %s'] = 'Search in %s';
                groups.langStrings['You should fill %s field to add comment.'] = 'You should fill %s field to add comment.';
                groups.langStrings['Loading...'] = 'Loading...';
                groups.langStrings['Saving page...'] = 'Saving page...';

                groups.langStrings['Loading template...'] = 'Loading template...';
                groups.langStrings['Uploading...'] = 'Uploading...';
                groups.langStrings['Saving page...'] = 'Saving page...';
                groups.langStrings['Add New Standard Block'] = 'Add New Standard Block';

                function dont_show_change_layout()
                {
                    groups.RenderController.renderPageBusy();
                    x_dont_show_change_layout(dont_show_change_layout_result);
                }
                function dont_show_change_layout_result(res)
                {
                    groups.RenderController.hideModal();
                    document.getElementById('topbar_info_text').innerHTML = res;
                }


                /*ajax_javascript*/
                window.applySajaxMethods = function(){['ExtraPages_addExtraPage','ExtraPages_getAddModulePanel','ExtraPages_get3rdAddModulePanel','ExtraPages_activateModules','ExtraBlocks_addBlock','ExtraBlocks_removeBlock','ExtraBlocks_selectBlock','ExtraBlocks_editBlock','ExtraBlocks_editBlockWithContentLimit','ExtraBlocks_savePageDesign','ExtraBlocks_getModulesListForModuleBox','deleteAction','saveStatusMessage','getMemberActions','addTwitterAssociation','reportIssue','facebookconnect_signup','zendSupport','sendSupportTicket','facebookconnect_control','updateEntrySimple','pollVote','dont_show_change_layout','ExtraBlocks_getModulesListForModuleBox','getModulesListForModuleBox','ExtraBlocks_addBlock'].each(function(f){window["x_"+f]=function(){return _S(f, Array.prototype.slice.apply(arguments));};});};

                /*ajax_functions*/
    
                function twitterAssociation() {
                    var txt = '';
                    txt += '<h1>Twitter Association:</h1>';
                    txt += '<form class=\"groupsForm\" id=\"twitter\">';
                    txt += '<label class=\"formTitle\">Twitter Username:</label>';
                    txt += '<div><input type=\"text\" id=\"username\" required=\"1\" realname=\"Username\" value=\"\" class=\"medium\"></div>';
                    txt += '<label class=\"formTitle\">Twitter Password:</label>';
                    txt += '<div><input type=\"password\" id=\"passwd\" required=\"1\" realname=\"Password\" value=\"\" class=\"medium\"></div>';
                    txt += '<div><input type=\"button\" value=\"Save\" onclick=\"twitterAssociationSubmit(this.form)\"> <input type=\"button\" name=\"back\" value=\"Cancel\" onclick=\"groups.RenderController.hideModal()\" class=\"cancel_button\"></div>';
                    txt += '</form>';
                    groups.RenderController.showModal(txt);
                }

                function twitterAssociationSubmit(formobj)
                {
                    if (!validateCompleteForm(formobj,'error')) return false;

                    groups.RenderController.renderPageBusy();

                    var twitter_username = document.getElementById('username').value;
                    var twitter_password = document.getElementById('passwd').value;

                    x_addTwitterAssociation(twitter_username,twitter_password,addTwitterAssociationCB);
                }

                function addTwitterAssociationCB(result)
                {
                    if (result)
                    {
                        groups.RenderController.renderPageIdle();
                        twitterAssociation.disabled = true;
                        groups.notifier.show('success','Your Twitter account is successfully associated with your account');
                    }
                    else
                    {
                        groups.RenderController.showModal('<h1>Twitter Association</h1>Error. Please <a href=\"javascript:twitterAssociation()\">try</a> again...');
                    }
                }

                var charLimit = 140;
                function controlCharLimit(textarea_obj) {
                    var text = textarea_obj.value;
                    var length = text.length;
                    var left = charLimit - length;
                    var status_char_left_obj = xGetElementById('status_char_left');
                    status_char_left_obj.innerHTML = left;
                    if(left<0) {
                        xGetElementById('status_msg_button').disabled = true;
                        xGetElementById('status_button_div').className = 'status_button_disabled';
                        status_char_left_obj.style.color = 'red';
                    } else {
                        xGetElementById('status_msg_button').disabled = false;
                        xGetElementById('status_button_div').className = 'status_button';
                        status_char_left_obj.style.color = '';
                    }
                }

                function saveStatusMessage() {
                    var msg_obj = xGetElementById('status_msg');
                    var msg = msg_obj.value.replace(/^\s+|\s+$/g,"");
                    if(msg!='') {
                        msg_obj.disabled = true;
                        xGetElementById('status_msg_button').disabled = true;
                        xGetElementById('status_button_div').className = 'status_button_disabled';
                        x_saveStatusMessage(msg,saveStatusMessageResult);
                    }
                }

                status_message_count = 0;
                function saveStatusMessageResult(res) {
                    var status = res[0];
                    var msg = res[1];
                    if(!status) {
                        alert(msg);
                    }
                    else {
                        if(msg=='') {
                            window.location.href = location.href;
                        } else {
                            var latest_activity = xGetElementById('latest_activity_container');
                            var old_content = latest_activity.innerHTML;
                            latest_activity.innerHTML = '<div id="new_status_msg_'+status_message_count+'" style="display:none">'+msg+'</div>'+old_content;
                            new Effect.Appear('new_status_msg_'+status_message_count);
                            var msg_obj = xGetElementById("status_msg");
                            msg_obj.value = "";
                            msg_obj.disabled = false;
                            xGetElementById('status_msg_button').disabled = false;
                            xGetElementById('status_button_div').className = 'status_button';
                            xGetElementById('status_char_left').innerHTML = charLimit;
                            status_message_count++;
                        }
                    }
                }			var zzz_actid = -1;
                function deleteAction(act_id,status) {
                    var confirmDelete = confirm('Are you sure that you want to delete this activity permanently?');
                    if(confirmDelete) {
                        groups.RenderController.renderPageBusy();
                        zzz_actid = act_id;
                        x_deleteAction(act_id,status,deleteActionResult);
                    }
                }

                function deleteActionResult(res) {
                    if(!res[0]) {
                        alert(res[1]);
                        groups.RenderController.hideModal();
                    } else {
                        Effect.DropOut('la_unit_'+zzz_actid);
                        groups.RenderController.hideModal();
                    }
                }
                var load_more_member_id = 0;
                function loadMoreAction(member_id) {
                    groups.RenderController.renderPageBusy();
                    xGetElementById("load_more_link").href = "javascript:;";
                    load_more_member_id = member_id;

                    var wall_messages = document.getElementsByName("min_wall_msg");
                    var wall_messages_length = wall_messages.length;
                    var wall_messages_value = "";
                    var min_wall_msg = 0;
                    var actions = document.getElementsByName("min_action");
                    var actions_length = actions.length;
                    var actions_value = "";
                    var min_action = 0;
                    var i = 0;

                    for(i=0;i<wall_messages_length;i++) {
                        wall_messages_value = wall_messages[i].value;
                        if(min_wall_msg==0) {
                            min_wall_msg = wall_messages_value;
                        }
                        else {
                            if(wall_messages_value!=0)
                                min_wall_msg = min_wall_msg>wall_messages_value?wall_messages_value:min_wall_msg;
                        }
                    }
                    for(i=0;i<actions_length;i++) {
                        actions_value = actions[i].value;
                        if(min_action==0) {
                            min_action = actions_value;
                        }
                        else {
                            if(actions_value!=0)
                                min_action = min_action>actions_value?actions_value:min_action;
                        }
                    }

                    x_getMemberActions(member_id,min_action,min_wall_msg,"html",loadMoreActionResult);
                }

                function loadMoreActionResult(res) {
                    var obj = xGetElementById("old_actions_container");
                    if(res!="") {
                        var result = res.split("__SPLIT__");
                        var actions = result[0];
                        var count = result[1]+"";
                        if(count!="20")
                            xDisplay("load_more","none");
                        obj.innerHTML += actions;
                    }
                    else {
                        xDisplay("load_more","none");
                    }

                    if(load_more_member_id!=0)
                        xGetElementById("load_more_link").href = "javascript:loadMoreAction("+load_more_member_id+")";
                    load_more_member_id = 0;
                    groups.RenderController.hideModal();
                }

		
                var add_from = 'admin';
                var extra_page_container = '';
                var extra_page_key = '';

                // Cache Variables
                var static_page_title = '';
                var static_page_who_can_see = '';
                var link_title = '';
                var link_link = '';
                var link_link_type = '';
                var link_who_can_see ='';

                function EP_addNewPage(from) {
                    if(from!="admin")
                        add_from = "menu";

                    replacements =
                        {
                        addFrom: add_from
                    };

                    groups.modalBox.show("addPage", { replacements: replacements } , "_common");
                }

                function EP_addStaticPageForm() {
                    var txt = '<form class="groupsForm" name="addStaticPageForm" onsubmit="return false;">';
                    txt += '<label class="formTitle">Title:</label>';
                    txt += '<div><input type="text" id="page_title" maxlength="50" required="1" realname="Title" /></div>';

                    /*
                                    txt += '<label class="formTitle">Page Layout:</label>';
                                    txt += '<div>';
                                    txt += '<table>';
                                    txt += '	<tbody><tr>';
                                    txt += '		<td>';
                                    txt += '			<label for="edit_page_view_right"><img src="http://com/images/popup_layout_sidebar.gif" alt="Right Sidebar"></label><br>';
                                    txt += '			<input type="radio" name="edit_page_view" id="edit_page_view_right" value="right"> <label for="edit_page_view_right" class="formTitle">Right sidebar</label>';
                                    txt += '		</td>';
                                    txt += '		<td>';
                                    txt += '			<label for="edit_page_view_left"><img src="http://com/images/popup_layout_menubar.gif" alt="Left Sidebar"></label><br>';
                                    txt += '			<input type="radio" name="edit_page_view" id="edit_page_view_left" value="left"> <label for="edit_page_view_left" class="formTitle">Left sidebar</label>';
                                    txt += '		</td>';
                                    txt += '		<td>';
                                    txt += '			<label for="edit_page_view_full"><img src="http://com/images/popup_layout_full.gif" alt="Full View"></label><br>';
                                    txt += '			<input type="radio" name="edit_page_view" id="edit_page_view_full" checked="checked"  value="full"> <label for="edit_page_view_full" class="formTitle">Full view</label>';
                                    txt += '		</td>';
                                    txt += '	</tr>';
                                    txt += '</tbody></table>';
                                    txt += '</div>';
                     */

                    txt += '<label class="formTitle">Who Can See:</label>';
                    txt += '<div class="FormTopPadding"><input type="radio" name="page_who_can_see" id="page_who_can_see_anyone" checked="checked" /> <label for="page_who_can_see_anyone">Anyone</label>';
                    txt += ' <input type="radio" name="page_who_can_see" id="page_who_can_see_members"  /> <label for="page_who_can_see_members">Members</label> <style>.content_info_box{margin-left:0px !important}</style></div>';
                    txt += '<div><input type="button" value="Submit" onclick="EP_addStaticPageSubmit(this.form)" /><input class="cancel_button" type="button" value="Back" onclick="EP_addNewPage(\''+add_from+'\')" /></div>';
                    txt += '</form>';
                    return txt;
                }

                function EP_addStaticPage() {
                    groups.RenderController.showModal('<h1><span class="module_box_icon module_box_joker"></span>Add Static Page</h1>'+EP_addStaticPageForm());
                }

                function EP_addStaticPageSubmit(formobj) {
                    if(!validateCompleteForm(formobj,'error')) return false;
                    groups.RenderController.renderPageBusy();
                    var title = xGetElementById('page_title').value;
                    var who_can_see = 'anyone';
                    /*
                                    var pageLayout = '';
                                    var pageLayoutOptions = document.addStaticPageForm.edit_page_view;
                                    var pageLayoutOptionsLength = pageLayoutOptions.length;
                                    for(i = 0; i < pageLayoutOptionsLength; i++)
                                    {
                                            if(pageLayoutOptions[i].checked)
                                            {
                                                    pageLayout = pageLayoutOptions[i].value;
                                                    break;
                                            }
                                    }
                     */

                    if(xGetElementById('page_who_can_see_members').checked)
                        who_can_see = 'members';

                    static_page_title = title;
                    static_page_who_can_see = who_can_see;
                    x_ExtraPages_addExtraPage(title,'internal','',static_page_who_can_see, EP_addStaticPageResult);
                }

                function EP_addStaticPageResult(res) {
                    var status = res[0];
                    var msg = res[1];
                    if(status) {
                        if(add_from=='admin') {
                            extra_page_key = msg;
                            extra_page_container = res[2];
                            var txt = '<h1>Add Static Page</h1>';
                            txt += '<div class="info">Extra page is successfully added. You can edit it\'s content in a new page by clicking <a href="javascript:EP_goToStaticPage()">here</a>. <a href="javascript:EP_continueToAdministrate()">Click</a> to continue...</div>';
                            groups.RenderController.showModal(txt);
                        }
                        else {
                            window.location.href = 'http://LoLcodex.com/'+res[1]+'/edit';
                        }
                    }
                    else {
                        txt = '<h1>Add Static Page</h1>';
                        txt += '<div class="msg_error">'+msg+'</div>';
                        txt += EP_addStaticPageForm();
                        groups.RenderController.showModal(txt);
                        xGetElementById('page_title').value = static_page_title;
                        xGetElementById('page_who_can_see_'+static_page_who_can_see).checked = true;
                    }

                    static_page_title = '';
                    static_page_who_can_see = '';
                }

                function EP_goToStaticPage() {
                    if(extra_page_key!='' ) {
                        window.open('http://LoLcodex.com/'+extra_page_key+'/edit','static_page');
                    }
                }

                function EP_continueToAdministrate() {
                    groups.RenderController.hideModal();
                    if(extra_page_container!='' ) {
                        addItem(extra_page_container);
                        extra_page_container = '';
                        extra_page_key = '';
                    }
                }

                function EP_addLinkForm() {
                    var txt = '<form class="groupsForm" onsubmit="return false;">';
                    txt += '<label class="formTitle">Title:</label>';
                    txt += '<div><input type="text" id="page_title" maxlength="50" required="1" realname="Title" /></div>';
                    txt += '<label class="formTitle">Link:</label>';
                    txt += '<div><input type="text" id="page_content" required="1" realname="Link" value="http://"/></div>';
                    txt += '<label class="formTitle">Link Type:</label>';
                    txt += '<div class="FormTopPadding"><input type="radio" name="page_content_type" id="page_content_type_iframe" checked="checked" /> <label for="page_content_type_internal">Internal (Iframe)</label>';
                    txt += ' <input type="radio" name="page_content_type" id="page_content_type_external" /> <label for="page_content_type_external">External</label></div>';
                    txt += '<label class="formTitle">Who Can See:</label>';
                    txt += '<div class="FormTopPadding"><input type="radio" name="page_who_can_see" id="page_who_can_see_anyone" checked="checked" /> <label for="page_who_can_see_anyone">Anyone</label>';
                    txt += ' <input type="radio" name="page_who_can_see" id="page_who_can_see_members"  /> <label for="page_who_can_see_members">Members</label> <style>.content_info_box{margin-left:0px !important}</style></div>';
                    txt += '<div><input type="button" value="Submit" onclick="EP_addLinkSubmit(this.form)" /><input class="cancel_button" type="button" value="Back" onclick="EP_addNewPage(\''+add_from+'\')" /></div>';
                    txt += '</form>';
                    return txt;
                }

                function EP_addLink() {
                    groups.RenderController.showModal('<h1><span class="module_box_icon module_box_joker"></span>Add Link</h1>'+EP_addLinkForm());
                }

                function EP_addLinkSubmit(formobj) {
                    if(!validateCompleteForm(formobj,'error')) return false;
                    groups.RenderController.renderPageBusy();
                    var title = xGetElementById('page_title').value;
                    var content = xGetElementById('page_content').value;
                    var type = 'iframe';
                    if(xGetElementById('page_content_type_external').checked)
                        type = 'external';
                    var who_can_see = 'anyone';
                    if(xGetElementById('page_who_can_see_members').checked)
                        who_can_see = 'members';

                    link_title = title;
                    link_link = content;
                    link_link_type = type;
                    link_who_can_see = who_can_see;
                    x_ExtraPages_addExtraPage(title,type,content,who_can_see,EP_addLinkResult);
                }

                function EP_addLinkResult(res) {
                    var status = res[0];
                    var msg = res[1];
                    if(status) {
                        if(add_from=='admin') {
                            groups.RenderController.hideModal();
                            addItem(res[2]);
                        }
                        else {
                            if(link_link_type=='external') {
                                extra_page_key = msg;
                                var txt = '<h1>Add Link</h1>';
                                txt += '<div class="info">External link is successfully added. If you want to go to this address, click <a href="javascript:EP_goToLink()">here</a> or <a href="javascript:document.location.reload(true)">click</a> to continue...</div>';
                                groups.RenderController.showModal(txt);
                            }
                            else {
                                window.location.href = 'http://LoLcodex.com/'+res[1];
                            }

                        }
                    }
                    else {
                        txt = '<h1>Add Link</h1>';
                        txt += '<div class="msg_error">'+msg+'</div>';
                        txt += EP_addLinkForm();
                        groups.RenderController.showModal(txt);
                        xGetElementById('page_title').value = link_title;
                        xGetElementById('page_content').value = link_link;
                        xGetElementById('page_content_type_'+link_link_type).checked = true;
                        xGetElementById('page_who_can_see_'+link_who_can_see).checked = true;
                    }

                    link_title = '';
                    link_link = '';
                    link_link_type = '';
                    link_who_can_see = '';
                }

                function EP_goToLink() {
                    if(extra_page_key!='' ) {
                        window.location.href = 'http://LoLcodex.com/'+extra_page_key;
                        extra_page_key = '';
                    }
                }

                function EP_checkBox(input_id) {
                    var obj = xGetElementById(input_id);
                    var obj_checked = obj.checked;
                    obj.checked = !obj_checked;
                }

                function EP_addModule(addFrom) {

                    groups.modalBox.show(
                    "addModule",
                    {
                        afterShow: function()
                        {
                            if ($("groups_addModuleTabs")) {
                                new ProtoTabs(
                                "groups_addModuleTabs",
                                {
                                    contentInfo:
                                        {
                                        "tab_internal_modules-content": {contentId: "addInternalModule", module: "_common", replacements: function(callback){x_ExtraPages_getAddModulePanel(addFrom,callback)}},
                                        "tab_3rd_party_modules-content": {contentId: "add3rdPartyModule", module: "_common", replacements: function(callback){x_ExtraPages_get3rdAddModulePanel(addFrom,callback)}}
                                    }
                                }
                            );
                            }
                        }
                    },
                    "_common"
                );
                }

                function EP_activateModules(addFrom) {
                    groups.RenderController.renderPageBusy();


                    var modules = '';
                    var all_modules = document.getElementsByName('modules');
                    var all_modules_length = all_modules.length;
                    for(var i=0;i<all_modules_length;i++) {
                        if(all_modules[i].checked) {

                            if(modules!='')
                                modules += '__SPLIT__';

                            modules += all_modules[i].value;
                        }
                    }

                    x_ExtraPages_activateModules(modules,addFrom,activateModulesResult);
                }

                function activateModulesResult(res) {

                    if(res!=""&&res!="admin") {


                        document.location.href = "http://LoLcodex.com/" + res;

                        /*
                                            if(add_from=='admin') {
                                                    groups.RenderController.hideModal();
                                                    addItem(res);
                                            }
                                            else {
                                                    var txt = '<h1>Add Module</h1>';
                                                    txt += '<div class="info">Your changes are successfully saved. If you want to administrate your pages, click <a href="http://LoLcodex.com/admin/pages">here</a> or <a href="javascript:document.location.reload(true)">click</a> to continue...</div>';
                                                    groups.RenderController.showModal(txt);
                                            }*/

                    } else {
                        document.location.href = "http://LoLcodex.com/admin/pages";
                        //document.location.reload(true);
                    }
                }

		

                /*function to run onload*/
                groups.platform_ready = function(){
        
                };

                groups.initialGraphData                 = "";
                groups.initialGraphLabels               = "";
                groups.initialGraphTooltips             = "";
                groups.initialGraphTopValue             = "";
                groups.initialGraphProgress2            = "";
                groups.initialGraphAvailableDisc        = "";
                groups.initialGraphReadableDisc         = "";
                groups.initialGraphPieValues            = "";
                groups.initialGraphPieSlides            = "";


                groups.shouldShowLove = '';

                /*--------------*/
            </script>

		</div>
            <script type="text/javascript" rel="compressed" charset="utf-8" src="/public/js/min.grouppage.js?b=1359739035"></script>

            <script type="text/javascript" src="http://s.skimresources.com/js/6948X660046.skimlinks.js"></script>
            <!-- footer scripts end --></body>
</html>
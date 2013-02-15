<?PHP
		session_start();
		if (isset($_SESSION['sess_login']) && $_SESSION['sess_login'] == 1) {
			
		} else {
			header ('Location: ../index.php');
		}
?>
<!DOCTYPE html>
<html dir="ltr">
    <head>
        <title>League book | Private social network</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1">
        <meta name="Keywords" content="">
        <meta name="Description" content="Private social network">
        <meta name="Generator" content="com 2.0">
        <meta name="Robots" content="index">
        <link rel="shortcut icon" href="/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/style.css" id="groups_template_style">
        <link rel="stylesheet" type="text/css" href="../css/general.css">
        <link rel="index" title="League book" href="http://leaguebook.com">
        <link rel="alternate" type="application/rss+xml" title="RSS" href="">
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
        <script type='text/javascript'>
            var _gaq = _gaq || [];

            _gaq.push(['_setAccount', 'UA-3121632-1']);
            _gaq.push(['_setDomainName', 'none']);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_setCustomVar', 1,'member_type', 'group_member', 3]);
            _gaq.push(['_setCustomVar', 2,'subdomain', 'leaguebook.com', 3]);
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

        <link href="/public/css/groups/groups.notification.menus.css?15997" rel="stylesheet" type="text/css">
        <script type="text/javascript" charset="utf-8">
            var isTheBook = true;
            var blogsAllowed = true;
            var askAllowed = false;
        </script>
    </head>
    <body class="group_member">




        <div id="bg_differentiation" style="display: none"></div>
        <div id="ajax_popup" style="display: none">
            <div class="ajaxModalBox"> <a href="javascript:groups.modalBox.hide()" class="closeButton"></a>
                <div id="ajax_popup_content"></div>
            </div>
        </div>
        <div id="busy_popup"></div>
        <div id="loader"><blink>Loading...</blink></div>
        <div id="groupsNotifierCont">
            <div id="groupsNotifier" class="msg_info"></div>
        </div>
        <div id="groupsInfoBoxCont" style="visibility:hidden;"><img src="/images/InfoBoxArrow2up.png" class="arrow" />
            <div id="groupsInfoBox"> </div>
        </div>
        <!-- skfnsdfknsdlkfn leaguebook -->



        <script>
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
        </script>
        <div id="layout" class="module_dashboard myprofile">
            <div id="header">
                <div id="hgroups">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="td_group_title" valign="bottom"><div id="h1">
                                    <a id="groupTitle" href="http://leaguebook.com/">
                                        <h1>LeagueBook</h1>
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
                                                <a href="http://leaguebook.com/dashboard/alerts">See All Friend Requests</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a id="headerMessagesItem" onclick="return false" rel="setAllMessagesPassive" href="#"> </a>
                                        <ul class="notificationMenu" style="display: none">
                                            <h3>Messages
                                                <div class="notificationAction">
                                                    <a href="http://leaguebook.com/dashboard/compose_message">Compose New Message</a>
                                                </div>
                                            </h3>
                                            <div class="notificationContent">
                                                <li class="notificationNoContent">No Messages</li>
                                            </div>
                                            <li class="bottom">
                                                <a href="http://leaguebook.com/dashboard/messages">See All Messages</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a id="headerNotificationsItem" onclick="return false" rel="setAllNotificationsPassive" href="#"> </a>
                                        <ul class="notificationMenu" style="display: none">
                                            <h3> Notifications </h3>
                                            <div class="notificationContent"> </div>
                                            <li class="bottom">
                                                <a href="http://leaguebook.com/dashboard/notifications">See All Notifications</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            <td class="td_search" valign="bottom">
                                <div id="searchBoxDiv">
                                    <form id="book_search_form" method="POST" action="http://leaguebook.com/people/search">
                                        <input id="book_groups_search_text" type="search" name="q" placeholder="Search" autocomplete="off" data-placeholder-bound="true">
                                        <input id="searchSubmitInput" type="submit" data-placeholder-bound="true">
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
                                    <li id="basicItemHome"><a href="http://leaguebook.com/">Home</a></li>
                                    <li id="basicItemProfile"><a href="http://leaguebook.com/people/person/oajiivhbldxbldhwi">Profile</a></li>
                                    <li id="basicItemAccount"><a href="#">Account <span class="downArrowIcon">&#9660;</span></a>
                                        <ul id="accountMenu">
                                            <div class="userAvatar"><a href="http://leaguebook.com/people/person/oajiivhbldxbldhwi"><img src="no_image.png" alt="Levi Limmex" width="50" height="50" align="absmiddle"></a><p><a href="http://leaguebook.com/people/person/oajiivhbldxbldhwi">Levi Limmex</a></p></div>
                                            <li><a href="http://leaguebook.com/dashboard/myprofile">Edit Profile</a></li>
                                            <!--<li><a href="http://leaguebook.com/dashboard/preferences">Account Settings</a></li>-->
                                            <li><a href="http://leaguebook.com/dashboard/privacy_settings">Privacy Settings</a></li>
                                            <!--<li><a href="http://leaguebook.com/dashboard/compose_message">Compose New Message</a></li>
                                            <li><a href="http://leaguebook.com/dashboard/password">Change Credentials</a></li>
                                            <li><a href="http://leaguebook.com/dashboard/email_settings">E-mail Settings</a></li>-->
                                            <li><a href="http://leaguebook.com/dashboard/spread">Invite People</a></li>
                                            <li><a href="/signout">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="contentWrapper" class="flexi">
                <div id="aSide">
                    <div id="userProfileBlock">
                        <a href="http://leaguebook.com/people/person/oajiivhbldxbldhwi"><img
                                src="no_image.png"
                                alt="Levi Limmex"
                                width="50" height="50"></a>
                        <h1><a href="http://leaguebook.com/people/person/oajiivhbldxbldhwi">L6vi</a></h1>
                        <p><a href="http://leaguebook.com/people/person/oajiivhbldxbldhwi/edit">Edit Profile</a></p>
                    </div>              
                    <div id="menu">
                        <ul id="nav" class="level1">
                            <li id="menu_item_17306106" class="selected" >
                                <a href="../userhomepage/userhomepage.php"><span>Home</span></a>
                            </li>
                            <li id="menu_item_17306107" >
                                <a href="../myprofile/myprofile.php" z=""><span>My Profile</span></a>
                            </li>
                            <li id="menu_item_17306108" >
                                <a href="../friends/friends.php"><span>Friends</span></a>
                            </li>
                            <li id="menu_item_17306109" >
                                <a href="../invite/invite.php" z=""><span>Invite</span></a>
                            </li>
                            <li id="menu_item_17306110" >
                                <a href="../teams/teams.php"><span>Teams</span></a>
                            </li>
                            <li id="menu_item_17306111" >
                                <a href="../screenshots/screenshots.php"><span>Screenshots</span></a>
                            </li>
                            <li id="menu_item_17306112" >
                                <a href="../videos/videos.php"><span>Videos</span></a>
                            </li>
                            <li id ="menu_item_17306113" >
                                <a href="../scrims/scrims.php"><span>Scrims</span></a>
                            </li>
                            <li id="menu_item_17306114" >
                                <a href="../blogs/blogs.php"><span>Blogs</span></a>
                            </li>
                        </ul>
                        <div style="clear:both;"></div>
                    </div>                
					<ul id="subGroupsBlock">
                        <h3><a href="../teams/teams.php">Teams</a></h3>
                        <li>
							<a href=" ../teams/SampleTeam/SampleTeamA.php">Sample Teams</a>
						</li>
					</ul>     
                </div>            
                <div id="content"><div class="col_menu" id="col_sidebar">
                        <div id="top_block_no_2"  ><div class="box_mid_ops"><div class="content" id="block_no_2">    <div class="menu_list">
                                        <a style="background-image: url(http://com/images/fugue/user--pencil.png)"  href="http://leaguebook.com/dashboard/myprofile">Edit My Profile</a>
                                        <!--<a style="background-image: url(http://com/images/fugue/gear.png)"  href="http://leaguebook.com/dashboard/preferences">Preferences</a>-->
                                        <a style="background-image: url(http://com/images/fugue/lock.png)"  href="http://leaguebook.com/dashboard/password">Change Credentials</a>
                                        <a style="background-image: url(http://com/images/fugue/wall--pencil.png)"  href="http://leaguebook.com/dashboard/privacy_settings">Privacy Settings</a>
                                        <a style="background-image: url(http://com/images/fugue/mail--plus.png)"  href="http://leaguebook.com/dashboard/compose_message">Compose New Message</a>
                                        <a style="background-image: url(http://com/images/fugue/mail--pencil.png)"  href="http://leaguebook.com/dashboard/email_settings">E-mail Settings</a>
                                        <a style="background-image: url(http://com/images/fugue/mails-stack.png)"  href="http://leaguebook.com/dashboard/messages">My Incoming Messages</a>
                                        <a style="background-image: url(http://com/images/fugue/user--plus.png)"  href="http://leaguebook.com/dashboard/spread">Invite People!</a>
                                        <a style="background-image: url(http://com/images/fugue/door-open-out.png)"  href="http://leaguebook.com/dashboard/signout">Sign Out</a>
                                    </div></div></div><div class="box_bottom_ops"> </div></div></div>
                    <div class="col_main_in_withmenubar">
                        <div id="top_block_no_1"  ><div class="box"><div class="box_top" id="block_title_no_1"><h2>Edit My Profile</h2></div><div style="clear:both"></div><div class="box_mid"><div class="content" id="block_no_1"></div><form method="post" class="siteForm" action="http://leaguebook.com/dashboard/myprofile" enctype="multipart/form-data" name="joinform" onsubmit="return _checkDate()"><div class="siteFormContainer">
                                            <div class="siteFormTitle">Name Surname</div>
                                            <div class="siteFormBody"><input type="text" name="name" value="Levi Limmex" class="medium" maxlength="50" /></div></div>
                                        <script>
                                            function selectSpecialValue(id,value) {
                                                if(value=="")
                                                    xGetElementById(id).selected = true;
                                                else {
                                                    var obj = xGetElementById(id);
                                                    var options = obj.options;
                                                    var options_length = options.length;
                                                    for(i=0;i<options_length;i++) {
                                                        if(options[i].value==value) {
                                                            options[i].selected = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }

                                            function selectSpecialDate(m,d,y) {
                                                var i = 0;
                                                var month_obj = xGetElementById('month');
                                                var month_options = month_obj.options;
                                                var month_options_length = month_options.length;
                                                for(i=0;i<month_options_length;i++) {
                                                    if(month_options[i].value==m) {
                                                        month_options[i].selected = true;
                                                        break;
                                                    }
                                                }

                                                var day_obj = xGetElementById('day');
                                                var day_options = day_obj.options;
                                                var day_options_length = day_options.length;
                                                for(i=0;i<day_options_length;i++) {
                                                    if(day_options[i].value==d) {
                                                        day_options[i].selected = true;
                                                        break;
                                                    }
                                                }

                                                if(y!="" && y!="0") {
                                                    var year_obj = xGetElementById('year');
                                                    var year_options = year_obj.options;
                                                    var year_options_length = year_options.length;
                                                    for(i=0;i<year_options_length;i++) {
                                                        if(year_options[i].value==y) {
                                                            year_options[i].selected = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }

                                            function intval( mixed_var, base ) {
                                                // http://kevin.vanzonneveld.net
                                                // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                                                // +   improved by: stensi
                                                // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                                                // *     example 1: intval('Kevin van Zonneveld');
                                                // *     returns 1: 0
                                                // *     example 2: intval(4.2);
                                                // *     returns 2: 4
                                                // *     example 3: intval(42, 8);
                                                // *     returns 3: 42
                                                // *     example 4: intval('09');
                                                // *     returns 4: 9

                                                var tmp;

                                                if( typeof( mixed_var ) == 'string' ){
                                                    tmp = parseInt(mixed_var*1);
                                                    if(isNaN(tmp) || !isFinite(tmp)){
                                                        return 0;
                                                    } else{
                                                        return tmp.toString(base || 10);
                                                    }
                                                } else if( typeof( mixed_var ) == 'number' && isFinite(mixed_var) ){
                                                    return Math.floor(mixed_var);
                                                } else{
                                                    return 0;
                                                }
                                            }


                                            function _checkDate() {
                                                document.joinform.birthday.value =  document.joinform.month.value+"/"+document.joinform.day.value+"/"+document.joinform.year.value;
                                                if(document.joinform.day.value==""||document.joinform.month.value==""||document.joinform.year.value=="") {
                                                    alert("Invalid Birthday");
                                                    return false;
                                                }
                                                var myDayStr = intval(document.joinform.day.value);
                                                var myMonthStr = intval(document.joinform.month.value)-1;
                                                var myYearStr = document.joinform.year.value;
                                                var myMonth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                var myDateStr = myDayStr + ' ' + myMonth[myMonthStr] + ' ' + myYearStr;

                                                /* Using form values, create a new date object
                        using the setFullYear function */
                                                var myDate = new Date();
                                                myDate.setFullYear( myYearStr, myMonthStr, myDayStr );

                                                if ( myDate.getMonth() != myMonthStr ) {
                                                    //alert(myDate.toString());
                                                    alert( myDateStr + ' is NOT a valid date.' );
                                                    return false;
                                                }
                                                document.joinform.birthday.value = document.joinform.month.value+"/"+document.joinform.day.value+"/"+document.joinform.year.value;
                                                return true;
                                            }

                                            function editBirthday() {
                                                var birthday='10/10/1982';
                                                var showbirthday='1';
                                                var d=new Date();
                                                year=d.getYear() + 1900;
                                                birthdate=birthday.split('/');
                                                document.getElementById('month').selectedIndex = birthdate[0];
                                                document.getElementById('day').selectedIndex = birthdate[1];
                                                document.getElementById('year').selectedIndex = year - birthdate[2] + 1;
                                                if(showbirthday==0) {
                                                    document.getElementById('dontshowmybirthyear').checked = true;
                                                }
                                            }

                                        </script>


                                        <div class="siteFormContainer">
                                            <div class="siteFormTitle">Birthday</div>
                                            <div class="siteFormBody">
                                                <select name="month" id="month" class="xsmall">
                                                    <option value="">Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>

                                                <select name="day" id="day" class="xsmall">
                                                    <option value="">Day</option>
                                                    <script>
                                                        for(var i=1;i<=31;i++) {
                                                            if(i<10)
                                                                document.write('<option value="0'+i+'">'+i+'</option>');
                                                            else
                                                                document.write('<option value="'+i+'">'+i+'</option>');
                                                        }
                                                    </script>
                                                </select>


                                                <select name="year" id="year" class="xsmall">
                                                    <option value="">Year</option>
                                                    <script>
                                                        today = new Date()
                                                        for(var i=today.getFullYear();i>=1900;i--) {
                                                            document.write('<option value="'+i+'">'+i+'</option>');
                                                        }
                                                    </script>
                                                </select>
                                                <input type="hidden" name="birthday" value="10/10/1982"/>
                                                <div class="topMargin">
                                                    <input type="checkbox" id="dontshowmybirthyear" name="dontshowmybirthyear" value="1" /> <label for="dontshowmybirthyear">Don't show my age</label>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            editBirthday();
                                        </script>


                                        <input type="hidden" name="joinform" value="1" /> <div class="siteFormContainer">
                                            <div class="siteFormTitle">Nationality</div>
                                            <div class="siteFormBody">
                                                <select id="nationality" name="nationality" class="medium">

                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="AP">Azores</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BA">Bosnia And Herzegowina</option>
                                                    <option value="XB">Bosnia-Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="VG">British Virgin Islands</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, The Democratic Republic</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="XE">Corsica</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Cote d\'Ivoire (Ivory Coast)</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="TP">East Timor</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TA">French Polynesia (Tahiti)</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard And Mc Donald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="EI">Ireland (Eire)</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People Repub</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Laos</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="ME">Madeira Islands</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States Of</option>
                                                    <option value="MD">Moldova, Republic Of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar (Burma)</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Reunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="KN">Saint Kitts And Nevis</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="XS">Serbia-Montenegro</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovak Republic</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia And The South Sand</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="NV">St. Christopher and Nevis</option>
                                                    <option value="SH">St. Helena</option>
                                                    <option value="LC">St. Lucia</option>
                                                    <option value="PM">St. Pierre and Miquelon</option>
                                                    <option value="VC">St. Vincent and the Grenadines</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard And Jan Mayen Islands</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="XU">Tristan da Cunha</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="UK">United Kingdom</option>
                                                    <option value="GB">Great Britain</option>
                                                    <option value="US" selected>United States</option>
                                                    <option value="UM">United States Minor Outlying Isl</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="XV">Vatican City</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="VI">Virgin Islands (U.S.)</option>
                                                    <option value="WF">Wallis and Furuna Islands</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="WS">Western Samoa</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="YU">Yugoslavia</option>
                                                    <option value="ZR">Zaire</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>


                                                </select>
                                            </div>
                                        </div> <div class="siteFormContainer">
                                            <div class="siteFormTitle">Sex</div>
                                            <div class="siteFormBody">
                                                <select name="sexe" class="small"><option id="sexe_" value="">-----</option><option id="sexe_female" value="female">Female</option><option id="sexe_male" value="male">Male</option></select>
                                            </div>
                                        </div>
                                        <div class="siteFormContainer">
                                            <div class="siteFormTitle">Picture</div>
                                            <div class="siteFormBody">
                                                <div style="float: left;padding-right:5px"><img src="http://leaguebook.com/avatars/b/80.png" /></div> <a href="javascript:void(0)" onclick="this.style.display='none';document.getElementById('xxxxn2').style.display='inline';">Upload new one...</a>
                                                <span id="xxxxn2" style="display:none"><input type="file" name="avatar" /> <span class="siteFormSubText">(<i18n>Max 4 MB<i18n>)</span></span>
                                                                </div>
                                                                </div>
                                                                <div class="siteFormSubmit">
                                                                    <div class="siteFormTitle">&nbsp;</div>
                                                                    <div class="siteFormBody">
                                                                        <button type="submit">Finish</button>
                                                                    </div>
                                                                </div>

                                                            </div></div></div><div class="box_bottom"><span class="box_bottom_right"></span><span class="box_bottom_left"></span></div></div>
                                                        </div>
                                                        </div>
                                                        </div>

                                                        <div id="footer"> &copy; 2013 League book
                                                        </div>




                                                        <div id="groups_bar">
                                                            <span id="groups_search_button" class="button">
                                                                <form id="search_form" action="http://leaguebook.com/dashboard/search" method="POST" autocomplete="off">
                                                                    <input type="search" id="groups_search_text" name="q" placeholder="Search in group">
                                                                </form>
                                                            </span>

                                                            <a id="groups_notifications_button" title="Notifications" class="button" href="javascript:;">Notifications<div id="groups_notification_count" class="count" style="display:none;"><img class="groups_bar_overlay" src="/images/groups_bar/overlay.png" />0</div></a>
                                                            <div id="groups_notifications_panel" class="panel">
                                                                <h6>Notifications</h6>
                                                                <ul>
                                                                    <a href="http://leaguebook.com/dashboard/alerts">There are no new Notifications</a>
                                                                </ul>
                                                            </div></div>

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
    
                                                            groups._info.domName = 'http://leaguebook.com';
                                                            groups._info.groupName = 'leaguebook';
                                                            groups._info.groupNameX = '';
                                                            groups._info.isMember = '1';
                                                            groups._info.isGroupAdmin = '';
                                                            groups._info.subscriptionName = '';
                                                            groups._info.shouldEmailSubscriptionNotification = '';
                                                            groups._info.obj1 = 'myprofile';
                                                            groups._info.userId = '13530230';
                                                            groups._info.userName = 'oajiivhbldxbldhwi';
                                                            groups._info.isMobile = '';
                                                            groups._info.module.name = 'dashboard';
                                                            groups._info.module.profileOwnerId = '';
                                                            groups._info.wikiPageCategoryId = '';
                                                            groups._info.wikiCategoryId = '';
                                                            groups._info.previewImage = '';

    
                                                            groups._info.module.designMode = !!window.hasPermission;

                                                            /*--------------*/

                                                            /*javascript_variables*/
    
                                                            groups._info.groupId = 704597;
                                                            groups._info.title = 'League book';
                                                            groups._info.moduleTitle = '';
                                                            groups._info.searchTypes = {'blogs':{title:'Blogs',actionURL:'http://leaguebook.com/blogs/search'},'chat':{title:'Chat',actionURL:'http://leaguebook.com/chat/search'},'people':{title:'Members',actionURL:'http://leaguebook.com/people/search'},'talks':{title:'Forum',actionURL:'http://leaguebook.com/talks/search'},'wiki':{title:'Wiki',actionURL:'http://leaguebook.com/wiki/search'},'files':{title:'Files',actionURL:'http://leaguebook.com/files/search'},'messages':{title:'Priv. Messages',actionURL:'http://leaguebook.com/dashboard/search_messages'}};
                                                            groups._info.language = 'english';
                                                            groups._info.languageRevision={custom:135260045,main:424,name:'english'};
                                                            groups._info.bannedWords = '';
                                                            groups._info.titleSeperator = ' | ';
                                                            groups._info.userNameSurname = 'Levi Limmex';
                                                            groups._info.userAvatar = 'http://leaguebook.com/avatars/b/80.png';
                                                            groups._info.chatConfig = null;groups._info.membershipId = '31280300';
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
                                                            window.applySajaxMethods = function(){['ExtraPages_addExtraPage','ExtraPages_getAddModulePanel','ExtraPages_get3rdAddModulePanel','ExtraPages_activateModules','deleteAction','saveStatusMessage','getMemberActions','addTwitterAssociation','reportIssue','facebookconnect_signup','zendSupport','sendSupportTicket','facebookconnect_control','updateEntrySimple','pollVote','dont_show_change_layout','ExtraBlocks_getModulesListForModuleBox','getModulesListForModuleBox','ExtraBlocks_addBlock'].each(function(f){window["x_"+f]=function(){return _S(f, Array.prototype.slice.apply(arguments));};});};

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
                                                                        window.location.href = 'http://leaguebook.com/'+res[1]+'/edit';
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
                                                                    window.open('http://leaguebook.com/'+extra_page_key+'/edit','static_page');
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
                                                                            window.location.href = 'http://leaguebook.com/'+res[1];
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
                                                                    window.location.href = 'http://leaguebook.com/'+extra_page_key;
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


                                                                    document.location.href = "http://leaguebook.com/" + res;

                                                                    /*
                                                                                        if(add_from=='admin') {
                                                                                                groups.RenderController.hideModal();
                                                                                                addItem(res);
                                                                                        }
                                                                                        else {
                                                                                                var txt = '<h1>Add Module</h1>';
                                                                                                txt += '<div class="info">Your changes are successfully saved. If you want to administrate your pages, click <a href="http://leaguebook.com/admin/pages">here</a> or <a href="javascript:document.location.reload(true)">click</a> to continue...</div>';
                                                                                                groups.RenderController.showModal(txt);
                                                                                        }*/

                                                                } else {
                                                                    document.location.href = "http://leaguebook.com/admin/pages";
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


                                                        <script type="text/javascript" rel="compressed" charset="utf-8" src="/public/js/min.grouppage.js?b=1359739035"></script>

                                                        <script type="text/javascript" src="http://s.skimresources.com/js/6948X660046.skimlinks.js"></script>
                                                        <!-- footer scripts end --></body>
                                                        </html>
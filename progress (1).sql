-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2014 at 05:34 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progress`
--

-- --------------------------------------------------------

--
-- Table structure for table `prog_comments`
--

CREATE TABLE IF NOT EXISTS `prog_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eId` int(11) NOT NULL,
  `e_title` varchar(200) NOT NULL,
  `u1id` int(11) NOT NULL,
  `u1name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-delete | 1-visible',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `prog_comments`
--

INSERT INTO `prog_comments` (`id`, `eId`, `e_title`, `u1id`, `u1name`, `comment`, `status`, `date`) VALUES
(2, 9, 'NAVIBAR FUNCTION IMPLEMENT', 1, 'Danny Lee', 'SETTING PART BASIC VERSION HAS FINISHED<div>ONLY "EVENT CATEGORY" CAN BE ADDED AND REMOVE</div>', 1, '2014-03-20 05:55:51'),
(4, 10, 'PROGRESS DETAIL PAGE BE EDITABLE', 1, 'Danny Lee', '[Feature] Events are editable Finished&nbsp;', 1, '2014-03-20 08:38:58'),
(5, 10, 'PROGRESS DETAIL PAGE BE EDITABLE', 1, 'Danny Lee', 'asd', 0, '2014-03-20 09:43:26'),
(6, 10, 'PROGRESS DETAIL PAGE BE EDITABLE', 1, 'Danny Lee', '[Feature] Comments in Event is editable and removable', 1, '2014-03-20 09:51:57'),
(7, 9, 'NAVIBAR FUNCTION IMPLEMENT', 1, 'Danny Lee', '<div>TODO PART FINISHED</div>DONE PART FINISHED<div>GOING PART WAS REMOVED SINCE IT SHOW THE SAME CONTENT WITH TODO PART</div>', 1, '2014-03-20 09:58:05'),
(8, 7, 'CALENDER', 1, 'Danny Lee', '', 0, '2014-03-21 02:07:05'),
(9, 13, 'DISPLAY CATEGORY IN EVENT LIST', 1, 'Danny Lee', '<div>Finished with effect as below image</div><img src="http://f-1.tuzhan.com/a3730fb8d9e1/p-2/l/2014/03/21/10/1016bf335c0342fe9ffe8a41642772ad.png">', 1, '2014-03-21 02:27:54'),
(10, 3, 'CHECK THE SOURCE CODE ENVIRONMENT', 1, 'Danny Lee', 'FIXED<div>Error Output as below</div><div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div><div>Get ssh://android.intel.com/admin/repo.git</div></div><div><div>ssh: connect to host shlabacsbb06.sh.intel.com port 29418: Connection refused</div></div><div><div>fatal: The remote end hung up unexpectedly</div></div></blockquote><div><br></div><div>I did not find the exact reason but a solution.</div><div>Below is some tips and attention while setup the environment</div><div><br></div><div>TIP1 : Execute the following commands to add the gerrit public key (master and slave) in the ~/.ssh/known_hosts</div><div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>ssh-keyscan -p 29418 android.intel.com &gt;&gt; ~/.ssh/known_hosts</div><div>ssh-keyscan -p 29418 10.23.31.5 &gt;&gt; ~/.ssh/known_hosts</div><div>ssh-keyscan -p 29418 <your_local_mirror> &gt;&gt; ~/.ssh/known_hosts</your_local_mirror></div><div>ssh-keyscan -p 29418 <your_local_mirror_ip_addr> &gt;&gt; ~/.ssh/known_hosts</your_local_mirror_ip_addr></div></blockquote><div><br></div><div><your_local_mirror> and &lt; your_local_mirror_ip_addr&gt; can choose from table below</your_local_mirror></div><div><br></div><div><table class="confluenceTable" style="color: rgb(51, 51, 51); border-collapse: collapse; margin: 0px; overflow-x: auto; font-size: 13px; font-family: Verdana; line-height: 19px; background-color: rgb(255, 255, 255);"><tbody><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;"><strong>Site</strong></td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;"><strong>Gerrit mirror</strong></td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;"><strong>IP Address</strong></td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Oregon (Jones Farm)</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">jfumg-gcrmirror.jf.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.23.31.22, 10.23.31.23, 10.23.31.91</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Folsom</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">fm-gcr-glb.fm.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.96.2.27, 10.96.68.18</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Toulouse (CAM1/2) / Munich</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">gerrit-glb.tl.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.102.165.201</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Shanghai</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">mcg-psi-gcr-glb.sh.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.239.144.17, 10.239.146.17</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Beijing</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">gerrit-bj1.bj.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.238.229.84</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Tampere</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">repo-mirror.tm.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.237.53.27</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Nice</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">ncsgit002.nc.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">172.28.195.20</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Bangalore</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">umpe-gcrmirror1.iind.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.223.94.14</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Toulouse (Celad)</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">gerrit-celad.tl.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.102.242.12</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Toulouse (SII)</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">gerrit-sii.tl.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.102.241.200</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Toulouse (AUSY)</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">gerrit-ausy.tl.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.102.243.10</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Jerusalem</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">jer-mcg-gcrmirror1.jer.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.12.253.65</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Korea</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">ctssw03.ikor.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.227.14.11</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">Taiwan</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">mcg-mirror.itwn.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">10.241.123.38</td></tr><tr style="font-size: 10pt !important;"><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">United Kingdom</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">mlpgit003.iwi.intel.com</td><td class="confluenceTd" style="border: 1px solid rgb(221, 221, 221); padding: 7px 10px; vertical-align: top; font-size: 10pt !important;">172.28.253.10</td></tr></tbody></table></div><div><b>Beijing Mirror was new added &nbsp;</b></div><div>I choose this mirror replacing the shanghai mirror and solved this problem</div><div><br></div><div>TIP2 : When you finished creating ssh public key and paste it into https://android.intel.com:8080 settings.</div><div>you can check whether it works well with below command</div><div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div><br></div><div>$ ssh android.intel.com gerrit ls-projects</div><div><br></div></blockquote><br></div><div><div>Reference URL :</div><div>&nbsp;<a href="http://wiki.ith.intel.com/display/CACTUS/2.1.1+-+Getting+Access#id-2.1.1-GettingAccess-GerritReviewServer">http://wiki.ith.intel.com/display/CACTUS/2.1.1+-+Getting+Access#id-2.1.1-GettingAccess-GerritReviewServer</a><br></div><div><br></div><div><br></div></div>', 1, '2014-03-21 07:40:56'),
(11, 3, 'CHECK THE SOURCE CODE ENVIRONMENT', 1, 'Danny Lee', '', 0, '2014-03-21 08:23:57'),
(12, 9, 'NAVIBAR FUNCTION IMPLEMENT', 1, 'Danny Lee', 'DONE PART OPTIMIZED<div>EVENTS ARE LISTED ORDER BY THEIR FINISHED TIME</div><div>EFFECT AS BELOW</div><div><img src="http://f-1.tuzhan.com/4573192bad79/p-2/l/2014/03/21/16/ae41ad6bc981437f8e5104bc5ec45f6d.png"><br></div>', 1, '2014-03-21 08:30:24'),
(13, 14, 'HELP RICHARD CHECK BUG 180842', 1, 'Danny Lee', 'ERROR MEASUREMENT FOR USERMODE IMAGE CAPTURE CASE.<div>I DID NOT TAKE IMAGE EVERY 30 SECONDS, IT TURNS OUT THE SIMILAR RESULT AS PREVIEW CASE</div><div>THIS WORK DELAYED TO NEXT WEEK</div>', 1, '2014-03-21 10:25:19'),
(14, 15, 'ADD USERMODE CASE TO MOOREFLD', 1, 'Danny Lee', 'Using cmd below&nbsp;to start camera<div><ul><li>&nbsp;adb shell am start -n com.intel.camera22/.Camera&nbsp;<br></li></ul></div><div>This event has been finished. Thanks for WangJian (Camera Team)<br></div><div><div><br></div><div>TIPS 1 : using command below, you can find what command to launch program</div></div><div><ul><li>adb logcat -s ActivityManager</li></ul></div>', 1, '2014-03-24 07:27:05'),
(15, 14, 'HELP RICHARD CHECK BUG 180842', 1, 'Danny Lee', '<div>After integrating the Usermode image capture case into auto-vpnp, I hava measured the socwatch data and power data</div><div><br></div><div>Device: <b>MOD_V0_64 PRH</b></div><div>Power: <b>2974.52mW</b></div><div>Socwatch data:&nbsp;</div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>NC-04 Video encoder D0i3 <b>99.3%</b></div></blockquote><div><br></div>BUG URL:<a href="http://shilc211.sh.intel.com:41006/show_bug.cgi?id=180842">http://shilc211.sh.intel.com:41006/show_bug.cgi?id=180842</a><div><br></div>', 1, '2014-03-24 07:47:27'),
(16, 16, 'MOD_V0_64 WEEKLY MEASUREMENT', 1, 'Danny Lee', 'Phone Flash Tool update to 4.4.2. The Hardware changed as below<div><img src="http://f-1.tuzhan.com/6fc01d0fa1e8/p-2/l/2014/03/24/16/0b4511e7e99f43f693de3f4684c1ca40.png"><br></div><div>The relationship between select tag name and device as below</div><div><br></div><div>mofd_A0_6360 &nbsp;-- &nbsp;MooreField V0 VV Board</div><div>mofd_A0_7160 &nbsp;-- &nbsp;MooreField V0 PRH</div><div>mofd_A0_7260 &nbsp;-- &nbsp;MooreField V1 VV Board</div>', 1, '2014-03-24 08:17:15'),
(17, 16, 'MOD_V0_64 WEEKLY MEASUREMENT', 1, 'Danny Lee', 'Case `video_playback_720p_60fps` remove<div>Case `usermode image capture` added</div><div>Modification to do:</div><div><b>xls_analyzer &nbsp;raw2db.py &nbsp;</b>did not parse the usermode.csv to database.</div><div>Changing the config file &nbsp;<b>analyze.conf</b>. in MOOREFLD section change as below&nbsp;</div><div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>file7 = video_playback_720p_60fps ==&gt; file7&nbsp;= usermode</div></blockquote>', 1, '2014-03-25 08:45:28'),
(18, 16, 'MOD_V0_64 WEEKLY MEASUREMENT', 1, 'Danny Lee', 'The result data has been store into the database. We can browser it through<div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>&nbsp; <a href="http://vpnp-workstation1.bj.intel.com">http://vpnp-workstation1.bj.intel.com</a></div></blockquote><div><br><div>The raw data files has been uploaded to</div><div><br></div></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div><div>&nbsp; <a href="\\\\vpnp-workstation1.bj.intel.com\\vpnp_data\\MOOREFLD\\MOOREFLD_WW12">\\\\vpnp-workstation1.bj.intel.com\\vpnp_data\\MOOREFLD\\MOOREFLD_WW12</a></div></div></blockquote>', 1, '2014-03-25 09:11:39'),
(19, 18, 'SETTING PART OF SOCDATA', 1, 'Danny Lee', '&nbsp;Basic view implement as below<div><img src="http://f-1.tuzhan.com/c3ced04233f5/p-2/l/2014/03/25/17/456b10cad505436a8cff1b8925afd1d2.png"><br></div><div>Implement <b>ADD | EDIT | REMOVE</b> Function tomorrow</div>', 1, '2014-03-25 09:21:50'),
(20, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', '<p class="MsoNormal">VP9 test clips as well as the test tools can be found under</p><p class="MsoNormal">sighting@UMGMultiMediaServer.bj.intel.com:/home/sighting/MOFD-Android-bugs/vp9-clips</p><p class="MsoNormal">pwd: sighting</p><p class="MsoNormal"><br></p><p class="MsoNormal">Test steps on MOFD are as follows,</p><p class="MsoNormal"></p><ol><li>adb push libvpx.so /system/lib/<br></li><li>rename libstagefright_soft_vpxdec.so.mofd to libstagefright_soft_vpxdec.so, and adb push libstagefright_soft_vpxdec.so to /system/lib/<br></li><li>rename stagefright.mofd to stagefright and adb push stagefright to /system/bin/<br></li><li>run “/system/bin/stagefright –S vp9clips” to collect the pure decoding performance data or collect SoCWatch report for further analysis</li></ol><p class="MsoNormal">BTW, the command to set CPU minimum frequency is as below,<br></p><p class="MsoNormal" style="text-align: left;"></p><ul><li>#echo 2333000 &gt; /sys/devices/system/cpu/cpu0/cpufreq/scaling_min_freq<br></li><li>#echo 2333000 &gt; /sys/devices/system/cpu/cpu1/cpufreq/scaling_min_freq<br></li><li>#echo 2333000 &gt; /sys/devices/system/cpu/cpu2/cpufreq/scaling_min_freq<br></li><li>#echo 2333000 &gt; /sys/devices/system/cpu/cpu3/cpufreq/scaling_min_freq</li></ul>', 1, '2014-03-26 02:43:38'),
(21, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', '<div>Failed to execute command in Step4</div><div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>1|root@mofd_v0:/ # /system/bin/stagefright -S vp9clips &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div><div>Unable to create data source.</div></blockquote><div><br></div>', 1, '2014-03-26 03:33:45'),
(22, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', 'As for the error in Step 4, it was caused by my misunderstanding of the parameter vp9clips.<div>Below is an example:</div><div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>/system/bin/stagefright -S /sdcard/tears_of_steel_1080p30x6000f_10mbps.4t.vp9.webm</div></blockquote><div><br></div><div>vp9clips means the vp9 clip, it is better to change it to "path_to_vp9_clip_file" for better understanding<br><div><div><br></div></div></div>', 1, '2014-03-26 05:59:12'),
(23, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', '<div><b>[TIPS]</b></div>Disable CPU<div><br></div><div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>echo 0 &gt; /sys/devices/system/cpu/cpu1/online</div><div><br></div></blockquote></div><div><div>Enable CPU</div></div><div><br></div><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>echo 1 &gt; /sys/devices/system/cpu/cpu1/online</div></blockquote>', 1, '2014-03-26 08:12:49'),
(24, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', 'Related Bug&nbsp;<a href="http://shilc211.sh.intel.com:41006/show_bug.cgi?id=86162">http://shilc211.sh.intel.com:41006/show_bug.cgi?id=86162</a><div>I applied a patch(<a href="https://android.intel.com/#/c/174128/">https://android.intel.com/#/c/174128/</a>) in main-weekly build 2014ww11 and rebuild the kernel.</div><div><ul><li>Need reflashing the MOFD PRH with built flash files in <b>pub</b> directory.<br></li><li>Change the Governor of CPU<br></li><li>Collect the Socwatch data</li></ul></div>', 1, '2014-03-26 08:36:58'),
(25, 18, 'SETTING PART OF SOCDATA', 1, 'Danny Lee', '<div><b>[EVENT DONE]</b></div>ADD | EDIT | REMOVE function implemented', 1, '2014-03-26 08:44:53'),
(26, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', 'Richard thought the related Bug should be&nbsp;<a href="http://shilc211.sh.intel.com:41006/show_bug.cgi?id=86162#c133">http://shilc211.sh.intel.com:41006/show_bug.cgi?id=86162#c133</a><div><br></div><div>Related Patches</div><div><br></div><div><div><ol><li><a href="https://android.intel.com:443/162023">https://android.intel.com:443/162023</a> # 2014-02-14 # cpufreq: extracting cpu_utilization from the cpufreq governors, patchset 4<br></li><li><a href="https://android.intel.com:443/162024">https://android.intel.com:443/162024</a> # 2014-02-14 # sched: shielding or unshielding using cpu utilization, patchset 4<br></li><li><a href="https://android.intel.com:443/162025">https://android.intel.com:443/162025</a> # 2014-02-14 # i386_byt_defconfig: def config change to enable module shielding, patchset 4<br></li></ol></div></div>', 1, '2014-03-26 09:16:28'),
(27, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', 'After finishing compile the build with patches above, I collect the socwatch data<div>The fps of soft-decode up to <b>34.93 with governor interactive</b>. A little better</div><div>However, if change the governor to "performance". the fps drop to <b>25.67.&nbsp;</b></div><div><b><br></b></div><div>I redo the measurement with richard, found that the fps randomly changed time to time with the same settings.</div><div>Try to run single shell script to collect the socwatch data.</div>', 1, '2014-03-27 05:47:37'),
(28, 6, 'MOOREFLD OPT PLAN', 1, 'Danny Lee', 'Have 1:1 talk with Xubihuan &amp; Richard about how to do MOOREFLD_VIDEO_OPT_PLAN<div><br></div><div><ol><li>ISSUES : After comparing the status data and target, find issues with big gap&nbsp;</li><li>BUGS &nbsp; : Find related bugs or file a bug for the issue</li><li>ETA &nbsp; &nbsp;: Track the bug with a expected time of accomplish</li></ol></div>', 1, '2014-03-27 09:23:08'),
(29, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', 'The shell script collecting the socwatch data was finished and test.<div>However, the phenomenon still appear.(device reboot between each measurment)</div><div><br></div><div><ol><li>governor:interactive &nbsp;min_freq:2333000 &nbsp; avg_fps:29.13</li><li>governor:interactive &nbsp;min_freq:2333000 &nbsp; avg_fps:24.52</li><li>governor:interactive &nbsp;min_freq:2333000 &nbsp; avg_fps:30.89</li></ol></div><div><br></div><div>Keep tracking this issue.</div>', 1, '2014-03-28 06:04:47'),
(30, 20, 'DOWNLOAD WW12 SOURCE CODE', 1, 'Danny Lee', 'Scheduled the auto-download shell script work at 2014-03-30 12:00:00<div>Event done</div>', 1, '2014-03-28 09:37:51'),
(31, 6, 'MOOREFLD OPT PLAN', 1, 'Danny Lee', 'Finish part of Optimize plan, targets part has been finished<div><ol><li>VIDEO PLAYBACK&nbsp;</li><li>VIDEO RECORD</li><li>VIDEO STREAMING</li><li>USERMODE IMAGE CAPTURE</li></ol><div>Continue the work next week<br></div><div><br></div></div>', 1, '2014-03-28 09:44:21'),
(32, 23, 'PROCUREMENT PLAN', 1, 'Danny Lee', '海鹏达 大颗粒拼插积木 89大块 乐高式拼装积木 ABS塑料 儿童益智玩具YY-0824&nbsp;<div><a href="http://item.jd.com/1020996022.html">http://item.jd.com/1020996022.html</a><br></div><div>用来固定手机</div>', 1, '2014-03-31 02:56:48'),
(33, 25, 'test2', 1, 'Danny Lee', 'sdfdsf', 1, '2014-03-31 08:03:28'),
(34, 25, 'test2', 1, 'Danny Lee', 'sdfsdfsdf', 1, '2014-03-31 08:03:31'),
(35, 25, 'test2', 1, 'Danny Lee', 'sdfsdf', 1, '2014-03-31 08:03:34'),
(36, 25, 'test2', 1, 'Danny Lee', 'sssssssssss', 1, '2014-03-31 08:03:36'),
(37, 25, 'test2', 1, 'Danny Lee', 'sssssssssssssssssssssssssssssssssdfdsf<div>sdfds</div><div><br></div><div><br></div><div><br></div><div>sdfdsf</div><div><br></div><div><br></div><div><br></div><div>sdf</div><div>sdf</div>', 1, '2014-03-31 08:03:47'),
(38, 25, 'test2', 1, 'Danny Lee', 'sdfdsf', 1, '2014-03-31 08:03:55'),
(39, 25, 'test2', 1, 'Danny Lee', 'asdasd test<div>test</div>', 1, '2014-03-31 08:49:05'),
(40, 22, 'OPERATION LOG', 1, 'Danny Lee', 'Database table `prog_history`&nbsp;structure:<blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>id-userId-username-obj_type-action_type-action-rId-url-datetime</div></blockquote><div>Add event title in `prog_comment`</div>', 1, '2014-03-31 09:40:19'),
(41, 21, 'AUTO VPNP ROADMAP', 1, 'Danny Lee', 'This issue was came up with at ww14 weekly sync.<div><br><div>Finish it this week.</div></div>', 1, '2014-03-31 09:53:01'),
(42, 24, 'MEASUREMENT OF BUILD WW13', 1, 'Danny Lee', 'Finish measurement and socwatch collection<div>Refers to&nbsp;<a href="http://vpnp-workstation1.bj.intel.com/">http://vpnp-workstation1.bj.intel.com/</a></div><div>MOOREFLD PRH 2014WW13</div><div><br></div><div>Raw file data has been uploaded to Samba Server</div><div><a href="\\\\vpnp-workstation1\\vpnp_data\\MOOREFLD\\MOOREFLD_WW13">\\\\vpnp-workstation1\\vpnp_data\\MOOREFLD\\MOOREFLD_WW13</a><br></div><div><br></div>', 1, '2014-03-31 09:59:30'),
(43, 23, 'PROCUREMENT PLAN', 1, 'Danny Lee', 'The procurement plan has been submitted to Richard.', 1, '2014-03-31 10:00:55'),
(44, 19, 'VP9 Android Build Issues', 1, 'Danny Lee', 'This issue was talk on ww14 weekly sync up. It should be caused by the temperature change.<div>Since the heat dissipation is not good on Moorefield PRH, which has a bad influence of the FPS.</div><div>However, on Moorefield VV Board, the fps meet the target.&nbsp;</div>', 1, '2014-03-31 10:06:12'),
(45, 26, 'test for event', 1, 'Danny Lee', 'test comment edit for test', 0, '2014-04-01 02:26:01'),
(46, 26, 'test for event', 1, 'Danny Lee', 'addd', 0, '2014-04-01 02:26:48'),
(47, 22, 'OPERATION LOG', 1, 'Danny Lee', 'Operation such as new | edit | finish | delete to Event | Category | Settings can be record in the `prog_history` table<div>Add a HISTORY entry block on the header bar</div><div><img src="http://f-1.tuzhan.com/a39bd2ccff0b/p-2/l/2014/04/01/15/9cfe66e3d9834924ad43af689d52f481.png"><br></div><div>Event done</div>', 1, '2014-04-01 07:38:23'),
(48, 9, 'NAVIBAR FUNCTION IMPLEMENT', 1, 'Danny Lee', 'New function Added to header navibar "HISTORY"<div>This Section will show the operation user did, such as</div><div>Add event | Edit Event | Finish Event | Delete event</div><div>Add Comment | Edit comment | Delete comment&nbsp;</div><div>Add Setting-Category | Delete Setting-Category</div>', 1, '2014-04-01 07:46:34'),
(49, 15, 'ADD USERMODE CASE TO MOOREFLD', 1, 'Danny Lee', '&lt;code&gt;printf("helloworld!\n")&lt;/code&gt;', 0, '2014-04-01 08:47:56'),
(50, 15, 'ADD USERMODE CASE TO MOOREFLD', 1, 'Danny Lee', '&lt;blockqoute&gt;aaaa&lt;/blockqoute&gt;', 0, '2014-04-01 08:51:19'),
(51, 15, 'ADD USERMODE CASE TO MOOREFLD', 1, 'Danny Lee', 'a&lt;/div&gt;a&lt;div&gt;', 0, '2014-04-01 08:52:05'),
(52, 21, 'AUTO VPNP ROADMAP', 1, 'Danny Lee', '<div>Roadmap</div><div><br></div><div><b>Develope a USB Switch board</b></div><div>Image below shows the relay board we are using. It use relays to implement the switch function.&nbsp;<br></div><div><img src="http://f-1.tuzhan.com/106edf410525/p-2/l/2014/04/02/14/f025bfb2435342fe86abf33b053b0d28.jpg"><br></div><div>Since we cut the usb plugin in the middle and connect the wires to different relays, which makes the connection unstable and being disturbed easily. We used tinfoil to wrap the wires to make the interference less.&nbsp;</div><div>Even though, it is hard to copy a board like it we are using.&nbsp;</div><div><i>We should redesign and develope a switch board with USB sockets&nbsp;</i></div><div><img src="http://f-1.tuzhan.com/891529442e0b/p-2/m/2014/04/02/14/2138d76742b040a3825849897f20e529.png"><br></div><div><b>Re-struct the Auto Video PnP Toolkit Client &amp; Server Part</b></div><div><ul><li>Parallel working to make it can collect socwatch data and power from two differen device at the same time.</li></ul></div><div><b>Auto Video PnP Toolkit Client Part GUI Version</b></div><div><ul><li>develop a GUI version for much easier to use and better user experience</li></ul></div><div><b>Make a Simplify version for simple use without USB Switch board</b></div><div><ol><li>socwatch data collection only<br></li><li>socwatch data collection &amp;&amp; power measurement<br></li></ol></div><div><b>Auto Video PnP Toolkit User manual</b></div><div><ul><li>Write a user manual shows the installation | setup | Usage etc<br></li></ul></div>', 1, '2014-04-02 09:42:38'),
(53, 21, 'AUTO VPNP ROADMAP', 1, 'Danny Lee', 'Roadmap has been confirmed with Richard.<div>Event Done</div>', 1, '2014-04-02 09:45:37'),
(54, 6, 'MOOREFLD OPT PLAN', 1, 'Danny Lee', 'Ask Sanjeev N. Anigol for RLB data of Build ww13 on MOFD', 1, '2014-04-03 03:04:06'),
(55, 6, 'MOOREFLD OPT PLAN', 1, 'Danny Lee', '<p style="margin: 12px 15px;">Thanks for Sanjeev''s Sharing.</p><p style="margin: 12px 15px;">Since they did not collect the WLAN 720p streaming RLB data</p><p style="margin: 12px 15px;">talk with Richard about the next step in 1:1<br></p>', 1, '2014-04-03 08:13:52'),
(56, 6, 'MOOREFLD OPT PLAN', 1, 'Danny Lee', 'Finished the MOFD Optimize Plan WW13 and mailed to Richard', 1, '2014-04-04 09:12:51'),
(57, 31, 'DOWNLOAD WW14 SOURCE CODE', 1, 'Danny Lee', 'Schedule the auto-download shell script run at 2014-04-07 12:00', 1, '2014-04-04 09:31:41'),
(58, 32, 'MEASUREMENT OF BUILD WW14', 1, 'Danny Lee', '<div><div>Finished the power measurement and Socwatch data collection.</div></div><ol><li>video playback 1080p 30fps has increased 77mw</li><li>video playback 1080p 60fps increased 105mw</li><li>usermode case has a big regression of 228mw<br></li></ol><div>MORE INFORMATION REFERS TO&nbsp;</div><div><a href="http://vpnp-workstation1.bj.intel.com/">http://vpnp-workstation1.bj.intel.com/</a></div><div>MOOREFIELD PRH 2014WW14</div><div>Raw file has been uploaded to&nbsp;<a href="\\\\vpnp-workstation1\\vpnp_data\\MOOREFLD\\MOOREFLD_WW14">\\\\vpnp-workstation1\\vpnp_data\\MOOREFLD\\MOOREFLD_WW14</a></div>', 1, '2014-04-08 08:43:24'),
(59, 34, 'MEASUREMENT OF BUILD WW15', 1, 'Danny Lee', 'Event finished<div>Socwatch data report refers to&nbsp;<a href="http://vpnp-workstation1.bj.intel.com/index.php">http://vpnp-workstation1.bj.intel.com/index.php</a></div><div>Platform: MOOREFLD &nbsp;</div><div>Device: &nbsp;PRH</div><div>Version: 2014WW15</div><div><br></div><div>Socwatch data raw files has been uploaded to<a href=" \\\\vpnp-workstation1vpnp_data\\MOOREFLD "> \\\\vpnp-workstation1vpnp_data\\MOOREFLD&nbsp;</a></div>', 1, '2014-04-14 06:21:49'),
(60, 36, 'Enable BW Measurement on MOFLD', 1, 'Danny Lee', '<div>Below is the socwatch 1.4a output while collecting the Memory BW.</div><div><br></div><div>** INTEL INTERNAL USE ONLY **</div><div>Intel (R) SoC Watch Tool Version 1.4.0 (INTERNAL) [Apr 02 2014]</div><div>Copyright (c) 2009-2014, Intel Corp. All Rights Reserved.</div><div>For use with Intel(R) processors, chipsets and platforms.</div><div>email: SoCWatchDevelopers@intel.com</div><div>----------------------------------------------------------</div><div><br></div><div>Please review the Known Issues list on the SoC Watch wiki to interpret the results correctly.</div><div>Max-Detail Request Triggered ...</div><div>Collecting...</div><div>CPU - CStates Residency - trace</div><div>CPU - PStates Residency - trace</div><div>North Complex States &nbsp;- poll (warning - polling will cause timer wakeups)</div><div>South Complex Device(s) Residency &nbsp;- snapshot</div><div>DDR Memory Bandwidth &nbsp;- poll (warning - polling will cause timer wakeups)</div><div>Android Wakelock &nbsp;- trace</div><div>-1, SOCHAPVISA ERROR configuring VISA interface...</div><div><br></div><div>It seems that we need do some modification on SOCWatchConfig.txt or some other config files</div><div>Richard has mailed Lattannavar Sameer for help</div>', 1, '2014-04-14 09:07:40'),
(61, 33, 'HELP LIYONG COLLECT RLB DATA HSI', 1, 'Danny Lee', 'Absent for three days with reason of illness<div>This event end up with nothing definite</div>', 1, '2014-04-14 10:03:51'),
(62, 29, 'TARGET COMPARISONC', 1, 'Danny Lee', '<div>Things need to be done before comparison</div><ol><li>Design the Targets DB table and form table first<br></li><li>Add Related targets</li></ol><div><br></div>', 1, '2014-04-15 06:54:17'),
(63, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'Waiting for tianmi''s support for the clips', 1, '2014-04-16 01:49:16'),
(64, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'file://TCHEN38-MOBL1/Users/tchen38/Desktop/HEVC/1080P', 1, '2014-04-16 01:59:07'),
(65, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'Replace the libvpx.so and libstagefright_soft_vpxdec.so before playing vp9 case', 1, '2014-04-16 05:15:07'),
(66, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'The power consumption and C/P-state has been measured on MOFLD PRH<div>Since Tianmi said there is Thermal issue which may impact CPU performance</div><div>And the data measured is not aligned with Tianmi''s data</div><div>However my VVBoard has been upgraded to B0 silicon and the Current Socwatch tool does</div><div>not support the B0 silicon well.</div>', 1, '2014-04-16 08:21:51'),
(67, 28, '[BUG] Form validation', 1, 'Danny Lee', 'Sigle quote problem has been solved in part Comment Add &amp; Update with addslashes() function', 1, '2014-04-16 08:25:12'),
(68, 28, '[BUG] Form validation', 1, 'Danny Lee', 'hello\\'' world', 0, '2014-04-16 08:25:33'),
(69, 28, '[BUG] Form validation', 1, 'Danny Lee', 'test\\\\\\'' &nbsp;test', 0, '2014-04-16 08:29:44'),
(70, 28, '[BUG] Form validation', 1, 'Danny Lee', 'hello\\''world', 0, '2014-04-16 08:31:23'),
(71, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'Thanks for Richard’s help, we got a VV Board with A0 silicon from Wangkun<div>I have finished the C/P state collection and power measurement on MOFD-A0-VV</div><div>and the result has been mailed</div>', 1, '2014-04-16 10:00:54'),
(72, 38, 'test', 1, 'Danny Lee', 'aaaa'' &nbsp;aaa''', 0, '2014-04-16 10:06:54'),
(73, 38, 'test', 1, 'Danny Lee', 'aaaa', 0, '2014-04-17 01:36:47'),
(74, 38, 'test', 1, 'Danny Lee', 'aa''aa''', 0, '2014-04-17 01:36:52'),
(75, 38, 'test', 1, 'Danny Lee', 'aaaa', 0, '2014-04-17 01:38:43'),
(76, 38, 'test', 1, 'Danny Lee', 'aaa''', 0, '2014-04-17 01:38:49'),
(77, 38, 'test', 1, 'Danny Lee', 'aaaa''<div>&nbsp;</div><div>&nbsp;cc'' &nbsp;dd''</div>', 1, '2014-04-17 01:38:55'),
(78, 38, 'test', 1, 'Danny Lee', 'test''s fail'' ''a'' &nbsp;<div><br></div><div>ddd''</div><div><br></div><div>ccc'' &nbsp;sss ''</div>', 1, '2014-04-17 01:58:39'),
(79, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'Help Tianmi Retrieve the 8 clips'' render FPS, result as below&nbsp;<div><br><div><div><br></div><div>tears_of_steel_1080p30x6000f_10mbps.4t.vp9.webm: &nbsp; &nbsp; playbackDuration=199.957993, render_FPS=<b>28.510988</b>&nbsp;</div><div>tears_of_steel_1080p30x6000f.4t.vp9.webm : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; playbackDuration=166.626999, render_FPS=<b>30.001141</b>&nbsp;</div><div>tears_of_steel_1080p30x6000f_6mbps.4t.vp9.webm: &nbsp; &nbsp; &nbsp; playbackDuration=199.962997, render_FPS=<b>29.515461</b>&nbsp;</div><div>tears_of_steel_1080p30x6000f_8mbps.4t.vp9.webm.log: playbackDuration=199.962006, render_FPS=<b>29.115532</b>&nbsp;</div><div><div>BQTerrace_1920x1080_60_qp27.mp4 : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; playbackDuration=19.969000, render_FPS=<b>29.996494</b>&nbsp;</div><div>Cactus_1920x1080_50_qp22.mp4: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; playbackDuration=16.635000, render_FPS=<b>29.996994</b>&nbsp;</div></div><div>Waves_hevc_10_track1__70__.hevc.mp4: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;playbackDuration=59.973000, render_FPS=<b>29.996832</b>&nbsp;<br></div><div>casino_1920x1080_30_randomaccess_NOAMP_10Mbps_4565f_hm10.mp4: &nbsp;playbackDuration=152.134995, render_FPS=<b>29.736748</b>&nbsp;<br></div><div><br></div></div><div><br></div></div>', 1, '2014-04-17 03:41:31'),
(80, 38, 'test', 1, 'Danny Lee', 'asdsad'' as''sss', 1, '2014-04-17 05:07:43'),
(81, 28, '[BUG] Form validation', 1, 'Danny Lee', 'Single quote problem has been solved in part Event Add &amp; Update&nbsp;', 1, '2014-04-17 05:09:30'),
(82, 37, 'MOFDv2 VP9/HEVC PnP ', 1, 'Danny Lee', 'After Tianmi changed VV Board and collected the similar data with I got yesterday<div>The issue was closed</div>', 1, '2014-04-17 05:51:45'),
(83, 36, 'Enable BW Measurement on MOFLD', 1, 'Danny Lee', 'I found that a new version 1.4b is available on <a href="http://socwatch.intel.com">http://socwatch.intel.com</a><div>Description as below<br><div><ul><li>The v1.4.1 drivers are expected to be merged into the PSI build during WW16. Firmware changes that enable the visa-based metrics are also expected to be released in the WW14 build. Note that this package assumes an ANN B0 SoC wrt programming the hardware to measure bandwidths or DRAM self-refresh. To measure bandwidths or DRAM self-refresh on an ANN A0 based SoC, copy all of the files from the anniedale_sochap_A0 directory to the anniedale_sochap directory on the target.</li></ul><div>However I got the same return as socwatch_1.4a, both A0 and B0 on VV Board V0<br></div></div></div>', 1, '2014-04-17 05:54:17'),
(84, 36, 'Enable BW Measurement on MOFLD', 1, 'Danny Lee', 'I test the socwatch 1.4b on Moorefield PRH too, the same result.<div>failed to collect Memory BW data</div>', 1, '2014-04-17 06:37:24'),
(85, 35, 'MOOREFLD OPT PLAN WW15', 1, 'Danny Lee', 'Since Sanjeev is on vacation, the RLB data could be delayed', 1, '2014-04-17 08:25:24'),
(86, 35, 'MOOREFLD OPT PLAN WW15', 1, 'Danny Lee', 'Since there is some setup issue, the <b>WIFI</b> does not work and the related cases are ignored&nbsp;', 1, '2014-04-17 09:44:04'),
(87, 35, 'MOOREFLD OPT PLAN WW15', 1, 'Danny Lee', 'Finished the WW15 OPT PLAN and mailed to richard', 1, '2014-04-18 09:51:41'),
(88, 40, 'DOWNLOAD WW16  SOURCE CODE', 1, 'Danny Lee', 'Schedule the auto-download shell script run at 2014-04-20 12:00', 1, '2014-04-18 09:53:12'),
(89, 41, 'MEASUREMENT OF BUILD WW16', 1, 'Danny Lee', 'New hardware in Phone Flash Tool: mofd_A0_7160_x', 1, '2014-04-21 01:40:38'),
(90, 41, 'MEASUREMENT OF BUILD WW16', 1, 'Danny Lee', '<div>Event done</div><div>Socwatch data analysis report and power trends refers to</div><div><a href="http://vpnp-workstation1.bj.intel.com/">http://vpnp-workstation1.bj.intel.com/</a><br></div><div>PLATFORM: MOOREFIELD &nbsp; DEVICE: PRH &nbsp; &nbsp;BUILD : WW16</div><div><br></div><div>Raw data files refers to&nbsp;</div><div><a href="\\\\vpnp-workstation1\\vpnp_data\\MOOREFLD\\MOOREFLD_WW16">\\\\vpnp-workstation1\\vpnp_data\\MOOREFLD\\MOOREFLD_WW16</a><br></div><div><br></div>Record Socail 1080p case can not reach the 30fps target, only 26fps or so.<div>I have redid the measurement several times but failed to get better result.</div><div>It should be a new bug.&nbsp;</div><div>Keep tracking</div><div><br></div>', 1, '2014-04-21 09:16:50'),
(91, 36, 'Enable BW Measurement on MOFLD', 1, 'Danny Lee', 'socwatch 1.4b can retrieve the Memory BW data on build ww16<div>Test on MOOREFLD PRH A0</div>', 1, '2014-04-22 01:50:44'),
(92, 36, 'Enable BW Measurement on MOFLD', 1, 'Danny Lee', 'Collect a ddr-bw on MOOREFIELD PRH A0 of Video Playback 1080p case<div>Total 7.7 MB/s only</div><div>It seems that the socwatch 1.4b can not retrieve right data on the A0 silicon</div>', 1, '2014-04-22 02:22:48'),
(93, 41, 'MEASUREMENT OF BUILD WW16', 1, 'Danny Lee', 'MOOREFLD DEVICE UPGRADE TO B0<div>Thanks for richard''s support and Yinpu''s rework on B0</div>', 1, '2014-04-23 00:59:56'),
(94, 43, 'Help Yanli retrieve socwatch data on PRH B0', 1, 'Danny Lee', 'I Wrote a shell script to help Yanli collect the data of video playback 1080p 30fps case.<div>And shared it to Yanli</div><div><br></div><div>Event done<br><div><div><br></div></div></div>', 1, '2014-04-24 10:04:14'),
(95, 9, 'NAVIBAR FUNCTION IMPLEMENT', 1, 'Danny Lee', 'Finish part of the report page.<div>"week list style" finished</div>', 1, '2014-04-24 10:05:15'),
(96, 42, 'MOOREFLD OPT PLAN WW16', 1, 'Danny Lee', 'OPT PLAN has been done.<div>Thanks for Indian team''s RLB data all cases included.</div><div>Video playback 1080p | video record | streaming | usermode</div><div><br></div><div>OPT PLAN has been uploaded to redmine</div><div><a href="http://autotest.bj.intel.com/redmine/projects/pnp-knowledge-base/wiki/Moorefield_PnP_KPI_Target_Setting">http://autotest.bj.intel.com/redmine/projects/pnp-knowledge-base/wiki/Moorefield_PnP_KPI_Target_Setting</a><br></div>', 1, '2014-04-25 08:34:01'),
(97, 44, 'MEASUREMENT OF BUILD WW17', 1, 'Danny Lee', 'MOOREFLD PRH BUILD CHANGED TO BRANCH R44C FROM BRANCH MAINLINE<div><img src="http://f-1.tuzhan.com/245251a3ca58/p-2/l/2014/04/28/10/b5d2ca9708574881ae17c494391f8c26.png"><br></div>', 1, '2014-04-28 02:02:52'),
(98, 44, 'MEASUREMENT OF BUILD WW17', 1, 'Danny Lee', '<ol><li>Retrieve unstable power consumption of idle case and usermode case<br></li><li>usermode case catch whole green images and image with lines as below</li></ol><div><img src="http://f-1.tuzhan.com/22964ffbb5e8/p-2/l/2014/04/28/14/d0d25ebad1b54408acccb37c4573b50b.png"><br></div><div>Power of usermode image capture case</div><div><img src="http://f-1.tuzhan.com/de214cfa8b61/p-2/l/2014/04/28/14/634dfbf34515479ea62e4ceca9289662.png"><br></div>', 1, '2014-04-28 06:38:28'),
(99, 44, 'MEASUREMENT OF BUILD WW17', 1, 'Danny Lee', 'Video record social can not reach 30FPS', 1, '2014-04-28 09:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `prog_events`
--

CREATE TABLE IF NOT EXISTS `prog_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `uId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL COMMENT '0--delete | 1--going | 2--finished',
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `prog_events`
--

INSERT INTO `prog_events` (`id`, `title`, `category`, `description`, `uId`, `username`, `start_date`, `end_date`, `status`, `note`) VALUES
(1, 'WEB DISPLAY PART DEVELOPMENT', 'MISC', 'SOCWATCH RAWS FILE SHOULD BE CHECKABLE ON THE\nSOCDATA PAGE', 1, '', '2014-03-19 07:43:02', '0000-00-00 00:00:00', 1, ''),
(3, 'CHECK THE SOURCE CODE ENVIRONMENT', 'MISC', 'Since I failed to download source code from server, it seems that the machine environment changed.&nbsp;<div>Try to fix this problem, with reset the environment</div>', 1, '', '2014-03-19 09:04:36', '2014-03-21 07:59:01', 2, ''),
(6, 'MOOREFLD OPT PLAN', 'WEEKLY WORK', 'TRY TO DO MOOREFLD OPTIMIZE PLAN WEEKLY', 1, '', '2014-03-19 09:28:52', '2014-04-04 09:12:57', 2, ''),
(7, 'CALENDER', 'PROGRESS', 'Develop Calender feature in progress<div>It will shows how many events you finished in the calender date block</div>', 1, '', '2014-03-20 05:48:02', '0000-00-00 00:00:00', 1, ''),
(8, 'Future display', 'PROGRESS', 'Future part in PROGRESS will show things you want to do, but it will not start right now.<div>Just write it down and make it in the future</div>', 1, '', '2014-03-20 05:50:56', '0000-00-00 00:00:00', 1, ''),
(9, 'NAVIBAR FUNCTION IMPLEMENT', 'PROGRESS', 'IMPLEMENT THE NAVIBAR FUNCTION<div>TODO | GOING | DONE | REPORT | SETTING</div><div><br></div><div>TODO &nbsp; : DISPLAY THINGS YOU PLAN TO DO</div><div>GOING : DISPLAY THINGS IS ON-GOING</div><div>DONE &nbsp; : DISPLAY THINGS YOU HAVE FINISHED</div><div>REPORT: THIS WILL OUTPUT A WEEKLY REPORT ABOUT HOW MANY THINGS YOU HAVE DONE, AND HOW MANY THINGS IS ON-GOING</div><div>SETTINGS: YOU CAN SET PARAMETERS HERE, SUCH AS EVENT CATEGORY</div>', 1, '', '2014-03-20 05:54:49', '0000-00-00 00:00:00', 1, ''),
(10, 'PROGRESS DETAIL PAGE BE EDITABLE', 'PROGRESS', 'Event detail page should be editable.<div>The Event title | content should be edit if you have some mistake while adding the event.</div><div>So does the comments of this event, and the comment should be delete</div><div><br></div>', 1, '', '2014-03-20 02:20:28', '2014-03-20 09:51:23', 2, ''),
(11, 'PROGRESS 3735111', 'PROGRESS', 'Event detail page should be editable.<div>The Event title | content should be edit if you have some mistake while adding the event.</div><div>So does the comments of this event, and the comment should be delete</div><div>hello world222</div>', 1, '', '2014-03-20 07:47:15', '0000-00-00 00:00:00', 0, ''),
(12, 'PROGRESS  TEST', 'MISC', 'Event detail page should be editable.<div>The Event title | content should be edit if you have some mistake while adding the event.</div><div>So does the comments of this event, and the comment should be delete2</div><div><br></div>', 1, '', '2014-03-20 07:35:43', '0000-00-00 00:00:00', 0, ''),
(13, 'DISPLAY CATEGORY IN EVENT LIST', 'PROGRESS', 'SINCE EVERY EVENT HAS ITS CATEGORY<div>RE-DESIGN THE EVENT LIST TO DISPLAY THE CATEGORY</div><div><br></div>', 1, '', '2014-03-21 02:19:05', '2014-03-21 02:52:20', 2, ''),
(14, 'HELP RICHARD CHECK BUG 180842', 'MISC', '[PnP-SI] Video Encoder consuming high power on Usermode Image Capture for Moorefield', 1, '', '2014-03-21 09:34:56', '2014-03-25 06:07:13', 2, ''),
(15, 'ADD USERMODE CASE TO MOOREFLD', 'MISC', 'THIS CASE SHOULD TAKE IMAGE EVERY 30S<div>ADD THIS CASE AS COMMON CASE INTO AUTO-VPNP NEXT WEEK</div>', 1, '', '2014-03-21 09:39:45', '2014-03-24 07:42:47', 2, ''),
(16, 'MOD_V0_64 WEEKLY MEASUREMENT', 'WEEKLY WORK', '<ol><li>POWER MEASUREMENT<br></li><li>SOCWATCH ANALYSIS REPORT</li></ol>', 1, '', '2014-03-24 01:27:37', '2014-03-25 09:14:49', 2, ''),
(17, 'FIX BUG IN SOCDATA SHOWPAGE', 'AUTO VPNP', 'New case usemode added. The chart of usermode case on index.php/socdata/show can not display the right data. &nbsp;<div><b>And the date under x-axis are wrong.</b><div>Capture as below.<div><img src="http://f-1.tuzhan.com/496dc419e0b8/p-2/l/2014/03/25/16/26353ea66fcd4e9dbca778ccaa0dc7cb.png"><br></div></div></div><div>Try to fix it</div>', 1, '', '2014-03-25 08:51:58', '0000-00-00 00:00:00', 1, ''),
(18, 'SETTING PART OF SOCDATA', 'AUTO VPNP', 'Implement the setting part of socdata for managing the cases to be measured on different platform', 1, '', '2014-03-25 08:57:35', '2014-03-26 08:46:28', 2, ''),
(19, 'VP9 Android Build Issues', 'MISC', 'Help richard to collect SocWatch report of the test build from tianmi for further analysis', 1, '', '2014-03-26 01:59:53', '2014-03-31 10:06:30', 2, ''),
(20, 'DOWNLOAD WW12 SOURCE CODE', 'WEEKLY WORK', 'Download source code main-weekly 2014 ww12<div>Complie and build</div>', 1, '', '2014-03-27 03:13:45', '2014-03-28 09:37:56', 2, ''),
(21, 'AUTO VPNP ROADMAP', 'AUTO VPNP', 'Write the roadmap of Auto vpnp', 1, '', '2014-03-27 08:51:26', '2014-04-02 09:45:40', 2, ''),
(22, 'OPERATION LOG', 'PROGRESS', 'Progress should record what user done on the system, such as add a todo event, add a comment to a event, finish a event etc.<div>it also have a url link to the change for easy check.</div>', 1, '', '2014-03-28 01:43:38', '2014-04-01 07:38:51', 2, ''),
(23, 'PROCUREMENT PLAN', 'MISC', 'Do a procurement plan before ww14 weekly sync up<div><ol><li>Intel Galileo Arduino Board purchase URL link (need confirm)<br></li><li>Something others needed to develop the Auto-vpnp</li><li>...</li></ol></div>', 1, '', '2014-03-28 08:27:46', '2014-03-31 10:00:58', 2, ''),
(24, 'MEASUREMENT OF BUILD WW13', 'WEEKLY WORK', '1. Measure power of weekly build ww13 on Moorefield PRH<div>2. Collect socwatch analysis report</div>', 1, '', '2014-03-31 02:06:51', '2014-03-31 10:03:04', 2, ''),
(25, 'test2', 'WEEKLY WORK', 'test22223333', 1, '', '2014-03-31 06:55:58', '2014-04-01 02:30:33', 0, ''),
(26, 'test for event', 'WEEKLY WORK', 'test edit event log 22333', 1, '', '2014-04-01 02:24:12', '2014-04-01 02:30:21', 0, ''),
(27, 'KEEP READING', 'WEEKLY WORK', 'READ ARTICLE IN FEEDLY.COM', 1, '', '2014-04-02 01:25:06', '0000-00-00 00:00:00', 1, ''),
(28, '[BUG] Form validation', 'PROGRESS', 'Validate the content of form elements.<div><ol><li>Pre-process the content with single quote to avoid error in SQL</li><li>Check the validation such as empty check before form submit</li><li>check update action whether the new form content is the same with the older one</li></ol></div>', 1, '', '2014-04-03 08:19:30', '0000-00-00 00:00:00', 1, ''),
(29, 'TARGET COMPARISONC', 'AUTO VPNP', 'Develop this function for Optimize Plan<div><ol><li>CState Comparison</li><li>PState Comparison</li><li>NC-State Comparison</li></ol></div>', 1, '', '2014-04-04 01:46:26', '0000-00-00 00:00:00', 1, ''),
(30, 'HELP BIHUAN DO INTERVIEW', 'MISC', 'Because Bihuan has little knowledge of python,<br>while the interviewer has python skill background.<br>Bihuan ask me for help to ask some python related question to the interview<br><div><br></div>', 1, '', '2014-04-04 03:15:39', '2014-04-04 07:39:30', 2, ''),
(31, 'DOWNLOAD WW14 SOURCE CODE', 'WEEKLY WORK', 'Download weekly build ww14. Compile and build', 1, '', '2014-04-04 09:30:55', '2014-04-04 09:31:45', 2, ''),
(32, 'MEASUREMENT OF BUILD WW14', 'WEEKLY WORK', '<ol><li>Measure the power of cases&nbsp;<br></li><li>Collect Socwatch data and generate report</li></ol>', 1, '', '2014-04-08 02:11:06', '2014-04-08 08:48:56', 2, ''),
(33, 'HELP LIYONG COLLECT RLB DATA HSI', 'MISC', 'Help Liyong collect Power breakdown data of HSI', 1, '', '2014-04-08 06:50:38', '2014-04-14 10:04:00', 2, ''),
(34, 'MEASUREMENT OF BUILD WW15', 'WEEKLY WORK', '<ol><li>Power measurement of build ww15</li><li>Socwatch data collection</li><li>Raw files process and report generation</li></ol>', 1, '', '2014-04-14 03:15:39', '2014-04-14 06:22:17', 2, ''),
(35, 'MOOREFLD OPT PLAN WW15', 'WEEKLY WORK', 'Do moorefield optimize plan of ww15', 1, '', '2014-04-14 03:16:27', '2014-04-18 09:51:46', 2, ''),
(36, 'Enable BW Measurement on MOFLD', 'MISC', 'New Socwatch analysis tool is available.<div>new features are supported such memory BW detect</div><div>Download it from <a href="http://socwatch.intel.com">http://socwatch.intel.com</a>&nbsp;and have a check</div>', 1, '', '2014-04-14 06:10:01', '2014-04-22 01:51:17', 2, ''),
(37, 'MOFDv2 VP9/HEVC PnP ', 'MISC', 'Help to measure power &amp; C/P states with below video clips on Moorefield PRH phone.<div><br></div><div>Clips:</div><div><div><ol><li>BQTerrace_1920x1080_60_qp27.mp4<br></li><li>Waves_hevc_10_track1.hevc.mp4<br></li><li>Cactus_1920x1080_50_qp22.mp4<br></li><li>casino_1920x1080_30_randomaccess_NOAMP_10Mbps_4565f_hm10.mp4&nbsp;</li><li>tears_of_steel_1080p30x6000f.4t.vp9.webm<br></li><li>tears_of_steel_1080p30x6000f_6mbps.4t.vp9.webm<br></li><li>tears_of_steel_1080p30x6000f_8mbps.4t.vp9.webm<br></li><li>tears_of_steel_1080p30x6000f_10bps.4t.vp9.webm<br></li></ol></div></div><div><br></div>', 1, '', '2014-04-16 01:48:32', '2014-04-17 05:51:51', 2, ''),
(38, 'test', 'WEEKLY WORK', 'test', 1, '', '2014-04-16 10:06:47', '0000-00-00 00:00:00', 1, ''),
(39, '111''ssss', 'WEEKLY WORK', 'asd''22', 1, '', '2014-04-17 05:08:28', '0000-00-00 00:00:00', 0, ''),
(40, 'DOWNLOAD WW16  SOURCE CODE', 'WEEKLY WORK', '<div>Download weekly build ww14. Compile and build</div>', 1, '', '2014-04-18 09:52:41', '2014-04-18 09:53:15', 2, ''),
(41, 'MEASUREMENT OF BUILD WW16', 'WEEKLY WORK', '<div><ol><li>Power measurement of build ww16<br></li><li>Socwatch data collection<br></li><li>Raw files process and report generation<br></li></ol></div>', 1, '', '2014-04-21 01:09:27', '2014-04-24 10:05:57', 2, ''),
(42, 'MOOREFLD OPT PLAN WW16', 'WEEKLY WORK', 'Do MOOREFIELD OPTIMIZE PLAN OF WW16', 1, '', '2014-04-21 01:10:45', '2014-04-25 08:34:07', 2, ''),
(43, 'Help Yanli retrieve socwatch data on PRH B0', 'MISC', 'Collect socwatch data and and BW data as below on MOOREFLD PRH B0<div>======</div><div><ul><li>disp-ddr-bw<br></li><li>gfx-drr-bw<br></li><li>cpu-ddr-bw<br></li><li>ddr-bw<br></li><li>io-bw<br></li><li>dram-srr</li></ul></div>', 1, '', '2014-04-24 06:57:26', '2014-04-24 10:04:17', 2, ''),
(44, 'MEASUREMENT OF BUILD WW17', 'WEEKLY WORK', '<ol><li>Power measurement</li><li>Socwatch data collection</li><li>Process the raw data file &amp; generate Report&nbsp;</li></ol>', 1, '', '2014-04-28 02:00:40', '0000-00-00 00:00:00', 1, ''),
(45, 'INTEGRATE BW MEASUREMENT TO AUTOVPNP', 'MISC', '<ol><li>Retrieve Memory BW &amp; Memory self refresh(ddr-bw dram-srr)</li><li>analyze csv data into database</li><li>show data on socData</li></ol>', 1, '', '2014-04-29 01:56:47', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `prog_history`
--

CREATE TABLE IF NOT EXISTS `prog_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `obj_type` varchar(20) NOT NULL COMMENT 'Event | Comment | Setting',
  `obj_name` varchar(200) NOT NULL,
  `action_type` varchar(20) NOT NULL COMMENT 'ADD | DEL | EDIT',
  `action` text NOT NULL,
  `rId` int(11) NOT NULL COMMENT 'related id(cId or eId)',
  `url` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `prog_history`
--

INSERT INTO `prog_history` (`id`, `userId`, `username`, `obj_type`, `obj_name`, `action_type`, `action`, `rId`, `url`, `datetime`) VALUES
(14, 1, 'Danny Lee', 'Comment', 'AUTO VPNP ROADMAP', 'ADD', 'Add Comment to Event', 41, 'index.php/progress/detail/21#comment-41', '2014-03-31 09:53:01'),
(15, 1, 'Danny Lee', 'Comment', 'AUTO VPNP ROADMAP', 'EDIT', 'Edit Comment to Event', 41, 'index.php/progress/detail/21#comment-41', '2014-03-31 09:52:01'),
(16, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW13', 'ADD', 'Add Comment to Event', 42, 'index.php/progress/detail/24#comment-42', '2014-03-31 09:59:30'),
(17, 1, 'Danny Lee', 'Comment', 'PROCUREMENT PLAN', 'ADD', 'Add Comment to Event', 43, 'index.php/progress/detail/23#comment-43', '2014-03-31 10:00:55'),
(18, 1, 'Danny Lee', 'Event', 'PROCUREMENT PLAN', 'FINISHED', 'Finished Event', 23, 'index.php/progress/detail/23', '2014-03-31 10:00:58'),
(19, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW13', 'EDIT', 'Edit Comment to Event', 42, 'index.php/progress/detail/24#comment-42', '2014-03-31 09:59:30'),
(20, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW13', 'FINISHED', 'Finished Event', 24, 'index.php/progress/detail/24', '2014-03-31 10:03:04'),
(21, 1, 'Danny Lee', 'Comment', 'VP9 Android Build Issues', 'ADD', 'Add Comment to Event', 44, 'index.php/progress/detail/19#comment-44', '2014-03-31 10:06:12'),
(22, 1, 'Danny Lee', 'Event', 'VP9 Android Build Issues', 'FINISHED', 'Finished Event', 19, 'index.php/progress/detail/19', '2014-03-31 10:06:30'),
(23, 1, 'Danny Lee', 'Comment', 'OPERATION LOG', 'EDIT', 'Edit Comment to Event', 40, 'index.php/progress/detail/22#comment-40', '2014-03-31 09:40:19'),
(38, 1, 'Danny Lee', 'Comment', 'OPERATION LOG', 'ADD', 'new a comment', 47, 'index.php/progress/detail/22#comment-47', '2014-04-01 07:38:23'),
(39, 1, 'Danny Lee', 'Event', 'OPERATION LOG', 'FINISHED', 'Finished Event', 22, 'index.php/progress/detail/22', '2014-04-01 07:38:51'),
(40, 1, 'Danny Lee', 'Comment', 'NAVIBAR FUNCTION IMPLEMENT', 'ADD', 'new a comment', 48, 'index.php/progress/detail/9#comment-48', '2014-04-01 07:46:34'),
(42, 1, 'Danny Lee', 'Comment', 'ADD USERMODE CASE TO MOOREFLD', 'EDIT', 'Edit Comment 14 to Event', 14, 'index.php/progress/detail/15#comment-14', '2014-04-01 08:43:26'),
(50, 1, 'Danny Lee', 'Event', 'KEEP READING', 'ADD', 'Add a new Event', 27, 'index.php/progress/detail/27', '2014-04-02 01:25:06'),
(51, 1, 'Danny Lee', 'Event', 'KEEP READING', 'EDIT', 'Edit Event', 27, 'index.php/progress/detail/27', '2014-04-02 02:43:57'),
(52, 1, 'Danny Lee', 'Comment', 'AUTO VPNP ROADMAP', 'ADD', 'new a comment', 52, 'index.php/progress/detail/21#comment-52', '2014-04-02 09:42:38'),
(53, 1, 'Danny Lee', 'Comment', 'AUTO VPNP ROADMAP', 'EDIT', 'Edit Comment to Event', 52, 'index.php/progress/detail/21#comment-52', '2014-04-02 09:44:03'),
(54, 1, 'Danny Lee', 'Comment', 'AUTO VPNP ROADMAP', 'EDIT', 'Edit Comment to Event', 52, 'index.php/progress/detail/21#comment-52', '2014-04-02 09:44:54'),
(55, 1, 'Danny Lee', 'Comment', 'AUTO VPNP ROADMAP', 'ADD', 'new a comment', 53, 'index.php/progress/detail/21#comment-53', '2014-04-02 09:45:37'),
(56, 1, 'Danny Lee', 'Event', 'AUTO VPNP ROADMAP', 'FINISHED', 'Finished Event', 21, 'index.php/progress/detail/21', '2014-04-02 09:45:40'),
(57, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN', 'ADD', 'new a comment', 54, 'index.php/progress/detail/6#comment-54', '2014-04-03 03:04:06'),
(58, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN', 'ADD', 'new a comment', 55, 'index.php/progress/detail/6#comment-55', '2014-04-03 08:13:52'),
(59, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN', 'EDIT', 'Edit Comment to Event', 55, 'index.php/progress/detail/6#comment-55', '2014-04-03 08:14:11'),
(60, 1, 'Danny Lee', 'Event', '[BUG] Form validation', 'ADD', 'Add a new Event', 28, 'index.php/progress/detail/28', '2014-04-03 08:19:30'),
(61, 1, 'Danny Lee', 'Event', 'TARGET COMPARISONC', 'ADD', 'Add a new Event', 29, 'index.php/progress/detail/29', '2014-04-04 01:46:26'),
(62, 1, 'Danny Lee', 'Event', 'HELP BIHUAN DO INTERVIEW', 'ADD', 'Add a new Event', 30, 'index.php/progress/detail/30', '2014-04-04 03:15:40'),
(63, 1, 'Danny Lee', 'Event', 'HELP BIHUAN DO INTERVIEW', 'FINISHED', 'Finished Event', 30, 'index.php/progress/detail/30', '2014-04-04 07:39:30'),
(64, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN', 'ADD', 'new a comment', 56, 'index.php/progress/detail/6#comment-56', '2014-04-04 09:12:51'),
(65, 1, 'Danny Lee', 'Event', 'MOOREFLD OPT PLAN', 'FINISHED', 'Finished Event', 6, 'index.php/progress/detail/6', '2014-04-04 09:12:57'),
(66, 1, 'Danny Lee', 'Event', 'DOWNLOAD WW14 SOURCE CODE', 'ADD', 'Add a new Event', 31, 'index.php/progress/detail/31', '2014-04-04 09:30:55'),
(67, 1, 'Danny Lee', 'Comment', 'DOWNLOAD WW14 SOURCE CODE', 'ADD', 'new a comment', 57, 'index.php/progress/detail/31#comment-57', '2014-04-04 09:31:41'),
(68, 1, 'Danny Lee', 'Event', 'DOWNLOAD WW14 SOURCE CODE', 'FINISHED', 'Finished Event', 31, 'index.php/progress/detail/31', '2014-04-04 09:31:45'),
(69, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW14', 'ADD', 'Add a new Event', 32, 'index.php/progress/detail/32', '2014-04-08 02:11:07'),
(70, 1, 'Danny Lee', 'Event', 'HELP LIYONG COLLECT RLB DATA HSI', 'ADD', 'Add a new Event', 33, 'index.php/progress/detail/33', '2014-04-08 06:50:39'),
(71, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW14', 'ADD', 'new a comment', 58, 'index.php/progress/detail/32#comment-58', '2014-04-08 08:43:24'),
(72, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW14', 'EDIT', 'Edit Comment to Event', 58, 'index.php/progress/detail/32#comment-58', '2014-04-08 08:43:55'),
(73, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW14', 'EDIT', 'Edit Comment to Event', 58, 'index.php/progress/detail/32#comment-58', '2014-04-08 08:48:06'),
(74, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW14', 'FINISHED', 'Finished Event', 32, 'index.php/progress/detail/32', '2014-04-08 08:48:56'),
(75, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW15', 'ADD', 'Add a new Event', 34, 'index.php/progress/detail/34', '2014-04-14 03:15:40'),
(76, 1, 'Danny Lee', 'Event', 'MOOREFLD OPT PLAN WW15', 'ADD', 'Add a new Event', 35, 'index.php/progress/detail/35', '2014-04-14 03:16:27'),
(77, 1, 'Danny Lee', 'Event', 'CHECK SOCWATCH TOOL', 'ADD', 'Add a new Event', 36, 'index.php/progress/detail/36', '2014-04-14 06:10:01'),
(78, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW15', 'ADD', 'new a comment', 59, 'index.php/progress/detail/34#comment-59', '2014-04-14 06:21:49'),
(79, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW15', 'EDIT', 'Edit Comment to Event', 59, 'index.php/progress/detail/34#comment-59', '2014-04-14 06:22:13'),
(80, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW15', 'FINISHED', 'Finished Event', 34, 'index.php/progress/detail/34', '2014-04-14 06:22:17'),
(81, 1, 'Danny Lee', 'Event', 'Enable BW Measurement on MOFLD', 'EDIT', 'Edit Event', 36, 'index.php/progress/detail/36', '2014-04-14 09:05:47'),
(82, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'ADD', 'new a comment', 60, 'index.php/progress/detail/36#comment-60', '2014-04-14 09:07:40'),
(83, 1, 'Danny Lee', 'Comment', 'HELP LIYONG COLLECT RLB DATA HSI', 'ADD', 'new a comment', 61, 'index.php/progress/detail/33#comment-61', '2014-04-14 10:03:51'),
(84, 1, 'Danny Lee', 'Event', 'HELP LIYONG COLLECT RLB DATA HSI', 'FINISHED', 'Finished Event', 33, 'index.php/progress/detail/33', '2014-04-14 10:04:00'),
(85, 1, 'Danny Lee', 'Comment', 'TARGET COMPARISONC', 'ADD', 'new a comment', 62, 'index.php/progress/detail/29#comment-62', '2014-04-15 06:54:17'),
(86, 1, 'Danny Lee', 'Event', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'Add a new Event', 37, 'index.php/progress/detail/37', '2014-04-16 01:48:32'),
(87, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 63, 'index.php/progress/detail/37#comment-63', '2014-04-16 01:49:16'),
(88, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 63, 'index.php/progress/detail/37#comment-63', '2014-04-16 01:55:29'),
(89, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 63, 'index.php/progress/detail/37#comment-63', '2014-04-16 01:56:06'),
(90, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 63, 'index.php/progress/detail/37#comment-63', '2014-04-16 01:56:17'),
(91, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 64, 'index.php/progress/detail/37#comment-64', '2014-04-16 01:59:07'),
(92, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 64, 'index.php/progress/detail/37#comment-64', '2014-04-16 02:10:19'),
(93, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 64, 'index.php/progress/detail/37#comment-64', '2014-04-16 02:11:02'),
(94, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 65, 'index.php/progress/detail/37#comment-65', '2014-04-16 05:15:07'),
(95, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 66, 'index.php/progress/detail/37#comment-66', '2014-04-16 08:21:51'),
(96, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'ADD', 'new a comment', 67, 'index.php/progress/detail/28#comment-67', '2014-04-16 08:25:12'),
(97, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'ADD', 'new a comment', 68, 'index.php/progress/detail/28#comment-68', '2014-04-16 08:25:33'),
(98, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'EDIT', 'Edit Comment to Event', 68, 'index.php/progress/detail/28#comment-68', '2014-04-16 08:25:44'),
(99, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'EDIT', 'Edit Comment to Event', 68, 'index.php/progress/detail/28#comment-68', '2014-04-16 08:29:33'),
(100, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'ADD', 'new a comment', 69, 'index.php/progress/detail/28#comment-69', '2014-04-16 08:29:44'),
(101, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'EDIT', 'Edit Comment to Event', 69, 'index.php/progress/detail/28#comment-69', '2014-04-16 08:29:49'),
(102, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'EDIT', 'Edit Comment to Event', 69, 'index.php/progress/detail/28#comment-69', '2014-04-16 08:29:57'),
(103, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'DEL', 'Delete comment in Event', 69, 'index.php/progress/detail/28#comment-69', '2014-04-16 08:31:13'),
(104, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'DEL', 'Delete comment in Event', 68, 'index.php/progress/detail/28#comment-68', '2014-04-16 08:31:16'),
(105, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'ADD', 'new a comment', 70, 'index.php/progress/detail/28#comment-70', '2014-04-16 08:31:23'),
(106, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'EDIT', 'Edit Comment to Event', 70, 'index.php/progress/detail/28#comment-70', '2014-04-16 08:31:32'),
(107, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 71, 'index.php/progress/detail/37#comment-71', '2014-04-16 10:00:54'),
(113, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'DEL', 'Delete comment in Event', 70, 'index.php/progress/detail/28#comment-70', '2014-04-16 10:09:48'),
(114, 1, 'Danny Lee', 'Event', '[BUG] Form validation', 'EDIT', 'Edit Event', 28, 'index.php/progress/detail/28', '2014-04-16 10:11:55'),
(115, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 63, 'index.php/progress/detail/37#comment-63', '2014-04-16 10:29:42'),
(139, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 79, 'index.php/progress/detail/37#comment-79', '2014-04-17 03:41:31'),
(140, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'EDIT', 'Edit Comment to Event', 79, 'index.php/progress/detail/37#comment-79', '2014-04-17 03:42:01'),
(145, 1, 'Danny Lee', 'Comment', '[BUG] Form validation', 'ADD', 'new a comment', 81, 'index.php/progress/detail/28#comment-81', '2014-04-17 05:09:30'),
(146, 1, 'Danny Lee', 'Event', '111''ssss', 'DEL', 'Delete Event', 39, 'index.php/progress/detail/39', '2014-04-17 05:13:03'),
(147, 1, 'Danny Lee', 'Comment', 'MOFDv2 VP9/HEVC PnP ', 'ADD', 'new a comment', 82, 'index.php/progress/detail/37#comment-82', '2014-04-17 05:51:45'),
(148, 1, 'Danny Lee', 'Event', 'MOFDv2 VP9/HEVC PnP ', 'FINISHED', 'Finished Event', 37, 'index.php/progress/detail/37', '2014-04-17 05:51:51'),
(149, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'ADD', 'new a comment', 83, 'index.php/progress/detail/36#comment-83', '2014-04-17 05:54:17'),
(150, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'EDIT', 'Edit Comment to Event', 83, 'index.php/progress/detail/36#comment-83', '2014-04-17 05:57:49'),
(151, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'EDIT', 'Edit Comment to Event', 83, 'index.php/progress/detail/36#comment-83', '2014-04-17 05:58:21'),
(152, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'EDIT', 'Edit Comment to Event', 83, 'index.php/progress/detail/36#comment-83', '2014-04-17 06:36:43'),
(153, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'ADD', 'new a comment', 84, 'index.php/progress/detail/36#comment-84', '2014-04-17 06:37:24'),
(154, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN WW15', 'ADD', 'new a comment', 85, 'index.php/progress/detail/35#comment-85', '2014-04-17 08:25:24'),
(155, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN WW15', 'ADD', 'new a comment', 86, 'index.php/progress/detail/35#comment-86', '2014-04-17 09:44:04'),
(156, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN WW15', 'EDIT', 'Edit Comment to Event', 86, 'index.php/progress/detail/35#comment-86', '2014-04-17 09:44:17'),
(157, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN WW15', 'ADD', 'new a comment', 87, 'index.php/progress/detail/35#comment-87', '2014-04-18 09:51:41'),
(158, 1, 'Danny Lee', 'Event', 'MOOREFLD OPT PLAN WW15', 'FINISHED', 'Finished Event', 35, 'index.php/progress/detail/35', '2014-04-18 09:51:46'),
(159, 1, 'Danny Lee', 'Event', 'DOWNLOAD WW16  SOURCE CODE', 'ADD', 'Add a new Event', 40, 'index.php/progress/detail/40', '2014-04-18 09:52:41'),
(160, 1, 'Danny Lee', 'Event', 'DOWNLOAD WW16  SOURCE CODE', 'EDIT', 'Edit Event', 40, 'index.php/progress/detail/40', '2014-04-18 09:53:09'),
(161, 1, 'Danny Lee', 'Comment', 'DOWNLOAD WW16  SOURCE CODE', 'ADD', 'new a comment', 88, 'index.php/progress/detail/40#comment-88', '2014-04-18 09:53:12'),
(162, 1, 'Danny Lee', 'Event', 'DOWNLOAD WW16  SOURCE CODE', 'FINISHED', 'Finished Event', 40, 'index.php/progress/detail/40', '2014-04-18 09:53:15'),
(163, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW16', 'ADD', 'Add a new Event', 41, 'index.php/progress/detail/41', '2014-04-21 01:09:27'),
(164, 1, 'Danny Lee', 'Event', 'MOOREFLD OPT PLAN WW16', 'ADD', 'Add a new Event', 42, 'index.php/progress/detail/42', '2014-04-21 01:10:45'),
(165, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW16', 'ADD', 'new a comment', 89, 'index.php/progress/detail/41#comment-89', '2014-04-21 01:40:38'),
(166, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW16', 'ADD', 'new a comment', 90, 'index.php/progress/detail/41#comment-90', '2014-04-21 09:16:51'),
(167, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'ADD', 'new a comment', 91, 'index.php/progress/detail/36#comment-91', '2014-04-22 01:50:44'),
(168, 1, 'Danny Lee', 'Event', 'Enable BW Measurement on MOFLD', 'FINISHED', 'Finished Event', 36, 'index.php/progress/detail/36', '2014-04-22 01:51:17'),
(169, 1, 'Danny Lee', 'Comment', 'Enable BW Measurement on MOFLD', 'ADD', 'new a comment', 92, 'index.php/progress/detail/36#comment-92', '2014-04-22 02:22:48'),
(170, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW16', 'ADD', 'new a comment', 93, 'index.php/progress/detail/41#comment-93', '2014-04-23 00:59:56'),
(171, 1, 'Danny Lee', 'Event', 'Help Yanli retrieve socwatch data on PRH B0', 'ADD', 'Add a new Event', 43, 'index.php/progress/detail/43', '2014-04-24 06:57:26'),
(172, 1, 'Danny Lee', 'Event', 'Help Yanli retrieve socwatch data on PRH B0', 'EDIT', 'Edit Event', 43, 'index.php/progress/detail/43', '2014-04-24 06:59:38'),
(173, 1, 'Danny Lee', 'Event', 'Help Yanli retrieve socwatch data on PRH B0', 'EDIT', 'Edit Event', 43, 'index.php/progress/detail/43', '2014-04-24 06:59:58'),
(174, 1, 'Danny Lee', 'Comment', 'Help Yanli retrieve socwatch data on PRH B0', 'ADD', 'new a comment', 94, 'index.php/progress/detail/43#comment-94', '2014-04-24 10:04:14'),
(175, 1, 'Danny Lee', 'Event', 'Help Yanli retrieve socwatch data on PRH B0', 'FINISHED', 'Finished Event', 43, 'index.php/progress/detail/43', '2014-04-24 10:04:17'),
(176, 1, 'Danny Lee', 'Comment', 'NAVIBAR FUNCTION IMPLEMENT', 'ADD', 'new a comment', 95, 'index.php/progress/detail/9#comment-95', '2014-04-24 10:05:15'),
(177, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW16', 'FINISHED', 'Finished Event', 41, 'index.php/progress/detail/41', '2014-04-24 10:05:57'),
(178, 1, 'Danny Lee', 'Comment', 'MOOREFLD OPT PLAN WW16', 'ADD', 'new a comment', 96, 'index.php/progress/detail/42#comment-96', '2014-04-25 08:34:01'),
(179, 1, 'Danny Lee', 'Event', 'MOOREFLD OPT PLAN WW16', 'FINISHED', 'Finished Event', 42, 'index.php/progress/detail/42', '2014-04-25 08:34:07'),
(180, 1, 'Danny Lee', 'Event', 'MEASUREMENT OF BUILD WW17', 'ADD', 'Add a new Event', 44, 'index.php/progress/detail/44', '2014-04-28 02:00:40'),
(181, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW17', 'ADD', 'new a comment', 97, 'index.php/progress/detail/44#comment-97', '2014-04-28 02:02:52'),
(182, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW17', 'ADD', 'new a comment', 98, 'index.php/progress/detail/44#comment-98', '2014-04-28 06:38:28'),
(183, 1, 'Danny Lee', 'Comment', 'MEASUREMENT OF BUILD WW17', 'ADD', 'new a comment', 99, 'index.php/progress/detail/44#comment-99', '2014-04-28 09:54:38'),
(184, 1, 'Danny Lee', 'Event', 'INTEGRATE BW MEASUREMENT TO AUTOVPNP', 'ADD', 'Add a new Event', 45, 'index.php/progress/detail/45', '2014-04-29 01:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `prog_settings`
--

CREATE TABLE IF NOT EXISTS `prog_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `prog_settings`
--

INSERT INTO `prog_settings` (`id`, `item`, `value`, `datetime`, `note`) VALUES
(4, 'category', 'WEEKLY WORK', '2014-03-20 03:04:06', ''),
(5, 'category', 'AUTO VPNP', '2014-03-20 03:04:13', ''),
(6, 'category', 'MISC', '2014-03-20 03:04:21', ''),
(7, 'category', 'TODO IN THE FUTURE', '2014-03-20 03:06:07', ''),
(8, 'category', 'PROGRESS', '2014-03-20 05:44:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `prog_users`
--

CREATE TABLE IF NOT EXISTS `prog_users` (
  `uId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

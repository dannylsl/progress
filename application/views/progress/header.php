<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='<?= base_url()?>css/progress.css' />
<script type='text/javascript' src='<?= base_url()?>js/jquery-1.8.0.min.js'></script>
<link rel='stylesheet' type='text/css' href='<?= base_url()?>jwysiwyg/jquery.wysiwyg.css' />
<script type='text/javascript' src='<?= base_url()?>jwysiwyg/jquery.wysiwyg.js'></script>

<link rel='stylesheet' type='text/css' href='<?= base_url()?>pagedown/demo.css' />
<script type='text/javascript' src='<?= base_url()?>pagedown/Markdown.Converter.js'></script>
<script type='text/javascript' src='<?= base_url()?>pagedown/Markdown.Sanitizer.js'></script>
<script type='text/javascript' src='<?= base_url()?>pagedown/Markdown.Editor.js'></script>
<!--
<link rel='stylesheet' type='text/css' href='<?= base_url()?>highlight/styles/default.css' />
-->
<link rel='stylesheet' type='text/css' href='<?= base_url()?>highlight/styles/ir_black.css' />
<script type='text/javascript' src='<?= base_url()?>highlight/highlight.pack.js'></script>
<script>hljs.initHighlightingOnLoad();</script>
<script>
$(document).ready(function() {
	$('#wmd-input').keyup(function() {
		console.log('wmd-input keyup');
//		hljs.highlightBlock($("#wmd-preview pre code"));
		$('#wmd-preview pre code').each(function(i, e) {hljs.highlightBlock(e)});
	})	
});
</script>


<title>PROGRESS</title>
</head>
<body>
<div id='header' class='header'>
  <div class='logo'><a href='<?= base_url()?>'>PROGRESS</a></div>
  <div class='nav_list'>
    <a href='<?= base_url() ?>index.php/progress/'>TODO</a>
    <a href='<?= base_url() ?>index.php/progress/done'>DONE</a>
    <a href='<?= base_url() ?>index.php/progress/report'>REPORT</a>
    <a href='<?= base_url()?>index.php/progress/settings'>SETTING</a>
    <a href='<?= base_url()?>index.php/progress/history'>HISTORY</a>
  </div>
  <div class='search'>
    <input type='text' class='sbox' placeholder='TYPE TO SEARCH' />
    <img src='<?= base_url() ?>images/search.png' class='img_search '>
  </div>
</div> <!-- header end -->


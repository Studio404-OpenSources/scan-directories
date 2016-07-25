<?php if(!defined("DIR")){ exit(); }
@include("lib/render/parts/head.php");
?>
<a href="?page=show-all">Show All Files</a> | 
<a href="?page=check-file">Check file list</a> | 
<a href="?page=create-file" style="color:red">Create New File List</a>
<br />
<h2>Json File Created !</h2>
<?php
@include("lib/render/parts/footer.php");
?>
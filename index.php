<!--
 ____                                ____  _ _       
| __ )  __ _ _ __   __ _ _ __   __ _/ ___|(_) |_ ___ 
|  _ \ / _` | '_ \ / _` | '_ \ / _` \___ \| | __/ _ \
| |_) | (_| | | | | (_| | | | | (_| |___) | | ||  __/
|____/ \__,_|_| |_|\__,_|_| |_|\__,_|____/|_|\__\___|

A simple markdown site printer with site pages support.
https://github.com/wesleywerner/bananasite

Copyright (C) 2013 Wesley Werner

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should receive a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>My Banana Site</title>
<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
<?php include_once "markdown.php"; ?>
<div id="box">
<?php 
print('<div id="header">');
print(Markdown(file_get_contents("header.md")));
print('</div>');
// the page we are on determines where to look for posts
$page = htmlspecialchars(str_replace("/", "", $_GET["page"]));
// default to the news
$page = ($page == "" ? "posts.news" : $page);
// only print a single post
$post = htmlspecialchars(str_replace("/", "", $_GET["post"]));
if ($post != ""){
        // use the given post file name
        $file_list = array(0 => $post);
    } else {
        // get all the posts in the current page
        $file_list = scandir($page, 1);
    }
// render posts in file_list
foreach ($file_list as $afile) {
    $afilename = $page . "/" . $afile;
    if (file_exists($afilename)) {
        if (pathinfo($afilename, PATHINFO_EXTENSION) == "md") {
            $afilecontents = Markdown(file_get_contents($afilename));
            // replace special tokens in the file
            $afilecontents = str_replace('%PERMALINK%', '?page=' . $page . '&post=' . $afile, $afilecontents);
            print('<p><div id="post">' . $afilecontents . '</div></p>');
        }
    } else {
        print('<p>That post does not exist, or has been removed.</p>');
    }
}
print('<div id="footer">');
print(Markdown(file_get_contents("footer.md")));
print('</div>');
?>
</div>
</body></html>

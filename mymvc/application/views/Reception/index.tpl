<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$title}</title>
    <meta name="keywords" content="{$keywords}">
    <meta name="description" content="{$description}">
    <meta name="renderer" content="webkit">
    <script src="{$layUrl}layui.js" charset="utf-8"></script>
    <script src="{$jsUrl}jquery.js"></script>
    <link rel="stylesheet" href="{$layUrl}css/layui.css"  media="all">
    <link rel="stylesheet" href="{$cssUrl}index/index.css">

</head>

<frameset rows="60px,*,50px" border="0">
    <frame src="{$url}index/top" noresize="noresize" name="top">
    <frame src="{$url}index/body" name="body" >
    <frame src="{$url}index/foot" name="foot">

</frameset>


</html>
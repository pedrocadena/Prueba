<?php require_once(YourIDE_Root."/Shared/mpage.php") ?>
<?xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8"/>
  <title><?php echo $GLOBALS["YourIDE_Page_Title"]; ?></title>
  <?php echo MPage::PlaceHolder("YourIDEHead"); ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" enctype="application/x-www-form-urlencoded">
 <table>
<tr>
<td colspan="2">
<?php echo MPage::PlaceHolder("header"); ?>
</td>
</tr>
        <tr>
        <td>
        <?php echo MPage::PlaceHolder("izquierda"); ?>
        </td>
        <td>
        <?php echo MPage::PlaceHolder("derecha"); ?>
        </td>
        </tr>
<tr>
<td colspan="2">
<?php echo MPage::PlaceHolder("footer"); ?>
</td>
</tr>
        </table>       
<?php RenderAll(); ?>    
    </form>
    </body>
</html>
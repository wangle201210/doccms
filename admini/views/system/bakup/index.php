<?php
require(ABSPATH.'/admini/views/system/bakup/header.php');
global $db;
 	$size = $bktables = $bkresults = $results= [];
	$k = 0;
	$totalsize = 0;
	$query = mysqli_query($db->dbh,"SHOW TABLES FROM ".DB_DBNAME);
	if($query)
	{
		while($r = mysqli_fetch_row($query))
		{
			$tables[$k] = $r[0];
			$count1 = $db->query("SELECT count(*) as number FROM $r[0] WHERE 1");
			$count = mysqli_query($db->dbh,$count1);
			$results[$k] = $count['number'];
			$bktables[$k] = $r[0];
			$bkresults[$k] = $count['number'];
			$q = $db->query("SHOW TABLE STATUS FROM `".DB_DBNAME."` LIKE '".$r[0]."'");
			$s = mysqli_query($db->dbh,$q);
			$size[$k] = round($s['Data_length']/1024, 2);
			$totalsize += $size[$k];
			$k++;
		}
	}
	else
	{
		echo '空记录。';
	}
?>
 <form method="post" name="myform" action="?m=system&amp;s=bakup&a=export">
  <table width="100%">
  <tr bgcolor="#FFFFFF">
    <td width="10%" class="tablerowhighlight" align="center">	<input name='chkall' type='checkbox' id='chkall' onclick='checkall(this.form)' value='check' checked>全选/反选 </td>
	<td width="50%" class="tablerowhighlight">数据库表</td>
	<td width="20%" class="tablerowhighlight">记录条数</td>
	<td width="20%" class="tablerowhighlight">大小 [共<?=$totalsize?>M]</td>
  </tr>
<?php 
	if(is_array($bktables)){
		foreach($bktables as $k => $tablename){
?>
  <tr>
    <td class="tablerow"  align="center">
<input type="checkbox" name="tables[]" value="<?php echo $tablename?>" checked>
	</td>
    <td class="tablerow">
	<?php echo $tablename?>
	</td>
    <td class="tablerow">&nbsp;<?php echo $bkresults[$k]?></td>
	<td class="tablerow">&nbsp;<?php echo $size[$k]?> K</td>
</tr>
<?php 
	}
}
?>
<tr>
    <td colspan="4" class="tablerowhighlight" align="center">分卷备份设置</td>
  </tr>
  <tr>
    <td colspan="4" class="tablerow" align="center">每个分卷文件大小：<input type=text name="sizelimit" value="2048" size=5> K <input type="submit" name="dosubmit" value=" 开始备份数据 "></td>
  </tr>
</table>
	</form>
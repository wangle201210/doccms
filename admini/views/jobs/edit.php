<SCRIPT language=JavaScript> 
function CheckForm() 
{ 
	if(document.form1.jobName.value==""){ 
		alert("请输入职位名称!"); 
		document.form1.jobName.focus(); 
		return false; 
	} 
	if(document.form1.requireNum.value==""){ 
		alert("请输入招聘人数!"); 
		document.form1.requireNum.focus(); 
		return false; 
	} 
	if(document.form1.requireNum.value.match(/^[1-9]\d*$/)==null){ 
		alert("招聘人数不是数字"); 
		document.form1.requireNum.focus(); 
		return false; 
	} 
	if(document.form1.requireNum.value==""){ 
		alert("请输入招聘人数!"); 
		document.form1.requireNum.focus(); 
		return false; 
	} 
	if(document.form1.address.value==""){ 
		alert("请输入工作地点!"); 
		document.form1.address.focus(); 
		return false; 
	} 
		if(document.form1.lastTime.value==""){ 
		alert("请输入截止日期!"); 
		document.form1.lastTime.focus(); 
		return false; 
	} 
} 
</SCRIPT>
<script language="javascript" type="text/javascript" src="../inc/js/date/WdatePicker.js"></script>
<h2 class="title"><?php echo $pageInfo['submenuName'] ?></h2>
<form name="form1" method="post" action="./index.php?p=<?php echo $request['p']?>&n=<?php echo $request['n'] ?>&a=edit" onsubmit="return CheckForm()">
  <table width="100%" border="0" cellpadding="2" cellspacing="1" class="admintb">
    <tr class="adtbtitle">
      <td width="892"><h3>修改职位：</h3><a href="javascript:history.back(1)" class="creatbt">返回</a></td>
      <td width="72"><div align="right">
          <input name="submit" type="submit" value=" 保存 " class="savebt" />
        </div></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr>
            <td width="57">职位名称</td>
            <td width="861"><input name="title" type="text" value="<?php echo $jobs_item->title ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">工作性质</td>
            <td width="861"><input name="jobKind" type="text" class="txt" value="<?php echo $jobs_item->jobKind ?>" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">招聘人数</td>
            <td width="861"><input name="requireNum" type="text" class="txt" value="<?php echo $jobs_item->requireNum ?>" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">工作经验</td>
            <td width="861"></label>
              <input name="experience" type="text" value="<?php echo $jobs_item->experience ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">工作地点</td>
            <td width="861"><input name="address" type="text" value="<?php echo $jobs_item->address ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">截止日期</td>
            <td width="861"><input name="lastTime" type="text" value="<?php echo $jobs_item->lastTime ?>" class="txt" maxlength="50" size="25" id="lasttime" style="font-size:9pt;width:152px; border:#6CF 2px solid;" onClick="WdatePicker()" /></td>
          </tr>
          <tr>
            <td width="57">待遇</td>
            <td width="861"><input name="salary" type="text" value="<?php echo $jobs_item->salary ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">学历</td>
            <td width="861"><?php
			$educational_arr = array('初中'=>'初中','高中'=>'高中','中技'=>'中技','中专'=>'中专','大专'=>'大专','本科'=>'本科','硕士'=>'硕士','博士'=>'博士','博士后'=>'博士后');
			select($educational_arr,'educational',$jobs_item->educational);
		?></td>
          </tr>
          <tr>
            <td width="57">是否提供住房</td>
            <td width="861"><input name="isHouse" type="text" value="<?php echo $jobs_item->isHouse ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">联系电话</td>
            <td width="861"><input name="telphone" type="text" value="<?php echo $jobs_item->telphone ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td width="57">EMail</td>
            <td width="861"><input name="email" type="text" value="<?php echo $jobs_item->email ?>" class="txt" style="width:30%"></td>
          </tr>
          <tr>
            <td colspan="2"><a href="javascript:showHide('field_pane_on_2')"><img src="images/expand.gif" border="0"> 填写关键词&摘要 </a>
              <div id="field_pane_on_2" style="display: none; padding:0; margin:0;">
                <table width="100%" border="0" align="center" cellpadding="0">
                  <tr>
                    <td width="57"> 页面关键词：</td>
                    <td width="861"><textarea style='width:400px;' name='keywords' id='keywords' cols='90' rows='3'><?php echo $jobs_item->keywords ?></textarea></td>
                  </tr>
                  <tr>
                    <td> 页面摘要：</td>
                    <td><textarea style='width:400px;' name='description' id='description' cols='90' rows='3'><?php echo $jobs_item->description ?></textarea></td>
                  </tr>
                </table>
              </div></td>
          </tr>
          <tr>
            <td width="57">职位描述及具体要求</td>
            <td width="861"><?php
			echo ewebeditor(EDITORSTYLE,'content',$jobs_item->content);
  			?></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>

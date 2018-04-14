﻿myFocus.pattern.extend({//*********************奇艺******************
	'mF_qiyi':function(settings,$){
		var $focus=$(settings);
		var $slider=$focus.addHtml('<div class="__slider"></div>');
		$slider[0].appendChild($focus.find('.__pic')[0]);
		$slider[0].appendChild($focus.addListTxt()[0]);
		var $picList=$focus.find('.__pic li');
		var $txtList=$focus.find('.__txt li');
		var $numList=$focus.addListNum().find('li');
		//CSS
		var w=settings.width,txtH=settings.txtHeight,n=$picList.length;
		$slider[0].style.width=w*n+'px';
		for(var i=0;i<n;i++) $picList[i].style.width=w+'px';
		//PLAY
		$focus.play(function(i){
			$numList[i].className='';
		},function(i){
			$txtList[i].style.top=0+'px';//复位
			$slider.slide({left:-w*i},800,function(){
				$txtList.eq(i).slide({top:-txtH});
			});
			$numList[i].className='current';
		});
		//Control
		$focus.bindControl($numList);
	}
});
myFocus.config.extend({'mF_qiyi':{txtHeight:34}});//默认文字层高度
<?php
session_start();
$img_height=75;     //�ȶ���ͼƬ�ĳ�����
$img_width=25;

     //srand(microtime() * 100000);//PHP420��srand���Ǳ����
     for($Tmpa=0;$Tmpa<4;$Tmpa++){
         $nmsg.=dechex(rand(0,15));
     }//by sports98

     $_SESSION['code'] = $nmsg;

     $aimg = imageCreate($img_height,$img_width);     //����ͼƬ
     ImageColorAllocate($aimg, 255,255,255);             //ͼƬ��ɫ��ImageColorAllocate��1�ζ�����ɫPHP����Ϊ�ǵ�ɫ��
     $black = ImageColorAllocate($aimg, 0,0,0);         //������Ҫ�ĺ�ɫ
     //ImageRectangle($aimg,0,0,$img_height-1,$img_width-1,$black);//�ȳ�һ��ɫ�ľ��ΰ�ͼƬ��Χ

	for($i=0;$i<6;$i++) {
		$te=imagecolorallocate($aimg,rand(0,255),rand(0,255),rand(0,255));
		imageline($aimg,rand(0,75),rand(0,75),rand(0,75),rand(0,75),$te);
	}

     //���������ѩ�������ˣ���ʵ������ͼƬ������һЩ����
     for ($i=1; $i<=100; $i++) {     //����100��������
         imageString($aimg,1,mt_rand(1,$img_height),mt_rand(1,$img_width),"*",imageColorAllocate($aimg,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255)));
         //���������˰ɣ���ʵҲ����ѩ�����������ɣ��Ŷ��ѡ�Ϊ��ʹ���ǿ�����"�������¡�5��6ɫ"���͵���1��1���������ǵ�ʱ�������ǵ�λ�á���ɫ��������С�����������rand()��mt_rand��������ɡ�
     }

     //���������˱��������ھ͸ð��Ѿ����ɵ�������������ˡ�����������࣬�����1��1���طţ�ͬʱ�����ǵ�λ�á���С����ɫ���ó������~~
     //Ϊ�������ڱ������������ɫ������200������Ĳ�С��200
     for ($i=0;$i<strlen($_SESSION['code']);$i++){
         imageString($aimg, mt_rand(3,5),$i*$img_height/4+mt_rand(1,10),mt_rand(1,$img_width/2), $_SESSION['code'][$i],imageColorAllocate($aimg,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200)));
     }
     Header("Content-type: image/png");     //����������������������ͼƬ������Ҫ��������ʾ
     ImagePng($aimg);                     //����png��ʽ�������ٺ�Ч��������µ������
     ImageDestroy($aimg);

     
  
?>
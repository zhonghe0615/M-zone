<?php
include ("../Util/DButil.php");

//�ı�������
function encode($varchar) {
	$varchar=trim($varchar);   //���ַ���ȡ�հ�
	$varchar=addslashes($varchar);  //�������ţ�˫���ţ�б�ܼ�б��
	$varchar=htmlspecialchars($varchar);  //<>��ת���������ַ�����
	$varchar=nl2br($varchar);   //��\nת����<br />
	//$varchar=strtolower($varchar);ת����Сд
	//��з
	$encode="Fuck|son of bitch|shit";
	$mode=array("/$encode/");
	$neeld=array('****');
	$varchar=preg_replace($mode,$neeld,$varchar);
	return $varchar;
}

$stmt = $dbh->prepare("INSERT INTO comment(cmid,username,ausername,ctime, cmcontent) VALUES (null, ?, ?,now(), ?)");
$comment = encode(htmlspecialchars($_POST["comment"]));

$stmt->bindParam(1, $_SESSION[username]);
$stmt->bindParam(2, $_GET["ausername"]);
$stmt->bindParam(3, $comment);
$stmt->execute();

echo "<script language=\"javascript\">history.go(-1);</script>";
?>
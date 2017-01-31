<?php
class Core {  //Start Core
function printCode($source_code)
{
	if (is_array($source_code))
		return false;
	$source_code = explode("\n", str_replace(array("\r\n", "\r"), "\n", $source_code));
	$line_count = 1;
	foreach ($source_code as $code_line)
	{
	$formatted_code .= '<tr><td>'.''.'</td>';
	$line_count++;
	if (ereg('<\?(php)?[^[:graph:]]', $code_line))
		$formatted_code .= '<td>'. str_replace(array('<code>', '</code>'), '', highlight_string($code_line, true)).'</td></tr>';
		else
			$formatted_code .= '<td>'.ereg_replace('(&lt;\?php&nbsp;)+', '', str_replace(array('<code>', '</code>'), '', highlight_string('<?php '.$code_line, true))).'</td></tr>';
	}
	return '<table style="font: 1em Consolas, \'andale mono\', \'monotype.com\', \'lucida console\', monospace;">'.$formatted_code.'</table>';
}
function terbilang($number) {
	$number = strval($number);
	if (!ereg("^[0-9]{1,15}$", $number)) 
		return(false); 
	$ones = array("", "satu", "dua", "tiga", "empat", 
		"lima", "enam", "tujuh", "delapan", "sembilan");
	$majorUnits = array("", "ribu", "juta", "milyar", "trilyun");
	$minorUnits = array("", "puluh", "ratus");
	$result = "";
	$isAnyMajorUnit = false;
	$length = strlen($number);
	for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
		if ($number{$i} != '0') {
			if ($number{$i} != '1')
				$result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
			else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
				if ($number{$i + 1} == '1') 
					$result .= "sebelas "; 
				else 
					$result .= $ones[$number{$i + 1}]." belas ";
				$i++; $pos--;
			} else if ($pos % 3 != 0)
				$result .= "se".$minorUnits[$pos % 3].' ';
			else if ($pos == 3 && !$isAnyMajorUnit)
				$result .= "se";
			else
				$result .= "satu ";
			$isAnyMajorUnit = true;
		}
		if ($pos % 3 == 0 && $isAnyMajorUnit) {
			$result .= $majorUnits[$pos / 3].' ';
			$isAnyMajorUnit = false;
		}
	}
	$result = trim($result);
	if ($result == "") $result = "nol";
	return($result.' rupiah');
}
function comboarray($varname,$list){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
    for($j=0;$j<=$i-1;$j++){
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
    }
	echo '</select>';
}
function combolist($varname,$tablename,$valuefield,$captionfield){
	$sql="select * from $tablename";	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option>-Pilih-</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
	}
	echo '</select>';
}
function comboarray2($varname,$list,$selectedval){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$selectedval.'" selected="selected">'.$selectedval.'</option>';
    for($j=0;$j<=$i-1;$j++){
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
    }
	echo '</select>';
}
function comboarrayedit($varname,$list,$value){
    $a=explode(',',$list);
    $i=count($a);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$value.'" selected="selected">'.$value.'</option>';
    for($j=0;$j<=$i-1;$j++){
		echo '<option value="'.$a[$j].'">'.$a[$j].'</option>';
    }
	echo '</select>';
}
function combofield($varname,$tablename){
	$sql="show fields from $tablename";	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option></option>';
	while($data=mysql_fetch_row($hasil)){		
		echo '<option value="'.$data[0].'">'.$data[0].'</option>';
	}
	echo '</select>';
}
function combolistval($varname,$tablename,$valuefield,$captionfield,$value){
	$sql="select * from $tablename";	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option>'.$value.'</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
	}
	echo '</select>';
}
function combolistcriteria($varname,$tablename,$valuefield,$captionfield,$criteriafield,$criteriavalue){
	$sql="select * from $tablename where ".$criteriafield."=".$criteriavalue;	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
	}
	echo '</select>';
}
function combolistobatdokter($dokterid,$i){
	$sql="select * from obatresep o left join trademarks t on(o.trademark_id=t.id_trademark) where o.dokter_id=".$dokterid." order by t.trademark_name";	
	$hasil=mysql_query($sql);
	echo '<select name="obat'.$i.'">';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data['id_trademark'].'">'.$data['trademark_name'].'</option>';
	}
	echo '</select>';
}
function combolistcriteria2($varname,$tablename,$valuefield,$captionfield,$criteria){
	$sql="select * from $tablename where ".$criteria;	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option></option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
	}
	echo '</select>';
}
function combolist2($varname,$tablename,$valuefield,$captionfield,$script){
	$sql="select * from $tablename";	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'" onchange ="'.$script.'">';
	echo '<option>--pilih--</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
	}
	echo '</select>';
}
function combolistedit($varname,$tablename,$valuefield,$captionfield,$value,$caption){
	$sql="select * from $tablename";	
	$hasil=mysql_query($sql);
	echo '<select name="'.$varname.'" id="'.$varname.'">';
	echo '<option value="'.$value.'" selected="selected">'.$caption.'</option>';
	while($data=mysql_fetch_array($hasil)){		
		echo '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
	}
	echo '</select>';
}
function SaveToFile($filename,$content){
  $fp=fopen($filename,'w');   
  $tmp=fputs($fp,$content);
  fclose($fp);
if($tmp){
   $this->pesan_sukses("Proses Simpan Berhasil.<br/> Lokasi File : ".$filename);
} else {
   $this->pesan_gagal("Proses Simpan Gagal.");
}
}
function uang($number){
echo number_format($number,0,",",".").'&nbsp;&nbsp;';
}
function pesan_sukses($s){
echo '<div class="message success" style="margin-top:30px">
          <h3>Success!</h3>
	<p>
		'.$s.'.
	</p>
</div>';	
	
}
function pesan_gagal($s){
echo '<div class="message error"  style="margin-top:30px">
          <h3>Failed!</h3>
	<p>
		'.$s.'.
	</p>
</div>';	
	
}
function pesan_info($s){
echo '<div class="message info"  style="margin-top:30px">
          <h3>Info</h3>
	<p>
		'.$s.'.
	</p>
</div>';	
}
function pesan_warning($s){
echo '<div class="message warning"  style="margin-top:30px">
          <h3>Warning!</h3>
	<p>
		'.$s.'.
	</p>
</div>';	
	
}
function reversedate($tgl){
	$t=explode("-",$tgl);
	$val=$t[2].'-'.$t[1].'-'.$t[0];
	return $val;	
}
} // end Core
?>
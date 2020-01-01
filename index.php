<?php
$file = fopen("test.txt","r");

$linenumber= 1;
$function = 'function';
$close_brkt = '}';
$if = 'if';	
while(!feof($file)) {
$line = fgets($file) ;
////// Rule1 start here 
if(strpos($line, $function) !== false){
if($line[-3]=='{' && $line[-4]!=')')
{
echo  "Rule [1] violated at line [$linenumber].".'<br>' ; 
}
}
////// Rule1 end here  
///// Rule2 start here 
if ( strpos($line,$close_brkt,0 )) {
if(preg_match("/\t/", $line) && strpos($line,$close_brkt,0 )!=1){ 
echo  "Rule [2] violated at line [$linenumber].".'<br>' ; 
}
}
///// Rule2 end here 
////// Rule3 start here  
if(strpos($line, $if) != false){
if(!preg_match('/[if]\s+\(\d+.*/',$line)) {	
echo  "Rule [3] violated at line [$linenumber].".'<br>' ; 

}
}
////// Rule3 end here  
///// Rule4 start here 
preg_match('/^(\s+)/',$line,$matches);
$identSize = strlen($matches[1]);

if(strspn($line, "\t")!=1)
{ 
if($identSize != 4)	
{
echo  "Rule [4] violated at line [$linenumber].".'<br>' ; 
}
}
///// Rule4 end here 


///// Rule5 start here 


if(preg_match('/^\s*$/',$line)&& ( $linenumber==1) )
{
echo  "Rule [5] violated at line [$linenumber].".'<br>' ; 	
}
///// Rule5 end here 


$linenumber++;   
}



fclose($file);



?>

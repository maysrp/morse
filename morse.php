<?php
	class morse{
		public $morse;
		public $str;
		public function __construct(){
			$this->morse=array('a'=>'.-','b'=>'-...','c'=>'-.-.','d'=>'-..','e'=>'.','f'=>'..-.','g'=>'--.','h'=>'....','i'=>'..','j'=>'.---','k'=>'-.-','l'=>'.-..','m'=>'--','n'=>'-.','o'=>'---','p'=>'.--.','q'=>'--.-','r'=>'.-.','s'=>'...','t'=>'-','u'=>'..-','v'=>'...-','w'=>'.--','x'=>'-..-','y'=>'-.--','z'=>'--..','0'=>'-----','1'=>'.----','2'=>'..---','3'=>'...--','4'=>'....-','5'=>'.....','6'=>'-....','7'=>'--...','8'=>'---..','9'=>'----.','.'=>'.-.-.-',':'=>'---...',','=>'--..--',';'=>'-.-.-.','?'=>'..--..','='=>'-...-','\''=>'.----.','/'=>'-..-.','!'=>'-.-.--',' '=>'-....-','-'=>'-....-','_'=>'..--.-','"'=>'.-..-.','('=>'-.--.',')'=>'-.--.-','$'=>'...-..-','&'=>'·-···','@'=>'.--.-.','+'=>'.-.-.');
			$this->str=array_flip($this->morse);
		}
		public function encode($string){
			$string=strtolower($string);
			$len=strlen($string);

			$sc="";
			for ($i=0; $i < $len; $i++) { 
				$k=$string[$i];
				$sc=$sc." ".$this->morse[$k];
			}
			return trim($sc);
		}
		public function decode($string){
			if(preg_match('/\//', $string)){
				$string=trim($string);
				$string_array=explode("/",$string);
			}else{
				$string=preg_replace('/\s+/', ' ', $string);
				$string=trim($string);
				$string_array=explode(" ",$string);
			}
			$sc="";
			foreach ($string_array as $key => $value) {
				$sc=$sc."".$this->str[$value];
			}
			return trim($sc);
		}
	}

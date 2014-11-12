<?php 
namespace classes;

$raizGPF = dirname(__FILE__). "/..";
require_once("$raizGPF/fpdf/PDF_Code128.php");
require_once("$raizGPF/classes/GeradorPDF.php");

class GeradorPDFQRCode extends GeradorPDF{
	

	
	private $clientes;
	
	function __construct($clientes){
		parent::__construct( "A4", "P");
		$this->clientes= $clientes;
		error_reporting(0);
		
		
	}
	public function desenharItens(){
		$this->pdf = new \fpdf\PDF_Code128("P", 'mm', 'A4');
		$this->pdf->SetMargins(2,2,2);
		$this->pdf->AliasNbPages();
		$this->pdf->SetDrawColor(100,100,100);
		$this->pdf->SetFillColor(255,255,255);
		$this->pdf->Open();
		$this->pdf->AddPage($this->disposicao, $this->folha);
		$this->pdf->SetLineWidth(0.1);
		$this->pdf->SetTextColor(0,0,0);
		
		$x = 5;
		$y = 5;
		foreach ($this->clientes as $cliente){
				$xy = $this->desenhaQRCode($cliente, $x, $y);
				$x = $xy["x"];
				$y = $xy["y"];
				if($x==5 && $y==5){
					$this->pdf->AddPage($this->disposicao, $this->folha);
				}
		}
		return $this->pdf;
	}
	private function desenhaQRCode($cliente, $x=5, $y=5){

		$oldX = $x;
		$oldY = $y;

		
		
		$this->pdf->SetFillColor(255,126,24);
		$this->pdf->SetXY($x, $y);
		$this->pdf->Cell(200, 50, "", 0,"", "",1);
		$this->pdf->SetFillColor(255,255,255);
				
// 		ini_set("allow_url_fopen", 1);
		// coloca o logo
		$logo = "http://chart.apis.google.com/chart?cht=qr&chl=http://www.juiceintime.com/solicitacaoQRCode/send.php?param=".str_replace(" ", "_", $cliente->getNome()."FIMCAMPO".$cliente->getEmail())."FIMCAMPO".str_replace(" ", "_", $cliente->getTelefone())."FIMCAMPO".str_replace(" ", "_", $cliente->getCodigo())."&chs=320x320&extention.png";
		$logoInfo=getimagesize($logo);
		$logoW=$logoInfo[0];
		$logoH=$logoInfo[1];
		$logoWmm = ($logoW/72)*25.4;
		$imgW = $logoWmm;
		$logoHmm = ($logoH/72)*25.4;
		$imgH = $logoHmm;
		if ( $logoWmm > $w/2 ){
			$imgW = $w/2;
			$imgH = $logoHmm * ($imgW/$logoWmm);
		}
		$this->pdf->Image($logo,$x+5,$y+5,40,40,'png');

		$y1= $y+37+9;
		$w=45;
		$h = 5;
		$aFont = array('font'=>'Arial','size'=>8,'style'=>'B');
		$codigo = $cliente->getCodigo();
		$texto =  (empty($codigo))? $cliente->getNome() : $codigo . " - " . $cliente->getNome();//$logo; //
		
		$this->pdf->SetTextColor(255,255,255);
		$this->__textBox($x+5,$y1,$w,$h,$texto,$aFont,'T','L',0,'');
		
		// coloca o logo
		$logo = "../../resources/img/acabaram-as-capsulas-title.png";
		$logoInfo=getimagesize($logo);
		$logoW=$logoInfo[0];
		$logoH=$logoInfo[1];
		$logoWmm = ($logoW/72)*25.4;
		$imgW = $logoWmm;
		$logoHmm = ($logoH/72)*25.4;
		$imgH = $logoHmm;
		if ( $logoWmm > $w/2 ){
			$imgW = $w/2;
			$imgH = $logoHmm * ($imgW/$logoWmm);
		}
		$this->pdf->Image($logo,$x+65,$y,135,50,'png');
		
		$y +=53;
		
		if($y>=270){
			$y=5;
			$x=5;
		}
		
		
		return array("x"=> 5, "y"=>$y);

	}
	
	
	
	
	
	protected $val = true;
	
	
	
	public function tamanhoFuturoProxItem($item){
		
		$y = 4;

		return $y;
	}
	
	protected function calculaTotalPaginas($itens){
		$tamanho1Cabecalho = 47;
		$tamanho1CabecalhoItem = 10;
		$this->totalPaginas=1;
		$aFont = array('font'=>'Arial','size'=>7,'style'=>'');

		$tamanhoTotalCorpo=$tamanho1Cabecalho+$tamanho1CabecalhoItem;
		
		
		foreach ($itens as $item){
//			for($i=1; $i<32	; $i++){
				$tamProxItem  = $this->tamanhoFuturoProxItem($item);
				
				
				
				$tamanhoTotalCorpo += $tamProxItem + 1;
				
				
				if($tamanhoTotalCorpo > $this->maxY){
					$this->totalPaginas++;
					$tamanhoTotalCorpo = $tamanho1CabecalhoItem + $tamProxItem + 1;
					
					if($this->addCabecPaginasNovas){
						$tamanhoTotalCorpo += $tamanho1Cabecalho;
	
					}
				}
//			}
		}
//		$this->__textBox(5,5,5,5,$tamanhoTotalCorpo,$aFont,'T','R',0,'');
		
		 
		
		
		
		
	
	}
}
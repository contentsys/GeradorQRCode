<?php

namespace classes;



abstract class GeradorPDFRelatorios extends GeradorPDF{

	protected $maxY;
	protected $nomeRelatorio;
	protected $addCabecPaginasNovas;
	protected $numeroDaPagina;
	protected $totalPaginas;
	
	public function __construct( $maxY, $nomeRelatorio,$addCabecPaginasNovas=false, $folha='A4', $disposicao='P'){
		parent::__construct(  $folha, $disposicao);
		$this->maxY = $maxY;
		$this->nomeRelatorio = $nomeRelatorio;
		$this->addCabecPaginasNovas = $addCabecPaginasNovas;


	}


	public  function desenhaCabecalho($x=5, $y=5){

		$oldX = $x;
		$oldY = $y;

		$w=80;
		$h=42;

		$oldY += $h;
		$this->__textBox($x,$y,$w,$h);
		$aFont = array('font'=>'Arial','size'=>6,'style'=>'I');
		$texto =""; ('IDENTIFICA��O DO EMITENTE');
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		// coloca o logo
		$logo = dirname(__FILE__) . "/../resources/img/logoFato.gif";
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
		$this->pdf->Image($this->emitente->getLogoNfe(),$x+($w/4),$y+($h/12),$imgW,0,'','jpeg');
		//Nome emitente
		$aFont = array('font'=>'Arial','size'=>8,'style'=>'B');
		$texto = "FATO Assessoria Empresarial";
		$y1 = $y + 24;//$y+$imgH*1.5;
		$this->__textBox($x,$y1,$w,8,$texto,$aFont,'T','C',0,'',FALSE);
		//endereÃƒÂ§o
		$y1 = $y1+6;
		$aFont = array('font'=>'Arial','size'=>7,'style'=>'');
		$fone = "(19) 3232-2367";
		$lgr = "Rua";
		$nro = "120";
		$cpl = "Condominio TAL, ap 94";
		$bairro = "Centro";
		$CEP = "13000-000";
		//		$CEP = $this->__format($CEP,"#####-###");
		$mun = "Campinas";
		$UF = "SP";
		$texto =  $lgr . "," . $nro . "  " . $cpl . "\n" . $bairro . " - " . $CEP . "\n" . $mun . " - " . $UF . "\n" . "Fone/Fax: " . $fone;
		$texto =  $texto;
		$this->__textBox($x,$y1,$w,8,$texto,$aFont,'T','C',0,'');

		$x += $w;
		$w = 120;
		$texto = $this->nomeRelatorio;
		$aFont = array('font'=>'Arial','size'=>15,'style'=>'B');
		$this->__textBox($x,$y,$w,$h,$texto,$aFont,'T','C',1,'');

		
		$oldY = $y+$h;
		//        $this->__textBox($x,$y1,$w,5,$texto,$aFont,'B','L',0,'');
		//        $this->pdf->Line();
		return $oldY;

	}
	
	protected abstract function desenhaCabecalhoItens($x=5, $y=5);

	public function desenhaCorpoRelatorio($itens){
		$this->numeroDaPagina = 1;
		$this->pdf = new \fpdf\PDF_Code128("P", 'mm', "A4");
		$this->pdf->SetMargins(2,2,2);
		$this->pdf->AliasNbPages();
		$this->pdf->SetDrawColor(100,100,100);
        $this->pdf->SetFillColor(255,255,255);
        $this->pdf->Open();
        $this->pdf->AddPage($this->disposicao, ($this->folha));
        $this->pdf->SetLineWidth(0.1);
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetDrawColor(100,100,100);
        
        $this->calculaTotalPaginas($itens);
        
        $y = $this->desenhaCabecalho();
        $y = $this->desenhaCabecalhoItens(5, $y);
//        $this->desenhaRodape(5, $this->maxY);

        
       
		
		foreach ($itens as $item) {
//			for($i=1; $i<32; $i++){
//				$aFont = array('font'=>'Arial','size'=>7,'style'=>'');
				
				if( ($y + $this->tamanhoFuturoProxItem($item)) > $this->maxY){
					 $this->pdf->AddPage($this->disposicao, ($this->folha));
					 
					 
					 $this->numeroDaPagina++;
					 $y = 5;
					
					 
					 if($this->addCabecPaginasNovas){
					 	$y = $this->desenhaCabecalho();
					 }
					
					 $y = $this->desenhaCabecalhoItens(5, $y);
					 
//					 $this->desenhaRodape(5, $this->maxY);
					 
				}
				$y = $this->desenhaItem($item, 5, $y);
			
//			}
//			$this->__textBox(10,5,5,5,$this->maxY,$aFont,'T','R',0,'');
			

			
			
			
		}
		
		return $this->pdf;
		
	}
	
	protected function calculaTotalPaginas($itens){
		$tamanho1Cabecalho = 47;
		$tamanho1CabecalhoItem = 10;
		$this->totalPaginas=1;
//		$tamanhoTotalCabecalhos=$tamanho1Cabecalho;
		$tamanhoTotalCorpo=$tamanho1Cabecalho+$tamanho1CabecalhoItem;
		
		
		foreach ($itens as $item){
			$tamProxItem  = $this->tamanhoFuturoProxItem($item);
			
			
			
			$tamanhoTotalCorpo += $tamProxItem + 1;
			
//			echo  "TotalCorpo = $tamanhoTotalCorpo<br>";	
			
			if($tamanhoTotalCorpo >= $this->maxY){
				$this->totalPaginas++;
				$tamanhoTotalCorpo = $tamanho1CabecalhoItem + $tamProxItem + 1;
				
				if($this->addCabecPaginasNovas){
					$tamanhoTotalCorpo += $tamanho1Cabecalho;

				}
//				echo  "*TotalCorpo = $tamanhoTotalCorpo<br>";	
			}
			
		}
		
		
//		$this->totalPaginas = ceil($tamanhoTotalCorpo/$this->maxY);
		
		
	
	}
	
	protected function desenhaRodape($x=5, $y=285){
		$oldX = $x;
		$oldY = $y;
		
		$this->pdf->Line($x, $y, 205, $y);
		
		$y+=2;
		$aFont = array('font'=>'Arial','size'=>7,'style'=>'');
		$texto = "Pagina: ". $this->numeroDaPagina;
		$w = 200;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','R',0,'');
		$x+= $w;
	}
	
	public abstract function tamanhoFuturoProxItem($item);
	
	protected abstract function desenhaItem($item, $x=5, $y=5);
}
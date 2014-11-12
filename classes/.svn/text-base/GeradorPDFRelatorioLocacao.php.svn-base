<?php 
namespace classes;

class GeradorPDFRelatorioLocacao extends GeradorPDFRelatorios{
	

	
	private $tipoLocacao;
	
	
	function __construct($nomeRelatorio,  $tipoLocacao){
		parent::__construct(207, $nomeRelatorio, false, "A4", "L");
		
		$this->tipoLocacao = $tipoLocacao;
		
		
		
	}
	
	public function desenhaCabecalho($x=5, $y=5){

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
		$logo =  dirname(__FILE__) . "/../resources/img/logo.gif";
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
		$this->pdf->Image($logo,$x+($w/4),$y+($h/12),$imgW,0,'','jpeg');
		//Nome emitente
		$aFont = array('font'=>'Arial','size'=>8,'style'=>'B');
		$texto =  "GJ CONSTRUCOES LTDA";
		$y1 = $y + 24;//$y+$imgH*1.5;
		$this->__textBox($x,$y1,$w,8,$texto,$aFont,'T','C',0,'',FALSE);
		//endereÃƒÂ§o
		$y1 = $y1+6;
		$aFont = array('font'=>'Arial','size'=>7,'style'=>'');
		$fone = "(19) 3232-2367";
		$lgr = "Rua Expedicionario Ermelindo Antonio Petris Marangoni";
		$nro = "336";
		$cpl = "";
		$bairro = "Vila Pompeia";
		$CEP = "13050-460";
		//		$CEP = $this->__format($CEP,"#####-###");
		$mun = "Campinas";
		$UF = "SP";
		$texto =  $lgr . "," . $nro . "  " . $cpl . "\n" . $bairro . " - " . $CEP . "\n" . $mun . " - " . $UF . "\n" . "Fone/Fax: " . $fone;
		$texto =  $texto;
		$this->__textBox($x,$y1,$w,8,$texto,$aFont,'T','C',0,'');

		$x += $w;
		$w = 207;
		
		$texto = $this->nomeRelatorio;
		$aFont = array('font'=>'Arial','size'=>15,'style'=>'B');
		$this->__textBox($x, $y, $w, $h);
		$y+=3;
		$this->__textBox($x,$y,$w,$h,$texto,$aFont,'T','C',0,'');
		
		$y+=10;
		$this->pdf->Line($x, $y, 292, $y);
		$y1 = $y + 5;
		
		
		
		
		$texto = "Pagina: " . $this->numeroDaPagina . " de ". $this->totalPaginas;
		$aFont = array('font'=>'Arial','size'=>8,'style'=>'');
		$this->__textBox($x+5,$y1,$w,$h,$texto,$aFont,'T','L',0,'');
		$y1+= 5;
		
		$texto = "Tipo Locacoes: " . $this->tipoLocacao;
		$aFont = array('font'=>'Arial','size'=>8,'style'=>'');
		$this->__textBox($x+5,$y1,$w,$h,$texto,$aFont,'T','L',0,'');
		$y1+= 5;
		
//		$texto = "Credenciado: SIAC - SERVICO INTEGRADO DE ANESTESIA DE CAMPINAS SC LTDA";
//		$aFont = array('font'=>'Arial','size'=>8,'style'=>'');
//		$this->__textBox($x+5,$y1,$w,$h,$texto,$aFont,'T','L',0,'');
//		$y1+= 5;
		
	
		
//		$texto = "De: " . $this->dataInicial . " ate: " . $this->dataFinal;
//		$aFont = array('font'=>'Arial','size'=>8,'style'=>'');
//		$this->__textBox($x+5,$y1,$w,$h,$texto,$aFont,'T','L',0,'');
		
		
		
		
		$oldY = $y+$h-13;
		
//		$this->pdf->Line(5, 207, 292, 207);
		
		//        $this->__textBox($x,$y1,$w,5,$texto,$aFont,'B','L',0,'');
		//        $this->pdf->Line();
		return $oldY;

	}
	
	
	
	protected  function desenhaCabecalhoItens($x=5, $y=5){
		$oldX = $x;
		$oldY = $y;
		
		$h = 10;
		
		$y1= $y+10;
		
		$this->pdf->Line($x, $y1, $x+286, $y1);
		
		
		$aFont = array('font'=>'Arial','size'=>7.5,'style'=>'B');
		
		$texto = "Equipamento";
		$w = 60;
		$y+=6;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		$texto = "Fornecedor";
		$w = 60;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		$texto = "Data Locacao";
		$w = 20;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		
		
		
		
		$texto = "Obra";
		$w = 60;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		$texto = "Contrato";
		$w = 40;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		
		$texto = "Devolucao";
		$w = 20;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		$texto = "Valor (R$)";
		$w = 20;
		$this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
		$x+= $w;
		
		return $oldY + $h;
	}
	
	protected $val = true;
	
	protected function desenhaItem($item, $x=5, $y=5){
		$oldX = $x;
		$oldY = $y;
		
		$x=5;
   		
		$y+=1;
        $aFont = array('font'=>'Arial','size'=>7,'style'=>'');
		$w=60;
        $texto = $item->getEquipamento();
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');

        
        
        $x+=$w;
        $texto = $item->getFornecedor();
		$w=60;
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
        
        $x+=$w;
        $texto = $item->getDataLocacao();
        $texto = empty($texto)? '': date("d/m/Y", $texto->getTimestamp());
		$w=20;
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
        
       
        
        $x+=$w;
        $texto = $item->getObra()->getNomeObra();
		$w=60;
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
        
        $x+=$w;
        $texto = $item->getContrato();
		$w=40;
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
        
               
        $x+=$w;
        $texto = $item->getDataDevolucao();
        $texto = empty($texto)? '': date('d/m/Y', $texto->getTimestamp());
		$w=20;
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','C',0,'');
        
        $x+=$w;
        $texto = number_format($item->getValor(), 2, ",", ".");
		$w=20;
        $this->__textBox($x,$y,$w,5,$texto,$aFont,'T','R',0,'');
//      
        
		$y += 4;
		$this->__HdashedLine(5, $y, 287, 0.1, 80);
	
       
        
		return $y;
	}
	
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
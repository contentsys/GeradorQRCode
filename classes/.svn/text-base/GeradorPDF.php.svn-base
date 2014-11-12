<?php


namespace classes;





abstract class GeradorPDF{
	
	protected $pdf;
	protected $logomarca;
	
	protected $folha;
	protected $disposicao;
	
	public function __construct( $folha='A4', $disposicao='P'){
	
		$this->disposicao = $disposicao;
		$this->folha = $folha;
		
		
		
	}
	
	public abstract function desenhaCabecalho();
	
	
	
	
	protected function __textBox($x,$y,$w,$h,$text='',$aFont=array('font'=>'Arial','size'=>8,'style'=>''),$vAlign='T',$hAlign='L',$border=1,$link='',$force=TRUE, $respectBreakLine = false){
        //desenhar a borda
        if($respectBreakLine)
			$text = str_replace("\n","\n[\\n]", $text);
        if ( $border ) {
            $this->pdf->RoundedRect($x,$y,$w,$h,0.8,'D');
        }
        //estabelecer o fonte
        $this->pdf->SetFont($aFont['font'],$aFont['style'],$aFont['size']);
        //calcular o incremento
        $incY = $this->pdf->FontSize; //$aFont['size']/3;//$this->pdf->FontSize;
        if ( !$force ) {
            //verificar se o texto cabe no espaÃƒÂ§o
            $n = $this->pdf->WordWrap($text,$w);
        } else {
            $n = 1;
        }
        //calcular a altura do conjunto de texto
        $altText = $incY * $n;
        //separar o texto em linhas
//        $text = str_replace("\n", "\na", $text);
		
        $lines = explode("\n", $text);
        
//        echo sizeof($lines) . " - " . $isDesc;
        //verificar o alinhamento vertical
        If ( $vAlign == 'T' ) {
            //alinhado ao topo
            $y1 = $y+$incY;
        }
        If ( $vAlign == 'C' ) {
            //alinhado ao centro
            $y1 = $y + $incY + (($h-$altText)/2);
        }
        If ( $vAlign == 'B' ) {
            //alinhado a base
            $y1 = ($y + $h)-0.5; //- ($altText/2);
        }
        //para cada linha
        foreach( $lines as $line ) {
        	if($respectBreakLine)
        		$line = str_replace("[\\n]", "", $line);
            //verificar o comprimento da frase
            $texto = trim($line);
            $comp = $this->pdf->GetStringWidth($texto);
            if ( $force ) {
                $newSize = $aFont['size'];
                while ( $comp > $w ) {
                    //estabelecer novo fonte
                    $this->pdf->SetFont($aFont['font'],$aFont['style'],--$newSize);
                    $comp = $this->pdf->GetStringWidth($texto);
                }
            }
            //ajustar ao alinhamento horizontal
            if ( $hAlign == 'L' ) {
                $x1 = $x+1;
            }
            if ( $hAlign == 'C' ) {
                $x1 = $x + (($w - $comp)/2);
            }
            if ( $hAlign == 'R' ) {
                $x1 = $x + $w - ($comp+0.5);
            }
            //escrever o texto
//            echo $texto ." - " .$isDesc;
            $this->pdf->Text($x1, $y1, $texto);
            //incrementar para escrever o proximo
            $y1 += $incY;
        }
    } // fim funÃƒÂ§ÃƒÂ£o __textBox
    
    protected function __HdashedLine($x,$y,$w,$h,$n) {
        $this->pdf->SetLineWidth($h);
        $wDash=($w/$n)/2; // comprimento dos traÃƒÂ§os
        for( $i=$x; $i<=$x+$w; $i += $wDash+$wDash ) {
            for( $j=$i; $j<= ($i+$wDash); $j++ ) {
                if( $j <= ($x+$w-1) ) {
                    $this->pdf->Line($j,$y,$j+1,$y);
                }
            }
        }
    } //fim funÃƒÂ§ÃƒÂ£o __HdashedLine
    
    /**
     * __format
     * FunÃƒÂ§ÃƒÂ£o de formataÃƒÂ§ÃƒÂ£o de strings.
     * @package NFePHP
     * @name __format
     * @version 1.0
     * @param string $campo String a ser formatada
     * @param string $mascara Regra de formatÃƒÂ§ÃƒÂ£o da string (ex. ##.###.###/####-##)
     * @return string Retorna o campo formatado
     */
    protected function __format($campo='',$mascara=''){
        //remove qualquer formataÃƒÂ§ÃƒÂ£o que ainda exista
//        $sLimpo = ereg_replace("/[' '-./ t]/",'',$campo);
        $sLimpo = str_replace("/[' '-./ t]/",'',$campo);
        // pega o tamanho da string e da mascara
        $tCampo = strlen($sLimpo);
        $tMask = strlen($mascara);
        if ( $tCampo > $tMask ) {
            $tMaior = $tCampo;
        } else {
            $tMaior = $tMask;
        }
	//contar o numero de cerquilhas da marcara
	$aMask = str_split($mascara);
	$z=0;
	$flag=FALSE;
	foreach ( $aMask as $letra ){
		if ($letra == '#'){
			$z++; 
		}	
	}
	if ( $z > $tCampo ) {
            //o campo ÃƒÂ© menor que esperado
            $flag=TRUE;
	}
        //cria uma variÃƒÂ¡vel grande o suficiente para conter os dados
        $sRetorno = '';
        $sRetorno = str_pad($sRetorno, $tCampo+$tMask, " ",STR_PAD_LEFT);
        //pega o tamanho da string de retorno
        $tRetorno = strlen($sRetorno);
        //se houve entrada de dados
        if( $sLimpo != '' && $mascara !='' ) {
            //inicia com a posiÃƒÂ§ÃƒÂ£o do ultimo digito da mascara
            $x = $tMask;
            $y = $tCampo;
            $cI = 0;
            for ( $i = $tMaior-1; $i >= 0; $i-- ) {
                if ($cI < $z){
                    // e o digito da mascara ÃƒÂ© # trocar pelo digito do campo
                    // se o inicio da string da mascara for atingido antes de terminar
                    // o campo considerar #
                    if ( $x > 0 ) {
                        $digMask = $mascara[--$x];
                    } else {
                        $digMask = '#';
                    }
                    //se o fim do campo for atingido antes do fim da mascara
                    //verificar se ÃƒÂ© ( se nÃƒÂ£o for nÃƒÂ£o use
                    if ( $digMask=='#' ) {
                        $cI++;
                        if ( $y > 0 ) {
                            $sRetorno[--$tRetorno] = $sLimpo[--$y];
                        } else {
                            //$sRetorno[--$tRetorno] = '';
                        }
                    } else {
                        if ( $y > 0 ) {
                            $sRetorno[--$tRetorno] = $mascara[$x];
                        } else {
                            if ($mascara[$x] =='('){
                                $sRetorno[--$tRetorno] = $mascara[$x];
                            }
                        }
                        $i++;
                    }
                }
            }
            if (!$flag){
                if ($mascara[0]!='#'){
                    $sRetorno = '(' . trim($sRetorno);
                }
            }
            return trim($sRetorno);
        } else {
            return '';
        }
    } //fim __format
}
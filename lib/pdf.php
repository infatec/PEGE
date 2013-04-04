<?php

require('fpdf/fpdf.php');

class PDFLista extends FPDF

{
    var $widths;
    var $aligns;
    public $image_topo;
    public $titulo1;
    public $titulo2;
    public $titulo_relatorio;
    public $campos=array();
    public $image_rodape;

    //--------------***--------- AKI VAI FICAR O READER------***--------------------------------

    function Header()
    {
//-----------***---AKI É O CABEÇALHO DA PAGINA---***------------------------------------------

        //Seleciona fonte Arial bold 15

        //Move para a direita
        //$this->Cell(15);
        //img do header ( 'caminho da imagem', alinha d/e , alinha cima/maixo,tamanho)
        $this->Image(DOMAIN_PATH.'lib/images/texto_do_relatorio(2).jpg',0.8,1.6, 1.7);
        //Quebra de linha
        $this->Ln(1);
        //config. da fonte
        $this->SetFont('Arial','',8);
        $this->Cell(7.8,0.5,$this->titulo1,2,0,'C');
        $this->Ln(0.5);
        $this->Cell(7.7,0.5,$this->titulo2,0,0,'C');
        //Quebra de linha
        $this->Ln(0.3);
//--------------***---AKI TERMINA O CABEÇALHO DA PAGINA---***----------------------------------




//---***---AKI FICA O TITULO DA TABELA---***---
        $this->SetFont('Arial','',10);
        $this->Cell(7,1,$this->titulo_relatorio,0,0,'C');
        $this->Ln(1.5);
//---***---AKI TERMINA O TITULO DA TABELA---***---


//---***AKI COMEÇA O CABEÇALHO DA TABELA---***----
        $this->SetdrawColor (0,0,0);
        $this->SetFont('Arial','B',7);
        $titulo = $this->campos;
        $this->row($titulo);


//---***---AKI TERMINA O CABEÇALHO DA TABELA--***-
    }//---***---AKI TERMINA O HEADER---***-----------



//---***---AKI COMEÇA O FOOTER---***--------------

    function Footer() {

        //Posição: a 1,5 cm do final
        $this->SetY(20);

        //Arial italic 8
        $this->SetFont('Arial','I',8);

        //Número da página
        $this->Cell(0,1,'Página '.$this->PageNo(),0,0,'C');
        //img do footer ( 'caminho da imagem', alinha d/e , alinha cima/maixo,tamanho)
        $this->Image(DOMAIN_PATH.'lib/images/pege_icon.jpg',28,19.8,1.5);
    }

    //---***---AKI ACABA O FOOTER---***---

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i< count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=0.6*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i< count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,0.4,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}

?>

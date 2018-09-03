<?php

    session_start();
    include_once("../../util.php");
    if (checkSession()) {
        
            // Include the main TCPDF library (search for installation path).
    require_once('tcpdf_include.php');
    
    
    // Extend the TCPDF class to create custom Header and Footer
    class MYPDF extends TCPDF {
    
    	//Page header
    	public function Header() {
    		// Logo
    		$image_file = K_PATH_IMAGES.'fimLogo.jpg';
    		$this->Image($image_file, 8, 8, 15, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);
    		// Set font
    		$this->SetFont('helvetica', 'B', 20);
    		// Title
    		$this->Cell(0, 15, 'Formación Integral de la Mujer IAP', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    	}
    
    	// Page footer
    	public function Footer() {
    		// Position at 15 mm from bottom
    		$this->SetY(-15);
    		// Set font
    		$this->SetFont('helvetica', 'I', 8);
    		// Page number
    		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    	}
    }
    
    // create new PDF document
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('FIM');
    $pdf->SetTitle('Gastos FIM');
    $pdf->SetSubject('');
    $pdf->SetKeywords('PDF, reporte');
    
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // ---------------------------------------------------------
    
    // set font
    $pdf->SetFont('dejavusans', '', 10);

    // add a page
    $pdf->AddPage();

// create some HTML content
        $html= '<h2 style = "text-align: right"> Gastos</h2>';
        $html.= '<table class=" bordered striped centered">
                <thead>
                  <tr>
                      <th><strong>Descripción</strong></th>
                      <th><strong>Monto</strong></th>
                      <th><strong>Fecha</strong></th>
                  </tr>
                </thead>
                <tbody>';
        
        if(isset($_GET["FI"])&&isset($_GET["FF"])){
        
            $gastos=consultarGastoPorFecha($_GET["FI"], $_GET["FF"]);
            if(mysqli_num_rows($gastos)>0){
                while($renglon=mysqli_fetch_assoc($gastos)){
                    $html.="<tr>";
                    $html.="<td>". $renglon["descripcion"] . "</td>";
                    $html.="<td>". $renglon["monto"]. "</td>";
                    $html.="<td>". $renglon["fecha"]. "</td>";
                    $html.="</tr>";
                }
                $html.='</tbody>';
                $html.='</table>';
                
            }
            
            $total=consultarTot($_GET["FI"], $_GET["FF"]);
            
            if(mysqli_num_rows($total)>0){
                while($renglon=mysqli_fetch_assoc($total)){
                    $html.= '<br><br><p style="text-align: right;"> TOTAL: '. $renglon["sum(monto)"] . "</p>" ;
                }
            }
            
        }else{
            $registros=ultimosGastosTotales();
            if(mysqli_num_rows($registros)>0){
                
                while($renglon=mysqli_fetch_assoc($registros)){
                    $html.= "<tr>";
                        $html.= "<td>". $renglon["descripcion"] . "</td>";
                        $html.= "<td>". $renglon["monto"]. "</td>";
                        $html.= "<td>". $renglon["fecha"]. "</td>";
                    $html.= "</tr>";
                }
                    $html.= '</tbody>';
                $html.= '</table>';
            
            $total=consultarTotal();
            
            if(mysqli_num_rows($total)>0){
                while($renglon=mysqli_fetch_assoc($total)){
                    $html.= '<br><br><p style="text-align: right;"> TOTAL: '. $renglon["sum(monto)"] . "</p>" ;
                }
            }
        }            
        }


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


    // ---------------------------------------------------------
    
    //Close and output PDF document
    $pdf->Output('reporte.pdf', 'I');
    
    //============================================================+
    // END OF FILE
    //============================================================+
    
    

    }else{
        header("Location:admin.php?sessionexpired=true");
    }
?>
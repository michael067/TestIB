<?php
    // Include the main TCPDF library (search for installation path).
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

        // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Apprenti Padawan');
    $pdf->SetTitle('Fiche Détail');
    $pdf->SetSubject('Annuaire');
    $pdf->SetKeywords('Annuaire');

    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('times', 'BI', 20);

    // add a page
    $pdf->AddPage();
    
    // set some text to print
    $txt = "Fiche de : ".$detail['nom']." ".$detail['prenom']."\nTel : ".$detail['tel']."\n\nBiographie : ".$detail['bio'];
    /*<<<EOD
    TCPDF Example 002

    Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
    EOD;*/

    // print a block of text using Write()
    $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

    // ---------------------------------------------------------


// create a log channel
$log = new Logger('PdfLogger');
$log->pushHandler(new StreamHandler('log/pdflogger.log', Logger::WARNING));

// add records to the log
$log->warning('Création PDF de '.$detail['nom'].' '.$detail['prenom'].' '.date("m.d.y").' valide');


    //Close and output PDF document
    $pdf->Output('Fiche'.$detail['nom'].$detail['prenom'].'.pdf', 'I');
?>
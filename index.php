<?php

require_once __DIR__ . '/vendor/autoload.php';
    if(!$_POST)
    {
      header("Location: http://localhost/moviePdf/form.php");
      die();
    }
    $title = $_POST['title'];
    $link  = $_POST['link'];

    ob_start();

    require 'moviePdfHtml.php';
    $htmlFile = ob_get_clean();
    ob_clean();

    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML(utf8_encode($htmlFile));

    $mpdf->Output('MyPDF.pdf', 'D');

@extends('Dashboard.Configuration.constructor', ["title" => "SISMAEST - ".$title, "description" => $description, "title_page" => $title_page, "description_page" => $description_page, "icon"=> $icon, "page" => "Estoque-Categorias-Adicionar"])

@section('content')
<iframe src="{{asset('./Documento.pdf')}}" height="700" width="800" id='tessste'></iframe>
<script type="module">
    import {
        PDFDocument,
        rgb,
        degrees
    } from 'https://cdn.skypack.dev/pdf-lib@^1.11.1?dts';

    const url = 'http://localhost/Documento.pdf';
    const existingPdfBytes = await fetch(url).then(res => res.arrayBuffer())

    const pdfDoc = await PDFDocument.load(existingPdfBytes)

    const pages = pdfDoc.getPages()
    const firstPage = pages[0]
    const {
        width,
        height
    } = firstPage.getSize()
    firstPage.drawText('Sd Florencio', {
        x: 150,
        y: 650,
        size: 8,
        color: rgb(0, 0, 0)
    });
    firstPage.drawText('25   02   2002', {
        x: 84,
        y: 640,
        size: 8,
        color: rgb(0, 0, 0)
    });
    firstPage.drawText('Sd Florencio', {
        x: 400,
        y: 650,
        size: 8,
        color: rgb(0, 0, 0)
    });
    
    firstPage.drawText('25   02   2002', {
        x: 325,
        y: 640,
        size: 8,
        color: rgb(0, 0, 0)
    });

    firstPage.drawText('Sd Florencio 1', {
        x: 165,
        y: 606,
        size: 8,
        color: rgb(0, 0, 0)
    });
    firstPage.drawText('25   02   2002  ..', {
        x: 84,
        y: 598,
        size: 8,
        color: rgb(0, 0, 0)
    });

    firstPage.drawText('Sd Florencio 2', {
        x: 350,
        y: 606,
        size: 8,
        color: rgb(0, 0, 0)
    });
    
    firstPage.drawText('25   02   2002 ...', {
        x: 325,
        y: 598,
        size: 8,
        color: rgb(0, 0, 0)
    });

    const pdfBytes = await pdfDoc.save();

    var bytes = new Uint8Array(pdfBytes);
    var blob = new Blob([bytes], {
        type: "application/pdf"
    });
    const docUrl = URL.createObjectURL(blob);

    document.getElementById('tessste').src = docUrl;
    
</script>
@endsection
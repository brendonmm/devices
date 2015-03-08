<?php
    /* RWD Devices */    
?>
<!doctype html>
<html lang="pt-BR" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>RWD Devices</title>
    <meta name="description" content="Aqui você encontra os principais dispositivos do mercado e informações para desenvolver seu app e site melhor">
    <?php include 'includes/header.php';  ?>
    
    <?php include 'includes/google-analytics.php';  ?>

</head>
<body>
    <div id="page-wrap">
        <h1>RWD Devices</h1>
        <h2>Principais dispositivos</h2>
        <p>Aqui você encontra os principais dispositivos do mercado e informações para desenvolver seu app e site melhor.</p>
        <h2>Como funciona</h2>
        <p>As dimensões em pixel são a contagem de pixel no hardware físico.</p>
        <ul class="lista">
            <li>Smartphones estão listados no modo Retrato (portrait), por isso a largura sempre é menor que a altura (width x height).</li>
            <li>Já nos tablets e PCs, estão listados no modo Paisagem (landscape), por se tratarem de dispositivos utilizados nesse modo por padrão, sendo assim, a largura sempre será maior que a altura.</li>
        </ul>
        <p>CSS Pixel Ratio é a taxa de pixels entre o pixel do hardware e o CSS Pixel, definido pelas especificações do CSS 2.1.</p>
        <ul class="lista" lang="en">
            <li><strong>ldpi</strong> (<em>low</em>) ~120dpi - 0.75</li>
            <li><strong>mdpi</strong> (<em>medium</em>) ~160dpi - 1</li>
            <li><strong>hdpi</strong> (<em>high</em>) ~240dpi - 1.5</li>
            <li><strong>xhdpi</strong> (<em>extra-high</em>) ~320dpi - 2</li>
            <li><strong>xxhdpi</strong> (<em>extra-extra-high</em>) ~480dpi - 3</li>
            <li><strong>xxxhdpi</strong> (<em>extra-extra-extra-high</em>) ~640dpi - 4</li>
        </ul>
        <p>As telas de alta densidade (<em lang="en">Hight Density</em>), costumam ter mais de 200dpis, então os valores de pixels devem ser divididos para a escala de referência correta ao pixel utilizado.</p>
        <blockquote cite="http://www.w3.org/TR/CSS2/syndata.html#length-units" >
            <q>The reference pixel is the visual angle of one pixel on a device with a pixel density of 96dpi and a distance from the reader of an arm's length. For a nominal arm's length of 28 inches, the visual angle is therefore about 0.0213 degrees. For reading at arm's length, 1px thus corresponds to about 0.26 mm (1/96 inch).</q>
            <cite>http://www.w3.org/TR/CSS2/syndata.html#length-units</cite>
        </blockquote>
        <p>As dimensões do dispositivo são as dimensões de CSS Pixel em escala de 100%. Podemos indicar isso ao dispositivo por meio da <em>viewport</em> meta tag:</p>
        <pre class="javascript">&lt;meta&nbsp;name=<span class="string">"viewport"</span>&nbsp;content=<span class="string">"width=device-width"</span> /&gt;<br></pre>
        <p>O CSS Pixel Width pode ser calculado dividindo a largura do dispositivo (valor de pixels), por sua taxa de pixels (CSS Pixel Ratio), e arredondando o valor para inteiro.</p>
        <div class="alert">
            <span>Legenda:</span><span class="span-novo">ADICIONADO RECENTEMENTE</span> <span class="span-descontinuado">DESCONTINUADO</span> <span class="span-obsoleto">OBSOLETO</span>
        </div>
    </div>
    <div class="container-table">
        <table id="dispositivos" border='1' class="table" lang="en">
            <thead>
                <tr>
                    <th class="reorder-false reorder-block-left"><strong>Device</strong></th>
                    <th><strong>Resolution</strong></th>
                    <th><strong>Density</strong></th>
                    <th><strong>Screen Size</strong></th>
                    <th><strong>PPI</strong></th>
                    <th><strong>DPI</strong></th>
                    <th><strong>CSS Pixel Ratio</strong></th>
                    <th><strong>CSS Width</strong></th>
                    <th><strong>Aspect Ratio</strong></th>
                    <th><strong>Graphics Array</strong></th>
                    <th class="reorder-block-end"><strong>OS</strong></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <?php include 'includes/scripts.php';  ?>

</body>
</html>
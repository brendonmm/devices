<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RWD Devices</title>
    <style type="text/css">
		table { font-family: 'Trebuchet MS', 'Courier Pro', 'Courier New', Arial, sans-serif; background: #ccc; border-color: #000; border-collapse: collapse; }
  		table th { padding: 5px; font-size: 16px; font-weight: bold; color: #fff; background: #000; }
		table td { font-family: 'Courier Pro', 'Courier New', Arial, sans-serif; padding: 5px; }
		table td:nth-child(2) { font-family: 'Trebuchet MS', 'Courier New', Arial, sans-serif; background: #bbb; font-weight: bold; }
        .novo td { background: #dec36a; }
        .novo td:nth-child(2) { background: #aa6d22; }
        .alert { margin: 20px 0; font-family: 'Trebuchet MS', 'Courier Pro', 'Courier New', Arial, sans-serif; position: relative; float: left; }
        .alert span { font-family: 'Courier Pro', 'Courier New', Arial, sans-serif; }
        .span-novo { width: auto; height: 20px; padding: 5px; color: #aa6d22; border: 1px solid #aa6d22; background: #dec36a; position: relative; }
        .span-antigo { width: auto; height: 20px; padding: 5px; color: #888; border: 1px solid #bbb; background: #ccc; position: relative; }
	</style>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
        var dispositivo;

        function xmlLoader(url) {
            if (window.XMLHttpRequest) {
                var Loader = new XMLHttpRequest();
                Loader.open("GET", url, false);
                Loader.send(null);
                return Loader.responseXML;
            }
            else if (window.ActiveXObject) {
                var Loader = new ActiveXObject("Msxml2.DOMDocument.3.0");
                Loader.async = false;
                Loader.load(url);
                return Loader;
            }
        }

        function mountTable(dispositivo) {
            // Imprime os dados
            buffer = "<table  width='100%' border='1' style='border-collapse: collapse'>";
            buffer += "<tr>";
            buffer += "<th align=center><strong></strong></th>";
            buffer += "<th align=center><strong>Dispositivo</strong></th>";
            buffer += "<th align=center><strong>Resolution</strong></th>";
            buffer += "<th align=center><strong>Density</strong></th>";
            buffer += "<th align=center><strong>Screen Size</strong></th>";
            buffer += "<th align=center><strong>PPI</strong></th>";
            buffer += "<th align=center><strong>DPI</strong></th>";
            buffer += "<th align=center><strong>CSS Pixel Ratio</strong></th>";
            buffer += "<th align=center><strong>CSS Width</strong></th>";
            buffer += "<th align=center><strong>Aspect Ratio</strong></th>";
            buffer += "<th align=center><strong>Graphics Array</strong></th>";
            buffer += "<th align=center><strong>OS</strong></th>";
            buffer += "</tr>";

            for (b = 0; b < dispositivo.length; b++) {
                if (dispositivo[b].novo === 'yes') {
                    buffer += "<tr class=\"novo\">";
                } else {
                    buffer += "<tr>";
                }

                //buffer += "<tr>";
                buffer += "<td>" + '<img src="images/' + dispositivo[b].icon + '.png" alt="' + dispositivo[b].icon + '" />' + "</td>";
                buffer += "<td>" + dispositivo[b].nome + "</td>";
                buffer += "<td align=center>" + dispositivo[b].resolution + "</td>";
                buffer += "<td align=center>" + dispositivo[b].density + "</td>";
                buffer += "<td align=center>" + dispositivo[b].screen_size + "</td>";
                buffer += "<td align=center>" + dispositivo[b].ppi + "</td>";
                buffer += "<td align=center>" + dispositivo[b].dpi + "</td>";
                buffer += "<td align=center>" + dispositivo[b].css_pixel_ratio + "</td>";
                buffer += "<td align=center>" + dispositivo[b].css_width + "</td>";
                buffer += "<td align=center>" + dispositivo[b].aspect_ratio + "</td>";
                buffer += "<td align=center>" + dispositivo[b].graphics_array + "</td>";
                buffer += "<td align=center>" + dispositivo[b].os + "</td>";
                buffer += "</tr>";
            }

            buffer += "</table>";
            document.write(buffer);
        }

        function Dispositivo() {
            var icon = "";
            var nome = "";
            var resolution = "";
            var density = "";
            var screen_size = "";
            var ppi = "";
            var dpi = "";
            var css_pixel_ratio = "";
            var css_width = "";
            var aspect_ratio = "";
            var graphics_array = "";
            var os = "";
            var novo = "";
        }

        function xmlParserDispositivosSimplificado(xmlNode) {
            dispositivo = new Array();
            var contador = 0;

            // Captura o Root Element
            xmlRootNode = xmlNode.getElementsByTagName('dispositivos')[0];

            // Captura o array de filhos do Root Element
            xmlListaDevices = xmlRootNode.getElementsByTagName('device');

            // Navega por casa tag 'pessoa'
            for (i = 0; i < xmlListaDevices.length; i++) {
                // Cria o objeto pessoa
                dispositivo[i] = new Dispositivo();

                // Acessa os dados (nós filhos) de uma pessoa
                xmlDeviceNode = xmlListaDevices[i];
                dispositivo[i].icon = xmlDeviceNode.getElementsByTagName('icon')[0].firstChild.nodeValue;
                dispositivo[i].nome = xmlDeviceNode.getElementsByTagName('nome')[0].firstChild.nodeValue;
                dispositivo[i].resolution = xmlDeviceNode.getElementsByTagName('resolution')[0].firstChild.nodeValue;
                dispositivo[i].density = xmlDeviceNode.getElementsByTagName('density')[0].firstChild.nodeValue;
                dispositivo[i].screen_size = xmlDeviceNode.getElementsByTagName('screen_size')[0].firstChild.nodeValue;
                dispositivo[i].ppi = xmlDeviceNode.getElementsByTagName('ppi')[0].firstChild.nodeValue;
                dispositivo[i].dpi = xmlDeviceNode.getElementsByTagName('dpi')[0].firstChild.nodeValue;
                dispositivo[i].css_pixel_ratio = xmlDeviceNode.getElementsByTagName('css_pixel_ratio')[0].firstChild.nodeValue;
                dispositivo[i].css_width = xmlDeviceNode.getElementsByTagName('css_width')[0].firstChild.nodeValue;
                dispositivo[i].aspect_ratio = xmlDeviceNode.getElementsByTagName('aspect_ratio')[0].firstChild.nodeValue;
                dispositivo[i].graphics_array = xmlDeviceNode.getElementsByTagName('graphics_array')[0].firstChild.nodeValue;
                dispositivo[i].os = xmlDeviceNode.getElementsByTagName('os')[0].firstChild.nodeValue;
                dispositivo[i].novo = xmlDeviceNode.getElementsByTagName('new')[0].firstChild.nodeValue;

                if (parseFloat(dispositivo[i].css_pixel_ratio) == 0.63 || parseFloat(dispositivo[i].css_pixel_ratio) == 0.75) {
                    dispositivo[i].css_width = parseFloat(dispositivo[i].resolution) * parseFloat(dispositivo[i].css_pixel_ratio);
                }
                else if (parseFloat(dispositivo[i].css_pixel_ratio) == 1.33 || parseFloat(dispositivo[i].css_pixel_ratio) == 3.5 || parseFloat(dispositivo[i].css_pixel_ratio) == 2.22) {
                    dispositivo[i].css_width = (parseFloat(dispositivo[i].resolution) / parseFloat(dispositivo[i].css_pixel_ratio)).toFixed(0);
                }
                else {
                    dispositivo[i].css_width = parseFloat(dispositivo[i].resolution) / parseFloat(dispositivo[i].css_pixel_ratio);
                }

                // Acessa os atributos
                //dispositivos[contador].categoria = xmlDeviceNode.attributes['categoria'].nodeValue;

                // Avança uma posição no array
                //i++;
            }

            mountTable(dispositivo);
        }

        xml = xmlLoader("meus_devices.xml");
        xmlParserDispositivosSimplificado(xml);
    </script>

</head>
<body>
    <div class="alert">Legenda: <span class="span-novo">ADICIONADO RECENTEMENTE</span> <span class="span-antigo">JÁ EXISTIAM</span></div>
</body>
</html>
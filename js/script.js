var meuTema = ['blue', 'dark', 'grey', 'metro-dark'];

function shuffle(array) {
    var cont = array.length, temp, index;

    while (cont > 0) {
        index = Math.floor(Math.random() * cont);
        cont--;

        temp = array[cont];
        array[cont] = array[index];
        array[index] = temp;
    }

    return array;
}

/* SHUFFLE THEME */
//shuffle(meuTema);

$(function () {
    $("#dispositivos").tablesorter({
        theme: meuTema[0],
        widgets: ['reorder', 'stickyHeaders', 'filter'],
        widgetOptions: {
            reorder_axis: 'x', // 'x' or 'xy'
            reorder_delay: 300,
            reorder_helperClass: 'tablesorter-reorder-helper',
            reorder_helperBar: 'tablesorter-reorder-helper-bar',
            reorder_noReorder: 'reorder-false',
            reorder_blocked: 'reorder-block-left reorder-block-end',
            reorder_complete: null // callback
        }
    });

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
        buffer = '';
        for (b = 0; b < dispositivo.length; b++) {
            if (dispositivo[b].novo === 'yes') {
                buffer += "<tr class=\"novo\">";
            } else if (dispositivo[b].novo === 'des') {
                buffer += "<tr class=\"descontinuado\">";
            } else if (dispositivo[b].novo === 'obs') {
                buffer += "<tr class=\"obsoleto\">";
            } else {
                buffer += "<tr>";
            }

            //buffer += "<tr>";
            buffer += "<td>" + dispositivo[b].nome + "</td>";
            buffer += "<td>" + dispositivo[b].resolution + "</td>";
            buffer += "<td>" + dispositivo[b].density + "</td>";
            buffer += "<td>" + dispositivo[b].screen_size + "</td>";
            buffer += "<td>" + dispositivo[b].ppi + "</td>";
            buffer += "<td>" + dispositivo[b].dpi + "</td>";
            buffer += "<td>" + dispositivo[b].css_pixel_ratio + "</td>";
            buffer += "<td>" + dispositivo[b].css_width + "</td>";
            buffer += "<td>" + dispositivo[b].aspect_ratio + "</td>";
            buffer += "<td>" + dispositivo[b].graphics_array + "</td>";
            buffer += "<td>" + dispositivo[b].os + "</td>";
            buffer += "</tr>";
        }

        buffer += "</table>";
        $('#dispositivos tbody').append(buffer);
        $("#dispositivos").trigger("update");
    }

    function Dispositivo() {
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
});

/* GOOGLE FONTS PT Sans */
(function() {
    var link_element = document.createElement("link"),
        s = document.getElementsByTagName("script")[0];
    if (window.location.protocol !== "http:" && window.location.protocol !== "https:") {
        link_element.href = "http:";
    }
    link_element.href += "//fonts.googleapis.com/css?family=PT+Sans:400italic,400,700italic,700";
    link_element.rel = "stylesheet";
    link_element.type = "text/css";
    s.parentNode.insertBefore(link_element, s);
})();

/* GOOGLE FONTS Open Sans */
(function() {
    var link_element = document.createElement("link"),
        s = document.getElementsByTagName("script")[0];
    if (window.location.protocol !== "http:" && window.location.protocol !== "https:") {
        link_element.href = "http:";
    }
    link_element.href += "//fonts.googleapis.com/css?family=Open+Sans:300italic,300,400italic,400,600italic,600,700italic,700,800italic,800";
    link_element.rel = "stylesheet";
    link_element.type = "text/css";
    s.parentNode.insertBefore(link_element, s);
})();
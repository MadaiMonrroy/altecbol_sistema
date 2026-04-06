<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <style>
    body{
      margin:0;
      padding:0;
      font-family: Arial, sans-serif;
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
    }

    /* Barras FULL width */
    .bar-top{
      width:100%;
      height:4px;
      background:#0050b0;
    }
    .bar-bottom{
      width:100%;
      height:16px;
      background:#0050b0;
    }

    /* Contenido centrado con padding lateral (NO afecta a las barras) */
    .content{
      width:100%;
      background:#fff;
      padding:8px 40px; /* margen interno como tu PDF */
      box-sizing:border-box;
      font-size:10px;
      color:#0f172a;
    }

    /* Layout en una sola línea */
    table{
      width:100%;
      border-collapse:collapse;
    }
    td{
      vertical-align:middle;
      white-space:nowrap;
    }

    /* Iconos */
    .ico{
      width:22px;
      height:16px;
      margin-right:4px;
      vertical-align:middle;
    }

    /* Separación entre bloques */
    .item{
      padding-right:18px;
    }

    /* Numeración arriba del footer (derecha) */
    .pagination{
    width:100%;
    text-align:center;
    font-size:11px;              
    color:#9e9e9e;               
  }
  .sep{
  margin: 0 2px;      /* 👈 separación horizontal */
  display: inline-block;
}

  </style>
</head>
<body>

  <!-- Numeración (opcional; si no la quieres, elimina este bloque) -->
  <div class="pagination">
    <span class="page"></span> <span class="sep">- </span><span class="sep"></span><span class="topage"></span>
  </div>

  <!-- Barra azul superior full width -->
  <div class="bar-top"></div>

  <!-- Contenido -->
  <div class="content">
    <table>
      <tr>
        <td class="item">
        <a > <!-- Reemplazar src cuando subas los iconos -->
          <img class="ico" src="file:///C:/xampp/htdocs/altecbol-sistema/public/images/wp.png" alt="">
          <strong>Whatsapp:</strong>&nbsp;https://wa.link/2708zz
          </a>
        </td>

        <td class="item" style="text-align:center;">
          <img class="ico" src="file:///C:/xampp/htdocs/altecbol-sistema/public/images/correo.png" alt="">
          <strong>correo:</strong>&nbsp;info@altecbol.com.bo
        </td>

        <td style="text-align:right;">
          <img class="ico" src="file:///C:/xampp/htdocs/altecbol-sistema/public/images/pw.png" alt="">
          <strong>Sitio web:</strong>&nbsp;www.altecbol.com.bo
        </td>
      </tr>
    </table>
  </div>

  <!-- Barra azul inferior full width -->
  <div class="bar-bottom"></div>

</body>
</html>
<script>
  (function(){
    var vars = {};
    var query = document.location.search.substring(1).split('&');
    for (var i=0; i<query.length; i++){
      var pair = query[i].split('=', 2);
      vars[pair[0]] = decodeURIComponent(pair[1]);
    }
    var els = document.getElementsByClassName('page');
    for (var j=0; j<els.length; j++) els[j].textContent = vars.page;
    var els2 = document.getElementsByClassName('topage');
    for (var k=0; k<els2.length; k++) els2[k].textContent = vars.topage;
  })();
</script>

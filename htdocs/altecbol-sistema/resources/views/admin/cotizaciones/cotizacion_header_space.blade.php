<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .header-bg {
            position: absolute;
            top: 5;
            left: 0;
            width: 100%;
            height: 196px;
            background-color: #0050b0;
            z-index: -2;
        }

        .header-cut {
            position: absolute;
            bottom: -80;
            margin-bottom: -50px;
            left: 0;
            width: 100%;
            height: 0;
            border-style: solid;
            border-width: 0 0 60px 100vw;
            border-color: transparent transparent #ffffff transparent;
        }

        .page-container {
            padding-top: 40px;
            padding-right: 40px;
            padding-left: 30px;
            padding-bottom: -50px;
            margin-bottom: -80px;
            position: relative;
        }

        .header-content {
            color: white;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            vertical-align: top;
        }

        .doc-title {
            font-family: 'Arial Black', sans-serif;
            font-size: 30px;
            text-transform: uppercase;
            text-align: right;
            color: #ffffff;
            margin: 0;
            line-height: 1;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .doc-number {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
            color: #01d3d1;
        }

        .company-name {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .company-details {
            font-size: 10px;
            color: #eaeaea;
            line-height: 1.4;
        }

        .doc-title-wrapper {
            /* Línea lateral en Turquesa #01d3d1 */
            border-right: 5px solid #01d3d1;
            padding-right: 1%;
            height: 50px;
        }
        .headerlogo{
            align-items: center;
            vertical-align: top;
        }
    </style>
</head>

<body>

    <div class="header-bg">
        <div class="header-cut"></div>
        
    </div>

    <div class="page-container">
        <div class="header-content">
            <table class="header-table">
                <tr>
                    <div class="headerlogo">
                    <td width="50%">
                        <img src="{{ public_path('images/logo-bn.png') }}"
                            style="height:150px; filter: brightness(0) invert(1);">

                    </td>
                    </div>
                    <td width="50%" align="right" valign="bottom" >
                        <div class="doc-title-wrapper">
                        <div class="doc-title">COTIZACIÓN</div>

                        <!-- AQUÍ VA EL NÚMERO -->
                        <div class="doc-number">
                            NRO. {{ str_pad($cotizacion->numero ?? '0', 5, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="company-name">SISTEMA DE VENTAS ALTECBOL</div>
                        <div class="company-details">
                            Oficina #146, Ciudad Comercio<br>
                            Santa Cruz - Bolivia<br>
                            Cel: +(591) 67880004
                        </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</body>

</html>

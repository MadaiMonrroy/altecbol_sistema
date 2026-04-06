<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Cotización #{{ $cotizacion->numero }}</title>
    <style>
        /* =========================================
           CONFIGURACIÓN COMPATIBLE WKHTMLTOPDF
           ========================================= */
        @page {
            margin: 0cm;
            size: letter;
        }

        /* Repite el encabezado en cada página */
        .items-table thead {
            display: table-header-group;
        }

        .items-table tr {
            page-break-inside: avoid;
        }

        /* FILA ESPACIADORA que se verá arriba en página 2+ */
        .items-table thead tr.thead-spacer th {
            height: 10mm;
            /* <-- aquí defines el “margen superior” desde pág 2 */
            padding: 0 !important;
            background: #fff !important;
            border: none !important;
        }

        /* Cancelamos el espaciador SOLO en la primera página:
   en la primera página sí puede “subir” porque hay contenido antes,
   en páginas 2+ ese margen negativo no cruza el salto y el espacio queda. */


        .totals-box {
            page-break-inside: avoid;
            break-inside: avoid;
            margin-top: 10px;
        }

        /* Espacio superior para bloques que caen en página nueva (footer) */
        .footer-break-spacer {
            height: 0;
        }





        body {
            font-family: 'Arial', sans-serif;
            font-size: 11px;
            color: #333;
            margin: 0;
            padding: 0;
            /* IMPORTANTE: Fuerza la impresión de colores de fondo */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        /* =========================================
           ENCABEZADO (DISEÑO GEOMÉTRICO AZUL)
           ========================================= */
        .header-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background-color: #0050b0;
            /* Azul Marca Directo */
            z-index: -2;
            overflow: hidden;
        }

        /* Diagonal Inferior Blanca (Corte) */
        .header-cut {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            border-style: solid;
            border-width: 0 0 60px 100vw;
            /* 100vw asegura el ancho completo */
            border-color: transparent transparent #ffffff transparent;
            z-index: 0;
        }

        /* Contenedor Principal */
        .page-container {
            padding-top: -50px;
            padding-right: 40px;
            padding-left: 40px;
            position: relative;
            padding-bottom: 50px;
            /* Espacio extra para la franja inferior */
        }

        /* =========================================
           SECCIÓN CLIENTE (TARJETA BLANCA)
           ========================================= */
        .client-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            padding: 20px;
            margin-bottom: -20px;
            border-top: 4px solid #01d3d1;
            /* Detalle Cian arriba */
            position: relative;
        }

        .info-label {
            font-size: 9px;
            text-transform: uppercase;
            color: #0050b0;
            font-weight: bold;
            margin-bottom: 3px;
            display: block;
        }

        .info-value {
            font-size: 12px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        /* =========================================
           TABLA DE ÍTEMS
           ========================================= */
        /* TABLA DE ÍTEMS */
        .items-table {
            width: 100%;
            border-collapse: collapse;

            margin-top: 0mm;
            /* igual al height del thead-spacer */
            margin-bottom: 5px;
        }


        .items-table th {
            background-color: #0050b0 !important;
            /* Azul forzado */
            color: #ffffff !important;
            padding: 10px 12px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            font-weight: bold;
            border: 1px solid #0050b0;
        }

        .items-table td {
            padding: 8px 12px;
            border: 1px solid #eaeaea;
            color: #333;
            vertical-align: middle;
        }

        .items-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        /* FILAS DE TOTALES (AZULES) */
        .row-blue td {
            background-color: #0050b0 !important;
            /* Fondo Azul */
            color: #ffffff !important;
            /* Texto Blanco */
            border: 1px solid #0050b0;
            font-weight: bold;
            text-align: right;
        }

        .row-blue .label-cell {
            text-align: right;
            padding-right: 15px;
            text-transform: uppercase;
            font-size: 13px;
            width: 5%;
        }

        .row-blue .value-cell {
            text-align: right;
            font-size: 12px;
            width: 15%;
        }

        /* =========================================
           PIE DE PÁGINA
           ========================================= */
        .footer-section {
            margin-top: 20px;
            padding-top: 4mm;
            page-break-inside: avoid;
            break-inside: avoid;
        }


        .footer-title {
            color: #0050b0;
            font-weight: bold;

            margin-bottom: 8px;
            border-bottom: 2px solid #01d3d1;

            font-size: 13px;
        }

        /* Caja Bancaria */
        .bank-box-container {
            background-color: #f0f8ff;
            /* Azul muy muy clarito */
            border: 1px solid #d0e6f5;
            padding: 15px;
            border-radius: 6px;
        }

        .qr-placeholder {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            background: #fff;
            padding: 3px;
        }

        .terms-list {
            margin: 0;
            padding-left: 15px;
            font-size: 10px;
            color: #555;
            line-height: 1.5;
        }

        /* Puntos Decorativos Verticales */
        .footer-dots {
            color: #01d3d1;
            font-size: 30px;
            line-height: 20px;
            font-weight: bold;
            text-align: center;
            padding-left: 0;
            vertical-align: bottom;
        }

        .obs-spacer {
            height: 10mm;
            /* el espacio que quieres arriba en página 2 */
        }

        .observaciones-box {
            page-break-inside: avoid;
            break-inside: avoid;
            margin-top: 4mm;
            /* cancela el spacer si queda en la misma página */
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <!-- FONDO ENCABEZADO (Shapes Sólidos) -->
    <div class="header-bg">
        <div class="header-cut"></div> <!-- Corte diagonal blanco -->
    </div>

    <!-- FRANJA AZUL INFERIOR (PIE DE PÁGINA DECORATIVO) -->
    <div class="footer-stripe"></div>

    <div class="page-container">

        {{-- <!-- 1. HEADER CONTENIDO -->
        <div class="header-content">
            <table class="header-table">
                <tr>
                    <td width="50%">
                        <!-- Logo con filtro blanco -->
                        <img src="{{ public_path('images/logo-bn.png') }}"
                            style="height: 150px; filter: brightness(0) invert(1);">
                       
                    </td>
                    <td width="50%" align="right" valign="bottom">
                        <div class="doc-title">COTIZACIÓN</div>
                        <div class="doc-number">NRO. {{ str_pad($cotizacion->numero, 5, '0', STR_PAD_LEFT) }}</div>
                         <div class="company-name">SISTEMA VENTAS ALTECBOL</div>
                        <div class="company-details">
                            Oficina #146, Ciudad Comercio<br>
                            Santa Cruz - Bolivia<br>
                            Tel: +(591) 67880004
                        </div>
                    </td>
                </tr>
            </table>
        </div> --}}

        <!-- 2. INFO CLIENTE (Tarjeta Blanca Flotante) -->
        <div class="client-card">
            <table width="100%">
                <tr>
                    <td width="60%" valign="top">
                        <span class="info-label">Cliente / Razón Social</span>
                        <span class="info-value" style="font-size: 14px;">{{ $cotizacion->razon_social }}</span>

                        <span class="info-label">NIT / CI</span>
                        <span class="info-value">{{ $cotizacion->nit ?? 'S/N' }}</span>

                        @if (!empty($cotizacion->direccion))
                            <span class="info-label">Dirección</span>
                            <span class="info-value" style="margin-bottom: 0;">{{ $cotizacion->direccion }}</span>
                        @endif
                    </td>
                    <td width="40%" valign="top">
                        <table width="100%">
                            <tr>
                                <td>
                                    <span class="info-label">Fecha</span>
                                    <span
                                        class="info-value">{{ \Carbon\Carbon::parse($cotizacion->fecha_emision)->format('d/m/Y') }}</span>
                                </td>
                                <td>
                                    <span class="info-label">Válido Hasta</span>
                                    <span
                                        class="info-value">{{ $cotizacion->fecha_vencimiento ? \Carbon\Carbon::parse($cotizacion->fecha_vencimiento)->format('d/m/Y') : '10 Días' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="info-label">Ejecutivo</span>
                                    <span class="info-value" style="margin-bottom: 0;">Moisés Martínez</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <!-- 3. TABLA DE ÍTEMS -->
        <table class="items-table">
            <thead>
                <tr class="thead-spacer">
                    <th colspan="5"></th>
                </tr>
                <tr>
                    <th width="8%" style="text-align: center;">ITEM</th>
                    <th width="50%">DESCRIPCIÓN</th>
                    <th width="12%" style="text-align: center;">CANT.</th>
                    <th width="15%" style="text-align: right;">P. UNIT.</th>
                    <th width="15%" style="text-align: right;">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $it)
                    <tr>
                        <td style="text-align: center; color: #777;">{{ $index + 1 }}</td>
                        <td>
                            <b>{{ $it->descripcion }}</b>
                            @if (!empty($it->detalles))
                                <br><small style="color: #666;">{{ $it->detalles }}</small>
                            @endif
                        </td>
                        <td style="text-align: center;">{{ number_format((float) $it->cantidad, 2, '.', '') }}</td>
                        <td style="text-align: right;">
                            {{ number_format((float) $it->precio_unitario_calculado, 2, '.', ',') }}</td>
                        <td style="text-align: right; font-weight: bold; color: #0050b0;">
                            {{ number_format((float) $it->subtotal_linea, 2, '.', ',') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <!-- FILAS DE TOTALES (AZULES) -->
                @if (isset($cotizacion->subtotal) && $cotizacion->subtotal > 0)
                    <tr class="row-blue">
                        <td colspan="3" style="border: none; line-height:2;"></td> <!-- Espacio blanco -->
                        <td class="label-cell">Subtotal</td>
                        <td class="value-cell">{{ number_format((float) $cotizacion->subtotal, 2, '.', ',') }}</td>
                    </tr>
                @endif

                @if (isset($cotizacion->descuento_total) && $cotizacion->descuento_total > 0)
                    <tr class="row-blue">
                        <td colspan="3" style="background: white; border: none;"></td>
                        <td class="label-cell">Descuento</td>
                        <td class="value-cell">- {{ number_format((float) $cotizacion->descuento_total, 2, '.', ',') }}
                        </td>
                    </tr>
                @endif

                <tr class="row-blue">
                    <td colspan="3" style="background-color: white !important; border: none;"></td>
                    <td class="label-cell" style="font-size: 12px; border-left: 1px solid #0050b0;">TOTAL BS.-</td>
                    <td class="value-cell" style="font-size: 14px;">
                        {{ number_format((float) $cotizacion->total, 2, '.', ',') }}</td>
                </tr>
            </tfoot>
        </table>


        <!-- Nota de Impuestos -->
        <div style="font-size: 10px; font-style: italic; color: #666; margin-bottom: 20px;">
            * La presente cotización incluye impuestos de ley.
        </div>

        @if (!empty($cotizacion->notas))
            <div class="obs-spacer"></div>
            <div class="observaciones-box"
                style="background: #fdfdfd; border: 1px dashed #ccc; padding: 10px; margin-bottom: 20px;">
                <b style="color: #0050b0; font-size: 10px;">OBSERVACIONES:</b><br>
                <span style="font-size: 10px; color: #555;">{!! nl2br(e($cotizacion->notas)) !!}</span>
            </div>
        @endif
        <div class="footer-break-spacer"></div>
        <!-- 4. PIE DE PÁGINA (CON PUNTOS DECORATIVOS) -->
        <div class="footer-section">
            <table width="100%">
                <tr>
                    <!-- Columna Izquierda: Información Bancaria -->
                    <td width="40%" valign="top">
                        <div class="footer-title">INFORMACIÓN BANCARIA</div>
                        <div class="bank-box-container">
                            <table width="100%">
                                <tr>
                                    <td width="90" valign="top">
                                        <img src="{{ public_path('images/qr.png') }}" class="qr-placeholder">
                                    </td>
                                    <td valign="top" style="padding-left: 10px;">
                                        <b style="color:#333;">Banco Unión</b><br>
                                        <span style="font-size: 10px;">Cta: 1-29038747</span><br>
                                        <br>
                                        <span style="font-size: 9px; color: #555;">Titular:</span><br>
                                        <b>Moisés Ángel Martinez Vega</b><br>
                                        <span style="font-size: 9px;">NIT: 7799750016</span><br>
                                        <span style="font-size: 9px;">CI: 7799750</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>

                    <td width="5%"></td>

                    <!-- Columna Derecha: Términos -->
                    <td width="45%" valign="top">
                        <div class="footer-title">TÉRMINOS Y CONDICIONES</div>
                        @php
                            $tcs = [];
                            if (!empty($cotizacion->terminos_condiciones_json)) {
                                $tcs = json_decode($cotizacion->terminos_condiciones_json, true) ?: [];
                            } else {
                                $tcs = [
                                    'Forma de pago: 80% por adelantado y 20% al finalizar.',
                                    'Tiempo de validez de la oferta: 10 días hábiles.',
                                    'Soporte técnico postventa: 1 mes después de la entrega.',
                                ];
                            }
                        @endphp
                        <ul class="terms-list">
                            @foreach ($tcs as $tc)
                                <li style="margin-bottom: 4px;">{{ $tc }}</li>
                            @endforeach
                        </ul>
                    </td>

                    <!-- Columna Decorativa: Puntos Verticales -->
                    <td width="1%" valign="bottom" align="center">
                        <div class="footer-dots">
                            &bull;<br>&bull;<br>&bull;<br>&bull;<br>&bull;
                        </div>
                    </td>
                    <td width="1%" valign="bottom" align="center">
                        <div class="footer-dots">
                            &bull;<br>&bull;<br>&bull;<br>&bull;<br>&bull;
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!-- Spacer para que si el footer cae en otra página, no inicie pegado arriba -->
        <div class="footer-break-spacer"></div>

    </div>

</body>

</html>

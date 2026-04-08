<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CotizacionController extends Controller
{
    public function index(Request $request)
{
    $q      = trim((string) $request->query('q', ''));
    $tipo   = trim((string) $request->query('tipo', ''));
    $estado = trim((string) $request->query('estado', ''));
    $moneda = trim((string) $request->query('moneda', ''));
    $desde  = trim((string) $request->query('desde', ''));
    $hasta  = trim((string) $request->query('hasta', ''));

    $query = DB::table('cotizaciones as c')
        ->join('clientes as cl', 'cl.id', '=', 'c.cliente_id')
        ->select([
            'c.id',
            'c.numero',
            'c.tipo',
            'c.estado',
            'c.moneda',
            'c.fecha_emision',
            'c.fecha_vencimiento',
            'c.total',
            'cl.razon_social',
            'cl.codigo_cliente',
        ]);

    // Buscador
    if ($q !== '') {
        $query->where(function ($w) use ($q) {
            $w->where('c.numero', 'like', "%{$q}%")
              ->orWhere('cl.razon_social', 'like', "%{$q}%")
              ->orWhere('cl.codigo_cliente', 'like', "%{$q}%");
        });
    }

    // Filtros exactos
    if ($tipo !== '')   $query->where('c.tipo', $tipo);
    if ($estado !== '') $query->where('c.estado', $estado);
    if ($moneda !== '') $query->where('c.moneda', $moneda);

    // Fechas (asumiendo que DB está YYYY-MM-DD)
    if ($desde !== '') $query->whereDate('c.fecha_emision', '>=', $this->toDate($desde));
    if ($hasta !== '') $query->whereDate('c.fecha_emision', '<=', $this->toDate($hasta));

    $cotizaciones = $query->orderByDesc('c.id')->get();

    return view('admin.cotizaciones.index', compact(
        'cotizaciones', 'q', 'tipo', 'estado', 'moneda', 'desde', 'hasta'
    ));
}
private function toDate(string $str): string
{
    $str = trim($str);
    if ($str === '') return $str;

    // ya viene OK
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $str)) {
        return $str;
    }

    // si viene con /
    if (str_contains($str, '/')) {
        $parts = explode('/', $str);
        if (count($parts) === 3) {
            [$a, $b, $y] = $parts;

            // Si el "mes" viene > 12, entonces es dd/mm/yyyy
            // Ej: 19/02/2026 => a=19 (día), b=02 (mes)
            if ((int)$b <= 12 && (int)$a > 12) {
                $d = $a; $m = $b;
            } else {
                // caso común del datepicker: mm/dd/yyyy
                $m = $a; $d = $b;
            }

            return sprintf('%04d-%02d-%02d', (int)$y, (int)$m, (int)$d);
        }
    }

    return $str; // fallback
}
    public function pdf($id)
    {
        $cotizacion = DB::table('cotizaciones as c')
            ->join('clientes as cl', 'cl.id', '=', 'c.cliente_id')
            ->select([
                'c.*',
                'cl.razon_social',
                'cl.codigo_cliente',
                'cl.nit',
                'cl.direccion',
                'c.sf_cf',
                'c.terminos_condiciones_json',
                'c.notas',
            ])
            ->where('c.id', $id)
            ->first();

        abort_if(!$cotizacion, 404);

        $items = DB::table('cotizacion_items')
            ->where('cotizacion_id', $id)
            ->orderBy('orden')
            ->get();

        // Render HTML desde una vista Blade (la creamos en el paso 3)
        $html = view('admin.cotizaciones.pdf', compact('cotizacion', 'items'))->render();

        $headerPath = storage_path('app/cotizacion_header.html');

file_put_contents(
    $headerPath,
    view('admin.cotizaciones.cotizacion_header_space', [
        'cotizacion' => $cotizacion
    ])->render()
);
$footerPath = storage_path('app/cotizacion_footer.html');

file_put_contents(
    $footerPath,
    view('admin.cotizaciones.cotizacion_footer_space')->render()
);

        // Config snappy
        $binary = env('WKHTMLTOPDF_BINARY', 'C:/PROGRA~1/wkhtmltopdf/bin/wkhtmltopdf.exe');

        /** @var \Knp\Snappy\Pdf $snappy */
        $snappy = app('snappy.pdf');
        $snappy->setBinary($binary);

       
    $content = $snappy->getOutputFromHtml($html, [
        'enable-local-file-access' => true,
        'encoding' => 'utf-8',
        'page-size' => 'Letter',

        // Si hay header, deja espacio suficiente
        'margin-top' => 40,      // sube a 30 para probar
        'margin-right' => 0,
        'margin-bottom' => 19,
        'margin-left' => 0,

        // AQUÍ va la RUTA del archivo, no el HTML
        'header-html' => $headerPath,
        'header-spacing' => 0,
        'header-line' => true,
        'footer-html' => $footerPath,
    'footer-spacing' => 5,
    ]);


        return response($content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="cotizacion-' . $cotizacion->numero . '.pdf"',

        ]);
        @unlink($headerFile);
    }


    public function create()
    {
        $clientes = DB::table('clientes')
            ->select(['id', 'razon_social', 'codigo_cliente', 'estado'])
            ->orderBy('razon_social')
            ->get();

        return view('admin.cotizaciones.create', compact('clientes'));
    }

    public function edit($id)
    {
        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();
        abort_if(!$cotizacion, 404);

        $items = DB::table('cotizacion_items')
            ->where('cotizacion_id', $id)
            ->orderBy('orden')
            ->get();

        $clientes = DB::table('clientes')
            ->select(['id', 'razon_social', 'codigo_cliente', 'estado'])
            ->orderBy('razon_social')
            ->get();

        return view('admin.cotizaciones.create', compact('cotizacion', 'items', 'clientes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero' => ['required', 'string', 'max:30'],
            'cliente_id' => ['required', 'integer'],
            'tipo' => ['required', 'in:prospecto,proyecto,mensual,anual,otro'],
            'contexto' => ['required', 'in:empresa,personal_dueno'],
            'estado' => ['required', 'in:borrador,enviada,aprobada,rechazada'],
            'sf_cf' => ['required', 'in:sf,cf,sf_def,cf_def'],

            'moneda' => ['required', 'in:BOB,USD'],
            'tipo_cambio_bob_por_usd' => ['nullable', 'numeric', 'min:0'],

            'fecha_emision' => ['required', 'date'],
            'fecha_vencimiento' => ['nullable', 'date'],

            //  ahora estos montos deben venir del form (no %)
            'subtotal' => ['required', 'numeric', 'min:0'],
            'descuento_total' => ['nullable', 'numeric', 'min:0', 'max:100'],

            'total' => ['required', 'numeric', 'min:0'],

            'tags_json' => ['nullable', 'array'],
            'tags_json.*' => ['string', 'max:50'],

            'terminos_condiciones_json' => ['nullable', 'array'],
            'terminos_condiciones_json.*' => ['string', 'max:255'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.descripcion' => ['required', 'string', 'max:255'],
            'items.*.unidad' => ['nullable', 'string', 'max:50'],
            'items.*.cantidad' => ['required', 'numeric', 'min:0.01'],
            'items.*.costo_unitario_base' => ['required', 'numeric', 'min:0'],

            //  lo que calculas en frontend y debe llegar
            'items.*.margen_ganancia_pct' => ['required', 'numeric', 'min:0'],
            'items.*.precio_unitario_calculado' => ['required', 'numeric', 'min:0'],
            'items.*.subtotal_linea' => ['required', 'numeric', 'min:0'],
        ]);

        if ($data['moneda'] === 'USD' && empty($data['tipo_cambio_bob_por_usd'])) {
            return back()->withErrors(['tipo_cambio_bob_por_usd' => 'Si la moneda es USD, debe ingresar el tipo de cambio.'])
                ->withInput();
        }

        $descuento = (float)($data['descuento_total'] ?? 0);

        DB::beginTransaction();
        try {
            $cotizacionId = DB::table('cotizaciones')->insertGetId([
                'numero' => $data['numero'],
                'cliente_id' => $data['cliente_id'],
                'tipo' => $data['tipo'],
                'contexto' => $data['contexto'],
                'estado' => $data['estado'],
                'sf_cf' => $data['sf_cf'],

                'tags_json' => json_encode($data['tags_json'] ?? []),
                'moneda' => $data['moneda'],
                'tipo_cambio_bob_por_usd' => $data['tipo_cambio_bob_por_usd'] ?? null,

                'fecha_emision' => $data['fecha_emision'],
                'fecha_vencimiento' => $data['fecha_vencimiento'] ?? null,

                'subtotal' => (float)$data['subtotal'],
                'descuento_total' => $descuento,
                'total' => (float)$data['total'],

                'terminos_condiciones_json' => json_encode($data['terminos_condiciones_json'] ?? []),
                'notas' => $request->input('notas'),

                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $orden = 0;
            foreach ($data['items'] as $it) {
                DB::table('cotizacion_items')->insert([
                    'cotizacion_id' => $cotizacionId,
                    'descripcion' => $it['descripcion'],
                    'unidad' => $it['unidad'] ?? null,
                    'cantidad' => (float)$it['cantidad'],
                    'costo_unitario_base' => (float)$it['costo_unitario_base'],
                    'margen_ganancia_pct' => (float)$it['margen_ganancia_pct'],

                    'precio_unitario_calculado' => (float)$it['precio_unitario_calculado'],
                    'subtotal_linea' => (float)$it['subtotal_linea'],

                    'orden' => $orden++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            DB::commit();

            return redirect()
                ->route('admin.cotizaciones.index')
                ->with('success', 'Cotización actualizada correctamente.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al guardar la cotización: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $cotizacion = DB::table('cotizaciones')->where('id', $id)->first();
        abort_if(!$cotizacion, 404);

        $data = $request->validate([
            'numero' => ['required', 'string', 'max:30'],
            'cliente_id' => ['required', 'integer'],
            'tipo' => ['required', 'in:prospecto,proyecto,mensual,anual,otro'],
            'contexto' => ['required', 'in:empresa,personal_dueno'],
            'estado' => ['required', 'in:borrador,enviada,aprobada,rechazada'],
            'sf_cf' => ['required', 'in:sf,cf,sf_def,cf_def'],

            'moneda' => ['required', 'in:BOB,USD'],
            'tipo_cambio_bob_por_usd' => ['nullable', 'numeric', 'min:0'],

            'fecha_emision' => ['required', 'date'],
            'fecha_vencimiento' => ['nullable', 'date'],

            'subtotal' => ['required', 'numeric', 'min:0'],
            'descuento_total' => ['nullable', 'numeric', 'min:0'],
            'total' => ['required', 'numeric', 'min:0'],

            'tags_json' => ['nullable', 'array'],
            'tags_json.*' => ['string', 'max:50'],

            'terminos_condiciones_json' => ['nullable', 'array'],
            'terminos_condiciones_json.*' => ['string', 'max:255'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.descripcion' => ['required', 'string', 'max:255'],
            'items.*.unidad' => ['nullable', 'string', 'max:50'],
            'items.*.cantidad' => ['required', 'numeric', 'min:0.01'],
            'items.*.costo_unitario_base' => ['required', 'numeric', 'min:0'],
            'items.*.margen_ganancia_pct' => ['required', 'numeric', 'min:0'],
            'items.*.precio_unitario_calculado' => ['required', 'numeric', 'min:0'],
            'items.*.subtotal_linea' => ['required', 'numeric', 'min:0'],
        ]);

        if ($data['moneda'] === 'USD' && empty($data['tipo_cambio_bob_por_usd'])) {
            return back()->withErrors(['tipo_cambio_bob_por_usd' => 'Si la moneda es USD, debe ingresar el tipo de cambio.'])
                ->withInput();
        }

        DB::beginTransaction();
        try {
            DB::table('cotizaciones')->where('id', $id)->update([
                'numero' => $data['numero'],
                'cliente_id' => $data['cliente_id'],
                'tipo' => $data['tipo'],
                'contexto' => $data['contexto'],
                'estado' => $data['estado'],
                'sf_cf' => $data['sf_cf'],

                'tags_json' => json_encode($data['tags_json'] ?? []),
                'moneda' => $data['moneda'],
                'tipo_cambio_bob_por_usd' => $data['tipo_cambio_bob_por_usd'] ?? null,

                'fecha_emision' => $data['fecha_emision'],
                'fecha_vencimiento' => $data['fecha_vencimiento'] ?? null,

                'subtotal' => (float)$data['subtotal'],
                'descuento_total' => (float)($data['descuento_total'] ?? 0),
                'total' => (float)$data['total'],

                'terminos_condiciones_json' => json_encode($data['terminos_condiciones_json'] ?? []),
                'notas' => $request->input('notas'),

                'updated_by' => Auth::id(),
                'updated_at' => now(),
            ]);

            DB::table('cotizacion_items')->where('cotizacion_id', $id)->delete();

            $orden = 0;
            foreach ($data['items'] as $it) {
                DB::table('cotizacion_items')->insert([
                    'cotizacion_id' => $id,
                    'descripcion' => $it['descripcion'],
                    'unidad' => $it['unidad'] ?? null,
                    'cantidad' => (float)$it['cantidad'],
                    'costo_unitario_base' => (float)$it['costo_unitario_base'],
                    'margen_ganancia_pct' => (float)$it['margen_ganancia_pct'],
                    'precio_unitario_calculado' => (float)$it['precio_unitario_calculado'],
                    'subtotal_linea' => (float)$it['subtotal_linea'],
                    'orden' => $orden++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            return redirect()
                ->route('admin.cotizaciones.index')
                ->with('success', 'Cotización guardada correctamente.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al actualizar: ' . $e->getMessage()])
                ->withInput();
        }
    }
}

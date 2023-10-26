<?php
private function getProducts()
{
    $products = session("products");
    if (!$products) {
        $products = [];
    }
    return $products;
}

private function emptyProducts()
{
    $this->saveProducts(null);
}

private function saveProducts($products)
{
    session(["products" => $products,
    ]);
}

public function cancelSales()
{
    $this->emptyProducts();
    return redirect()
        ->route("vendor.index")
        ->with("message", "Sales Cancelled");
}

public function quitarProductoDeVenta(Request $request)
{
    $indice = $request->post("index");
    $productos = $this->obtenerProductos();
    array_splice($productos, $indice, 1);
    $this->guardarProductos($productos);
    return redirect()
        ->route("vender.index");
}

public function agregarProductoVenta(Request $request)
{
    $code = $request->post("code");
    $producto = Producto::where("codigo_barras", "=", $codigo)->first();
    if (!$producto) {
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Producto no encontrado");
    }
    $this->agregarProductoACarrito($producto);
    return redirect()
        ->route("vender.index");
}

private function agregarProductoACarrito($producto)
{
    if ($producto->existencia <= 0) {
        return redirect()->route("vender.index")
            ->with([
                "mensaje" => "No hay existencias del producto",
                "tipo" => "danger"
            ]);
    }
    $productos = $this->obtenerProductos();
    $posibleIndice = $this->buscarIndiceDeProducto($producto->codigo_barras, $productos);
    // Es decir, producto no fue encontrado
    if ($posibleIndice === -1) {
        $producto->cantidad = 1;
        array_push($productos, $producto);
    } else {
        if ($productos[$posibleIndice]->cantidad + 1 > $producto->existencia) {
            return redirect()->route("vender.index")
                ->with([
                    "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                    "tipo" => "danger"
                ]);
        }
        $productos[$posibleIndice]->cantidad++;
    }
    $this->guardarProductos($productos);
}

private function buscarIndiceDeProducto(string $codigo, array &$productos)
{
    foreach ($productos as $indice => $producto) {
        if ($producto->codigo_barras === $codigo) {
            return $indice;
        }
    }
    return -1;
}
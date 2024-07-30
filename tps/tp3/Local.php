<?php

require_once 'Producto.php';
require_once 'ProductoRegional.php';
require_once 'ProductoImportado.php';
require_once 'Venta.php';

class Local {
    private $productosImportados = [];
    private $productosRegionales = [];
    private $ventas = [];

    public function incorporarProductoLocal($producto) {
        if ($producto instanceof ProductoImportado) {
            if (!isset($this->productosImportados[$producto->getCodigoBarra()])) {
                $this->productosImportados[$producto->getCodigoBarra()] = $producto;
                return true;
            }
        } elseif ($producto instanceof ProductoRegional) {
            if (!isset($this->productosRegionales[$producto->getCodigoBarra()])) {
                $this->productosRegionales[$producto->getCodigoBarra()] = $producto;
                return true;
            }
        }
        return false;
    }

    public function retornarImporteProducto($codigoBarra) {
        if (isset($this->productosImportados[$codigoBarra])) {
            return $this->productosImportados[$codigoBarra]->darPrecioVenta();
        } elseif (isset($this->productosRegionales[$codigoBarra])) {
            return $this->productosRegionales[$codigoBarra]->darPrecioVenta();
        }
        return 0;
    }

    public function retornarCostoProductoLocal() {
        $costoTotal = 0;
        foreach ($this->productosImportados as $producto) {
            $costoTotal += $producto->getPrecioCompra() * $producto->getStock();
        }
        foreach ($this->productosRegionales as $producto) {
            $costoTotal += $producto->getPrecioCompra() * $producto->getStock();
        }
        return $costoTotal;
    }

    public function productoMasEconomico($rubro) {
        $productos = array_merge($this->productosImportados, $this->productosRegionales);
        $productoEconomico = null;
        $precioMinimo = PHP_INT_MAX;

        foreach ($productos as $producto) {
            if ($producto->getRubro()->getDescripcion() == $rubro) {
                $precioVenta = $producto->darPrecioVenta();
                if ($precioVenta < $precioMinimo) {
                    $precioMinimo = $precioVenta;
                    $productoEconomico = $producto;
                }
            }
        }
        return $productoEconomico;
    }

    public function informarProductosMasVendidos($anio, $n) {
        $productosVendidos = [];
        foreach ($this->ventas as $venta) {
            if ($venta->getFecha()->format('Y') == $anio) {
                foreach ($venta->getProductos() as $producto) {
                    $codigoBarra = $producto->getCodigoBarra();
                    if (!isset($productosVendidos[$codigoBarra])) {
                        $productosVendidos[$codigoBarra] = 0;
                    }
                    $productosVendidos[$codigoBarra] += 1;
                }
            }
        }
        arsort($productosVendidos);
        return array_slice(array_keys($productosVendidos), 0, $n);
    }

    public function promedioVentasImportados() {
        $totalVentas = 0;
        $cantidadVentas = 0;
        foreach ($this->ventas as $venta) {
            foreach ($venta->getProductos() as $producto) {
                if ($producto instanceof ProductoImportado) {
                    $totalVentas += $producto->darPrecioVenta();
                    $cantidadVentas++;
                }
            }
        }
        return $cantidadVentas > 0 ? $totalVentas / $cantidadVentas : 0;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc) {
        $productosComprados = [];
        foreach ($this->ventas as $venta) {
            if ($venta->getCliente()->getTipoDoc() == $tipoDoc && $venta->getCliente()->getNumDoc() == $numDoc) {
                foreach ($venta->getProductos() as $producto) {
                    $productosComprados[] = $producto;
                }
            }
        }
        return $productosComprados;
    }
}
?>

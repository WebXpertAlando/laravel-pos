<?php

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setEmphasis(true);
    $printer->text("Sales Receipt\n");
    $printer->text($sale->created_at . "\n");
    $printer->text("https://parzibyte.me/blog\n");
    $printer->setEmphasis(false);
    $printer->text("\n===============================\n");
    $total = 0;
    foreach ($sale->products as $product) {
        $subtotal = $product->quantity * $product->price;
        $total += $subtotal;
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text(sprintf("%.2fx%s\n", $product->quantity, $product->description));
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text('Ksh' . number_format($subtotal, 2) . "\n");
    }
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->text("\n===============================\n");
    $printer->setJustification(Printer::JUSTIFY_RIGHT);
    $printer->setEmphasis(true);
    $printer->text("Total: $Ksh" . number_format($total, 2) . "\n");
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(1, 1);
    $printer->text("Thanks for Shopping with Us\n");
    $printer->text("https://parzibyte.me/blog");
    $printer->feed(5);
    $printer->close();
    return redirect()->back()->with("message", "Receipt Printed");
}


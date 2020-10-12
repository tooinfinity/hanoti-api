<?php

namespace app\Helpers;

class Helpers
{

/*////////////////////////////////////////////////////////////////////////////////////////*/
/*// Generate a SKU for Products                                                        //*/
/*////////////////////////////////////////////////////////////////////////////////////////*/
    public static function getSKUProduct($productName, $productId)
    {
        $sku_prefix = strtoupper(substr($productName, 0, 2));

        if ($productId <= 4) {
            $sku_product = $sku_prefix . (str_pad($productId, 4, '0', STR_PAD_LEFT));
        } else {
            $sku_product = $sku_prefix . $productId;
        }
        return $sku_product;
    }

/*////////////////////////////////////////////////////////////////////////////////////////*/
/*// Generate a c128 barcode number for Products                                                        //*/
/*////////////////////////////////////////////////////////////////////////////////////////*/
    public static function getBarcodeProduct($productName)
    {
        $barcode_prefix = strtoupper(substr($productName, 0, 2));
        $random_number = (floor(rand() * 1000) + 999);

        $barcode_product = $barcode_prefix . $random_number;

        return $barcode_product;

    }

/*////////////////////////////////////////////////////////////////////////////////////////*/
/*// Calculate cost price for Product                                                   //*/
/*////////////////////////////////////////////////////////////////////////////////////////*/
    public static function calculateCostPrice($oldPrice, $oldQuantity, $newPrice, $newQuantity)
    {
        $costPrice = (($oldPrice * $oldQuantity) + ($newPrice * $newQuantity)) / ($oldQuantity + $newQuantity);
        return $costPrice;
    }

}

<?php

include "../api.php";

    //Global Variables
     $URL = getURL();
     $key = getAuth();

 function getProducts()
 {
     global $URL, $key;
     $list_products = 'stores/plainsandprints/products?pretty=true';
     $URL = $URL.'/'.$list_products;
     $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-type'=>'application/json');
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL,$URL);
     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     $result=curl_exec ($ch);
     //echo curl_getinfo($ch).'<br/>';
     //echo curl_errno($ch).'<br/>';
     //echo curl_error($ch).'<br/>';
     print($result);
     curl_close ($ch);
 }

/*
 * Content-Type: application/json
{

  "apparent_quantity": 0,
  "attribute_set_id": "11",
  "catalog_product_ids": null,
  "description": "Test of Maxi Tan (Intern) at GaloreTV",
  "enable_googlecheckout": null,
  "entity_id": "909",
  "fabric": "114",
  "group_name": null,
  "msrp_display_actual_price_type": "4",
  "msrp_enabled": "2",
  "name": "Edit of Maxi",
  "options_container": "container2",
  "pp_color": "40",
  "pp_size": "15",
  "price": "0.0",
  "quantity": 0,
  "resource_type": "magento",
  "sku": null,
  "status": "1",
  "store_id": "plainsandprints",
  "tax_class_id": "2",
  "type_id": "simple",
  "url_key": null,
  "visibility": "0",
  "weight": "0.0000"
}
 */


 function putProducts()
 {
     global $URL, $key;
     $put_products = 'stores/plainsandprints/products/53a8e100696e643e3eeb0200';
     $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-type'=>'application/json');
     $values = array(
         'apparent_quantity'=>'0',
         'description'=>'Test of Maxi Tan (Intern) at GaloreTV',
         'group_name'=>null,
         'name'=>'Edit of Maxi',
         'price'=>'0.0',
         'quantity'=>'0',
         'sku'=>null,
         'status'=>'1',
         'weight'=>'0.0000'
     );
     $URL = $URL.'/'.$put_products;
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL,$URL);
     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
     curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $values);
     $result=curl_exec ($ch);
     echo curl_getinfo($ch).'<br/>';
     echo curl_errno($ch).'<br/>';
     echo curl_error($ch).'<br/>';
     print($result);
     curl_close ($ch);
 }

//RUNNING COMMANDS
putProducts();
?>
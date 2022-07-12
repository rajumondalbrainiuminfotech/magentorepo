<?php

$installer = $this;

$installer->startSetup();
/**
 * Settings fields
 */
$installer->getConnection()->addColumn($installer->getTable('eadesign/pdfgenerator'), 'pdft_attribute_set', array(
    'type' => Varien_Db_Ddl_Table::TYPE_SMALLINT,
    'unsigned' => true,
    'nullable' => false,
    'default' => '0',
    'comment' => 'Attribute'
));

$installer->run("
    
insert into {$this->getTable('eadesign/pdfgenerator')} 
    
(`pdftemplate_id`, `pdftemplate_name`, `pdftemplate_desc`, `pdftemplate_body`, `pdft_type`, `pdft_filename`, `pdftp_format`, `pdft_orientation`, `created_time`, `update_time`, `template_store_id`, `pdft_is_active`, `pdft_default`, `pdfth_header`, `pdftf_footer`, `pdft_css`, `pdftc_customchek`, `pdft_customwidth`, `pdft_customheight`, `pdftm_top`, `pdftm_bottom`, `pdftm_left`, `pdftm_right`, `pdft_attribute_set`) VALUES

(1, 'Invoice Template', 'The template for all stores.', '<table style=\"width: 100%;\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p><a href=\"http://www.eadesign.ro/\" title=\"Dezvoltare Magento\" class=\"logo\"><img src=\"http://www.eadesign.ro/skin/frontend/default/blank/images/logo.png\" alt=\"Dezvoltare Magento\"></a></p>\r\n<p><br />Ea Desing Stodio&nbsp;by Eco Active SRL&nbsp;<br />Addres:&nbsp;<strong>Calea Chisinaului Nr. 1</strong><br />City:&nbsp;<strong>Iasi</strong><br />Region:&nbsp;<strong>Iasi</strong><br />Email:<strong>&nbsp;office@eadesign.ro</strong><br /><strong></strong>Phone:&nbsp;<strong>0332-419.707</strong><br />Country:&nbsp;<strong>Romania</strong></p>\r\n</td>\r\n<td align=\"center\">\r\n<p>Invoice :&nbsp;{{var ea_invoice_id}}</p>\r\n<p>Status:&nbsp;{{var ea_invoice_status}}</p>\r\n<p>Date:&nbsp;{{var ea_invoice_date}}</p>\r\n<p>Customer Vat:&nbsp;{{var customer_taxvat}}</p>\r\n</td>\r\n<td align=\"right\">\r\n<p style=\"text-align: right;\">Billing:</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">{{var billing_address}}</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">Shipping:</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">{{var shipping_address}}</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">Billing and shipping information:</p>\r\n<p style=\"text-align: right;\">&nbsp;</p>\r\n<p style=\"text-align: right;\">{{var billing_method}}</p>\r\n<p style=\"text-align: right;\">{{var shipping_method}}</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 100%;\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\r\n<thead>\r\n<tr bgcolor=\"#c0c0c0\">\r\n<td>\r\n<p>Pos</p>\r\n</td>\r\n<td colspan=\"2\"><span>Product Name/SKU/Options</span></td>\r\n<td><span>Qty</span></td>\r\n<td>Price Inc/Exc</td>\r\n<td><span>Subtotal</span></td>\r\n<td>Discount</td>\r\n<td><span>Tax</span></td>\r\n<td>Manufacturer</td>\r\n<td colspan=\"2\">Image</td>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td colspan=\"11\">##productlist_start##</td>\r\n</tr>\r\n<tr>\r\n<td>{{var items_position}}</td>\r\n<td colspan=\"2\">\r\n<p class=\"redname\">{{var items_name}}</p>\r\n<p>{{var bundle_items_option}}</p>\r\n<p>{{var items_sku}}</p>\r\n<p>{{var product_options}}</p>\r\n</td>\r\n<td>\r\n<p>{{var items_qty}}</p>\r\n</td>\r\n<td>\r\n<p>{{var itemcarptice}}</p>\r\n<p>{{var itemcarpticeexcl}}</p>\r\n</td>\r\n<td>\r\n<p>{{var itemcarpticeicl}}</p>\r\n<p>{{var itemsubtotal}}</p>\r\n</td>\r\n<td>{{var items_discount}}</td>\r\n<td>\r\n<p><span>{{var items_tax}}</span></p>\r\n</td>\r\n<td>{{var manufacturer}}</td>\r\n<td colspan=\"2\">{{var productimage}}&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"11\">##productlist_end##</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Subtotal Including Tax</td>\r\n<td>{{var subtotalincludingtax}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Subtotal Excluding Tax</td>\r\n<td>{{var subtotalexcludingtax}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Shipping&nbsp;Including Tax</td>\r\n<td>{{var shipping_amountincltax}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Shipping&nbsp;Excluding Tax</td>\r\n<td>{{var shipping_amount}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Shipping Tax</td>\r\n<td>{{var shipping_tax}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Discount{{depend tax_tva}}</td>\r\n<td>{{var discountammount}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Tax VAT (Tax name)</td>\r\n<td>{{var tax_tva}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">{{/depend}}Total Tax</td>\r\n<td>{{var all_tax_ammount}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Grand total&nbsp;Including Tax</td>\r\n<td>{{var grandtotalincludingtax}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Grand total&nbsp;Excluding Tax</td>\r\n<td>{{var grandtotalexcludingtax}}</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"10\">Grand Tax</td>\r\n<td>{{var grandtotaltax}}&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'invoicepdftemplate', 'invoice {{var ea_invoice_id}} {{var ea_invoice_date}} {{var ea_invoice_status}} ', '0', 'portrait', '2013-05-13 08:22:18', '2013-05-14 06:48:07', 0, 1, 0, '<p>Dear customer&nbsp;{{var customer_name}}. Here is you inoice.</p>', '<p><span style=\"font-size: large;\"><strong>Page number {PAGENO}/{nbpg}.</strong> </span>Call us at 0800 454 454 at eny time!</p>', '.redname {\r\ncolor: red;\r\ntext-decoration: none;\r\n}', 0, 1.0000, 1.0000, 20.0000, 20.0000, 10.0000, 10.0000, 0),
(2, 'Product template', 'Product pdf.', '<p><span style=\"/font-size: large;\"/>{{var productname}}</span></p>\r\n<p><span style=\"/font-size: large;\"/>{{var productimageview}}</span></p>\r\n<p>Product SKU:&nbsp;{{var productsku}}</p>\r\n<p>&nbsp;</p>\r\n<p>Decription</p>\r\n<p>{{var productdescription}}</p>\r\n<p>Short description</p>\r\n<p>{{var productshortdescription}}</p>\r\n<p>Technical data</p>\r\n<p>{{var productviewattributes}}</p>\r\n<p>&nbsp;</p>\r\n<p>Link to the product:</p>\r\n<p>{{var producturl}}</p>', 'productpdftemplate', 'product-{{var productname}}-{{var productsku}}', '0', 'portrait', '2013-07-15 12:19:27', '2013-07-23 09:17:03', 0, 1, 0, '<p><span style=\"/font-size: 14px;\"/>Company information. Call us for details!</span></p>', '<p><span style=\"/font-size: large;\"/>Page {PAGENO}/{nbpg}</span></p>', '/* Data Table */\r\n.data-table { width:100%; border:1px solid #bebcb7; }\r\n.data-table .odd  { background:#f8f7f5 }\r\n.data-table .even { background:#eeeded; }\r\n/*.data-table tr.odd:hover,\r\n.data-table tr.even:hover { background:#ebf1f6; }*/\r\n.data-table td.last,\r\n.data-table th.last { border-right:0; }\r\n.data-table tr.last th,\r\n.data-table tr.last td { border-bottom:0 !important; }\r\n.data-table th { padding:3px 8px; font-weight:bold; }\r\n.data-table td { padding:3px 8px; }\r\n\r\n.data-table thead th { font-weight:bold; border-right:1px solid #c2d3e0; padding:2px 8px; color:#0a263c; white-space:nowrap; vertical-align:middle; }\r\n.data-table thead th.wrap { white-space:normal; }\r\n.data-table thead th a,\r\n.data-table thead th a:hover { color:#fff; }\r\n.data-table thead th { background:url(../images/bkg_th.gif) repeat-x 0 100% #d9e5ee; }\r\n.data-table thead th .tax-flag { font-size:11px; white-space:nowrap; }\r\n\r\n.data-table tfoot { border-bottom:1px solid #d9dde3; }\r\n.data-table tfoot tr.first td { background:url(../images/bkg_tfoot.gif) 0 0 repeat-x; }\r\n.data-table tfoot tr { background-color:#dee5e8 !important; }\r\n.data-table tfoot td { padding-top:1px; padding-bottom:1px; border-bottom:0; border-right:1px solid #d9dde3; }\r\n.data-table tfoot strong { font-size:16px; }\r\n\r\n.data-table tbody th,\r\n.data-table tbody td { border-bottom:1px solid #d9dde3; border-right:1px solid #d9dde3; }\r\n/* Bundle products tables */\r\n.data-table tbody.odd tr { background:#f8f7f5 !important; }\r\n.data-table tbody.even tr { background:#f6f6f6 !important; }\r\n.data-table tbody.odd tr td,\r\n.data-table tbody.even tr td { border-bottom:0; }\r\n.data-table tbody.odd tr.border td,\r\n.data-table tbody.even tr.border td { border-bottom:1px solid #d9dde3; }\r\n\r\n.data-table tbody td .option-label { font-weight:bold; font-style:italic; }\r\n.data-table tbody td .option-value { padding-left:10px; }', 0, 0.0000, 0.0000, 20.0000, 20.0000, 20.0000, 20.0000, 0);
    
");

$installer->endSetup();
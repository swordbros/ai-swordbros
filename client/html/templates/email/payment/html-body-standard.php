<?php



$enc = $this->encoder();



?>

<?php $this->block()->start( 'email/payment/html' ); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <title> <?= $enc->html( sprintf( $this->translate( 'client', 'Your order %1$s' ), $this->extOrderItem->getId() ), $enc::TRUST ); ?> </title>
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="date=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="x-apple-disable-message-reformatting" />
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet" />
    <!--<![endif]-->
    <title>Email Template</title>
    <!--[if gte mso 9]>
    <style type="text/css" media="all">
        sup { font-size: 100% !important; }
    </style>
    <![endif]-->
    <!-- body, html, table, thead, tbody, tr, td, div, a, span { font-family: Arial, sans-serif !important; } -->


    <style type="text/css" media="screen">
        body { padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none }
        a { color:#f3189e; text-decoration:none }
        p { padding:0 !important; margin:0 !important }
        img { margin: 0 !important; -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }

        a[x-apple-data-detectors] { color: inherit !important; text-decoration: inherit !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }

        .btn-16 a { display: block; padding: 15px 35px; text-decoration: none; }
        .btn-20 a { display: block; padding: 15px 35px; text-decoration: none; }

        .l-white a { color: #ffffff; }
        .l-black a { color: #282828; }
        .l-pink a { color: #f3189e; }
        .l-grey a { color: #6e6e6e; }
        .l-purple a { color: #9128df; }

        .gradient { background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }

        .btn-secondary { border-radius: 10px; background: linear-gradient(to right, #9028df 0%,#f3189e 100%); }


        /* Mobile styles */
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
            .mpx-10 { padding-left: 10px !important; padding-right: 10px !important; }

            .mpx-15 { padding-left: 15px !important; padding-right: 15px !important; }

            .mpb-15 { padding-bottom: 15px !important; }

            u + .body .gwfw { width:100% !important; width:100vw !important; }

            .td,
            .m-shell { width: 100% !important; min-width: 100% !important; }

            .mt-left { text-align: left !important; }
            .mt-center { text-align: center !important; }
            .mt-right { text-align: right !important; }

            .me-left { margin-right: auto !important; }
            .me-center { margin: 0 auto !important; }
            .me-right { margin-left: auto !important; }

            .mh-auto { height: auto !important; }
            .mw-auto { width: auto !important; }

            .fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

            .column,
            .column-top,
            .column-dir-top { float: left !important; width: 100% !important; display: block !important; }

            .m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }
            .m-block { display: block !important; }

            .mw-15 { width: 15px !important; }

            .mw-2p { width: 2% !important; }
            .mw-32p { width: 32% !important; }
            .mw-49p { width: 49% !important; }
            .mw-50p { width: 50% !important; }
            .mw-100p { width: 100% !important; }

            .mmt-0 { margin-top: 0 !important; }
        }

    </style>
</head>
<body class="body" style="padding:0 !important; margin:0 auto !important; display:block !important; min-width:100% !important; width:100% !important; background:#f4ecfa; -webkit-text-size-adjust:none;">
<center>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0; width: 100%; height: 100%;" bgcolor="#f4ecfa" class="gwfw">
        <tr>
            <td style="margin: 0; padding: 0; width: 100%; height: 100%;" align="center" valign="top">
                <table width="600" border="0" cellspacing="0" cellpadding="0" class="m-shell">
                    <tr>
                        <td class="td" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="mpx-10">
                                        <!-- Top -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="text-12 c-grey l-grey a-right py-20" style="font-size:12px; line-height:16px; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; color:#6e6e6e; text-align:right; padding-top: 20px; padding-bottom: 20px;">
                                                    <a href="#" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="text-decoration:none; color:#6e6e6e;">View this email in your browser</span></a>
                                                </td>
                                            </tr>
                                        </table>											<!-- END Top -->

                                        <!-- Container -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="gradient pt-10" style="border-radius: 10px 10px 0 0; padding-top: 10px;" bgcolor="#f3189e">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td style="border-radius: 10px 10px 0 0;" bgcolor="#ffffff">
                                                                <!-- Logo -->
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td class="img-center p-30 px-15" style="font-size:0pt; line-height:0pt; text-align:center; padding: 30px; padding-left: 15px; padding-right: 15px;">
                                                                            <a href="#" target="_blank">
                                                                                <img src="<?=url()->current();?>/fe/assets/images/palto-logo.png" alt="Header Logo" style="max-width: 200px; vertical-align: middle"><!--<img src="https://www.psd2newsletters.com/templates/purple/images/logo.png" width="112" height="43" border="0" alt="" />--></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- Logo -->

                                                                <!-- Main -->
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td class="px-50 mpx-15" style="padding-left: 50px; padding-right: 50px;">
                                                                            <!-- Section - Intro -->
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td class="pb-50" style="padding-bottom: 50px;">
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tr>
                                                                                                <td class="fluid-img img-center pb-50" style="font-size:0pt; line-height:0pt; text-align:center; padding-bottom: 50px;">
                                                                                                    <img src="https://www.psd2newsletters.com/templates/purple/images/img_intro_13.png" width="300" height="252" border="0" alt="" />
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="title-36 a-center pb-15" style="font-size:36px; line-height:40px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; text-align:center; padding-bottom: 15px;">
                                                                                                    <?= $enc->html( $this->get( 'emailIntro' ) ); ?>


                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-16 lh-26 a-center" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 26px; text-align:center;">
                                                                                                    <?= nl2br( $enc->html( $this->get( 'message' ), $enc::TRUST ) ); ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <!-- END Section - Intro -->

                                                                            <!-- Section - Order Details -->
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td class="pb-50" style="padding-bottom: 50px;">
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tr>
                                                                                                <td class="pb-30" style="padding-bottom: 30px;">
                                                                                                    <!-- Button -->
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <td class="btn-20 btn-secondary c-white l-white" bgcolor="#f3189e" style="font-size:16px; line-height:30px; mso-padding-alt:15px 35px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; min-width:auto !important; border-radius:20px; background:linear-gradient(to right, #9028df 0%,#f3189e 100%); color:#ffffff;">
                                                                                                                <a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
                                                                                                                    <span class="link c-white" style="text-decoration:none; color:#ffffff;">
                                                                                                                        <?= $enc->html( sprintf( $this->translate( 'client', 'Your order %1$s' ), $this->extOrderItem->getId() ), $enc::TRUST ); ?> </span>
                                                                                                                </a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                    <!-- END Button -->
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pb-30" style="padding-bottom: 30px;">
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                    <tr>
                                                                                                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                                                                                                            <div style="font-size: 20px ; line-height: 24px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; text-align: left ; min-width: auto ; padding-bottom: 10px">
                                                                                                                                <h3><?= $enc->html( $this->translate( 'client', 'Billing address' ), $enc::TRUST ); ?>
                                                                                                                                </h3> <?php foreach( $this->summaryBasket->getAddress( 'payment' ) as $addr ) : ?>
                                                                                                                                <div class="content" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 18px; padding-bottom: 15px;">

                                                                                                                                    <?= preg_replace( ["/\n+/m", '/ +/'], ['<br/>', ' '], trim( $enc->html( sprintf(

                                                                                                                                    /// Address format with company (%1$s), salutation (%2$s), title (%3$s), first name (%4$s), last name (%5$s),

                                                                                                                                    /// address part one (%6$s, e.g street), address part two (%7$s, e.g house number), address part three (%8$s, e.g additional information),

                                                                                                                                    /// postal/zip code (%9$s), city (%10$s), state (%11$s), country (%12$s), language (%13$s),

                                                                                                                                    /// e-mail (%14$s), phone (%15$s), facsimile/telefax (%16$s), web site (%17$s), vatid (%18$s)

                                                                                                                                        $this->translate( 'client', '%1$s

%2$s %3$s %4$s %5$s

%6$s %7$s

%8$s

%9$s %10$s

%11$s

%12$s

%13$s

%14$s

%15$s

%16$s

%17$s

%18$s

'

                                                                                                                                        ),

                                                                                                                                        $addr->getCompany(),

                                                                                                                                        $this->translate( 'mshop/code', $addr->getSalutation() ),

                                                                                                                                        $addr->getTitle(),

                                                                                                                                        $addr->getFirstName(),

                                                                                                                                        $addr->getLastName(),

                                                                                                                                        $addr->getAddress1(),

                                                                                                                                        $addr->getAddress2(),

                                                                                                                                        $addr->getAddress3(),

                                                                                                                                        $addr->getPostal(),

                                                                                                                                        $addr->getCity(),

                                                                                                                                        $addr->getState(),

                                                                                                                                        $this->translate( 'country', $addr->getCountryId() ),

                                                                                                                                        $this->translate( 'language', $addr->getLanguageId() ),

                                                                                                                                        $addr->getEmail(),

                                                                                                                                        $addr->getTelephone(),

                                                                                                                                        $addr->getTelefax(),

                                                                                                                                        $addr->getWebsite(),

                                                                                                                                        $addr->getVatID()

                                                                                                                                    ) ) ) ); ?> </div> <?php endforeach; ?> </div>

                                                                                                                        </td>
                                                                                                                    <tr><td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                                                                                                            <div style="font-size: 20px ; line-height: 24px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; text-align: left ; min-width: auto ; padding-bottom: 10px">
                                                                                                                                <h3><?= $enc->html( $this->translate( 'client', 'Delivery address' ), $enc::TRUST ); ?></h3>
                                                                                                                                <?php if( ( $addresses = $this->summaryBasket->getAddress( 'delivery' ) ) !== [] ) : ?>
                                                                                                                                <?php foreach( $addresses as $addr ) : ?> <div class="content" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 18px; padding-bottom: 15px;">
                                                                                                                                    <?= preg_replace( ["/\n+/m", '/ +/'], ['<br/>', ' '], trim( $enc->html( sprintf(

                                                                                                                                    /// Address format with company (%1$s), salutation (%2$s), title (%3$s), first name (%4$s), last name (%5$s),

                                                                                                                                    /// address part one (%6$s, e.g street), address part two (%7$s, e.g house number), address part three (%8$s, e.g additional information),

                                                                                                                                    /// postal/zip code (%9$s), city (%10$s), state (%11$s), country (%12$s), language (%13$s),

                                                                                                                                    /// e-mail (%14$s), phone (%15$s), facsimile/telefax (%16$s), web site (%17$s), vatid (%18$s)

                                                                                                                                        $this->translate( 'client', '%1$s

%2$s %3$s %4$s %5$s

%6$s %7$s

%8$s

%9$s %10$s

%11$s

%12$s

%13$s

%14$s

%15$s

%16$s

%17$s

%18$s

'

                                                                                                                                        ),

                                                                                                                                        $addr->getCompany(),

                                                                                                                                        $this->translate( 'mshop/code', $addr->getSalutation() ),

                                                                                                                                        $addr->getTitle(),

                                                                                                                                        $addr->getFirstName(),

                                                                                                                                        $addr->getLastName(),

                                                                                                                                        $addr->getAddress1(),

                                                                                                                                        $addr->getAddress2(),

                                                                                                                                        $addr->getAddress3(),

                                                                                                                                        $addr->getPostal(),

                                                                                                                                        $addr->getCity(),

                                                                                                                                        $addr->getState(),

                                                                                                                                        $this->translate( 'country', $addr->getCountryId() ),

                                                                                                                                        $this->translate( 'language', $addr->getLanguageId() ),

                                                                                                                                        $addr->getEmail(),



                                                                                                                                        $addr->getTelephone(),

                                                                                                                                        $addr->getTelefax(),

                                                                                                                                        $addr->getWebsite(),

                                                                                                                                        $addr->getVatID()

                                                                                                                                    ) ) ) ); ?> </div> <?php endforeach; ?> <?php else : ?>
                                                                                                                                <div class="content" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 18px; padding-bottom: 15px;">

                                                                                                                                    <?= $enc->html( $this->translate( 'client', 'like billing address' ), $enc::TRUST ); ?> </div> <?php endif; ?> </div></td></tr>

                                                                                                                </table>
                                                                                                            </th>
                                                                                                            <th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
                                                                                                            <th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                    <tr>
                                                                                                                        <td class="title-20 pb-10" style="font-size:20px; line-height:24px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; padding-bottom: 10px;">

                                                                                                                            <div class="common-summary common-summary-service" style="Margin:0px auto;max-width:600px;">
                                                                                                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                                                                                                                    <tbody>
                                                                                                                                    <tr>
                                                                                                                                        <td style="direction:ltr;font-size:0px;text-align:center;vertical-align:top;">
                                                                                                                                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                                                                                                                <tr>

                                                                                                                                                    <td class="item-outlook delivery-outlook" style="vertical-align:top;width:300px;" ><![endif]-->
                                                                                                                                            <div class="mj-column-per-50 outlook-group-fix item delivery" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                                                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                                                                                                                    <tr>
                                                                                                                                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                                                                                                                                            <div style="font-size: 20px ; line-height: 24px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; text-align: left ; min-width: auto ; padding-bottom: 10px">
                                                                                                                                                                <h3><?= $enc->html( $this->translate( 'client', 'delivery' ), $enc::TRUST ); ?></h3>
                                                                                                                                                                <?php foreach( $this->summaryBasket->getService( 'delivery' ) as $service ) : ?>
                                                                                                                                                                <div class="content" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 18px; padding-bottom: 15px;">
                                                                                                                                                                    <h4><?= $enc->html( $service->getName() ); ?></h4>
                                                                                                                                                                    <?php if( !( $attributes = $service->getAttributeItems() )->isEmpty() ) : ?>
                                                                                                                                                                    <ul class="attr-list"> <?php foreach( $attributes as $attribute ) : ?>
                                                                                                                                                                        <?php if( strpos( $attribute->getType(), 'hidden' ) === false ) : ?>
                                                                                                                                                                        <li class="<?= $enc->attr( 'delivery-' . $attribute->getCode() ); ?>">
                                                                                                                                                                            <span class="name"><?= $enc->html( $attribute->getName() ?: $this->translate( 'client/code', $attribute->getCode() ) ); ?>:</span>
                                                                                                                                                                            <?php switch( $attribute->getValue() ) : case 'array': case 'object': ?> <?php foreach( (array) $attribute->getValue() as $value ) : ?>
                                                                                                                                                                            <span class="value"><?= $enc->html( $value ); ?></span>
                                                                                                                                                                            <?php endforeach ?> <?php break; default: ?> <span class="value">
                                                                                                                                                                                <?= $enc->html( $attribute->getValue() ); ?></span> <?php endswitch; ?> </li>
                                                                                                                                                                        <?php endif; ?> <?php endforeach; ?> </ul> <?php endif; ?> </div>
                                                                                                                                                                <?php endforeach; ?>
                                                                                                                                                            </div>
                                                                                                                                                        </td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table>
                                                                                                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="common-summary-outlook common-summary-additional-outlook" style="width:600px;" width="600" >
                                                                                                                                <tr>
                                                                                                                                    <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->

                                                                                                                        </td>

                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pb-40" style="padding-bottom: 40px;">
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <td class="img" height="1" bgcolor="#ebebeb" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>


                                                                                            <?php

                                                                                            $detailTarget = $this->config( 'client/html/catalog/detail/url/target' );

                                                                                            $detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

                                                                                            $detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );

                                                                                            $detailConfig = $this->config( 'client/html/catalog/detail/url/config', ['absoluteUri' => 1] );
                                                                                            $totalQty = 0;



                                                                                            ?>

                                                                                            <?php foreach( $this->summaryBasket->getProducts() as $product ) : $totalQty += $product->getQuantity() ?>
                                                                                            <tr>
                                                                                                <td class="pb-30" style="padding-bottom: 30px;">
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                                <div class="fluid-img" style="font-size:0pt; line-height:0pt; text-align:left;">




                                                                                                                    <div class="image-single" data-pswp="{bgOpacity: 0.75, shareButtons: false}">


                                                                                                                        <?php if( ( $url = $product->getMediaUrl() ) != '' ) : ?>

                                                                                                                        <img class="detail" src="<?= $enc->attr( $this->content( $url ) ); ?>" />

                                                                                                                        <?php endif; ?>




                                                                                                                    </div>



                                                                                                                </div>
                                                                                                            </th>
                                                                                                            <th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
                                                                                                            <th class="column-top" valign="top" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                    <tr>
                                                                                                                        <td class="title-20 pb-10" style="font-size:20px; line-height:24px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; padding-bottom: 10px;">

                                                                                                                            <?php if( ( $status = $product->getStatus() ) >= 0 ) : $key = 'stat:' . $status ?>
                                                                                                                             <?= $enc->html( $this->translate( 'mshop/code', $key ) ); ?>
                                                                                                                            <?php endif; ?>



                                                                                                                            <?php $params = array_merge( $this->param(), ['d_name' => $product->getName(), 'd_prodid' => $product->getProductId(), 'd_pos' => ''] ); ?>
                                                                                                                            <a class="product-name" style="color: black; font-weight: 700;" href="<?= $enc->attr( $this->url( ( $product->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig ) ); ?>">
                                                                                                                                <?= $enc->html( $product->getName(), $enc::TRUST ); ?>
                                                                                                                            </a>


                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-16 lh-26 pb-15" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 18px; padding-bottom: 15px;">

                                                                                                                            <p class="code">
                                                                                                                                <span class="name"><?= $enc->html( $this->translate( 'client', 'Article no.' ), $enc::TRUST ); ?>: </span>
                                                                                                                                <span class="value"><?= $product->getProductCode(); ?></span>
                                                                                                                            </p>
                                                                                                                            <?php if( ( $desc = $product->getDescription() ) !== '' ) : ?>
                                                                                                                            <p class="product-description"><?= $enc->html( $desc ); ?></p>
                                                                                                                            <?php endif ?>
                                                                                                                            <?php foreach( $this->config( 'client/html/common/summary/detail/product/attribute/types', ['variant', 'config', 'custom'] ) as $attrType ) : ?>
                                                                                                                            <?php if( !( $attributes = $product->getAttributeItems( $attrType ) )->isEmpty() ) : ?>
                                                                                                                            <ul class="attr-list attr-type-<?= $enc->attr( $attrType ); ?>">
                                                                                                                                <?php foreach( $attributes as $attribute ) : ?>
                                                                                                                                <li class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ); ?>">
                                                                                                                                <span class="name">
                                                                                                                                    <?= $enc->html( $this->translate( 'client/code', $attribute->getCode() ) ); ?>:</span>
                                                                                                                                    <span class="value">
                                                                                                                                    <?php if( $attribute->getQuantity() > 1 ) : ?>
                                                                                                                                        <?= $enc->html( $attribute->getQuantity() ); ?>× <?php endif; ?>
                                                                                                                                        <?= $enc->html( $attrType !== 'custom' && $attribute->getName() ? $attribute->getName() : $attribute->getValue() ); ?> </span></li>
                                                                                                                                <?php endforeach; ?>
                                                                                                                            </ul>
                                                                                                                            <?php endif ?>
                                                                                                                            <?php endforeach; ?>
                                                                                                                            <?php if( $this->extOrderItem->getPaymentStatus() >= $this->config( 'client/html/common/summary/detail/download/payment-status', \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED )

                                                                                                                            && ( $attribute = $product->getAttributeItem( 'download', 'hidden' ) ) !== null ) : ?>
                                                                                                                            <ul class="attr-list attr-list-hidden">
                                                                                                                                <li class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ); ?>">
                                                                                                                                <span class="name">
                                                                                                                                    <?= $enc->html( $this->translate( 'client/code', $attribute->getCode() ) ); ?>
                                                                                                                                </span>
                                                                                                                                    <span class="value">
                                                                                                                                    <?php

                                                                                                                                        $dlTarget = $this->config( 'client/html/account/download/url/target' );

                                                                                                                                        $dlController = $this->config( 'client/html/account/download/url/controller', 'account' );

                                                                                                                                        $dlAction = $this->config( 'client/html/account/download/url/action', 'download' );

                                                                                                                                        $dlConfig = $this->config( 'client/html/account/download/url/config', ['absoluteUri' => 1] );

                                                                                                                                        ?>
                                                                                                                                        <a href="<?= $enc->attr( $this->url( $dlTarget, $dlController, $dlAction, ['dl_id' => $attribute->getId()], [], $dlConfig ) ); ?>">
                                                                                                                                            <?= $enc->html( $attribute->getName() ); ?>
                                                                                                                                        </a>
                                                                                                                                    </span>
                                                                                                                                </li>
                                                                                                                            </ul>
                                                                                                                            <?php endif; ?>
                                                                                                                            <?php if( ( $timeframe = $product->getTimeframe() ) !== '' ) : ?>
                                                                                                                            <p class="timeframe">
                                                                                                                                <span class="name"><?= $enc->html( $this->translate( 'client', 'Delivery within' ) ); ?>: </span>
                                                                                                                                <span class="value"><?= $enc->html( $timeframe ); ?></span>
                                                                                                                            </p>
                                                                                                                            <?php endif ?>

                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-16 lh-26 c-black" style="font-size:16px; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 26px; color:#282828;">
                                                                                                                            <strong><?= $enc->html( $this->translate( 'client', 'Qty:' ), $enc::TRUST ); ?></strong>  <?= $enc->html( $product->getQuantity() ); ?>
                                                                                                                            <br />
                                                                                                                            <strong><?= $enc->html( $this->translate( 'client', 'Price:' ), $enc::TRUST ); ?></strong>  <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $product->getPrice()->getValue() * $product->getQuantity(), $product->getPrice()->getPrecision() ), $this->translate( 'currency', $product->getPrice()->getCurrencyId() ) ) ); ?>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <?php endforeach; ?>

                                                                                            <tr>
                                                                                                <td class="pt-10 pb-40" style="padding-top: 10px; padding-bottom: 40px;">
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <td class="img" height="1" bgcolor="#ebebeb" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pb-30" style="padding-bottom: 30px;">
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <th class="column-top" valign="top" width="230" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                    <tr>

                                                                                                                        <td class="title-20 pb-10" style="font-size: 18px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; min-width: auto ; line-height: 30px ;    text-align: left;">
                                                                                                                            <strong><?= $enc->html( $this->translate( 'client', 'payment' ), $enc::TRUST ); ?></strong>



                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-16" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
                                                                                                                            <?php foreach( $this->summaryBasket->getService( 'payment' ) as $service ) : ?>
                                                                                                                            <div class="content" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
                                                                                                                                <?= $enc->html( $service->getName() ); ?>
                                                                                                                                <?php /*?>  <?php if( !( $attributes = $service->getAttributeItems() )->isEmpty() ) : ?>
                                                                                                                                <ul class="attr-list"> <?php foreach( $attributes as $attribute ) : ?>
                                                                                                                                    <?php if( strpos( $attribute->getType(), 'hidden' ) === false ) : ?>
                                                                                                                                    <li class="<?= $enc->attr( 'payment-' . $attribute->getCode() ); ?>">
                                                                                                                                        <span class="name"><?= $enc->html( $attribute->getName() ?: $this->translate( 'client/code', $attribute->getCode() ) ); ?>:</span>
                                                                                                                                        <?php switch( $attribute->getValue() ) : case 'array': case 'object': ?>
                                                                                                                                        <?php foreach( (array) $attribute->getValue() as $value ) : ?>
                                                                                                                                        <span class="value"><?= $enc->html( $value ); ?></span> <?php endforeach ?> <?php break; default: ?>
                                                                                                                                        <span class="value"><?= $enc->html( $attribute->getValue() ); ?></span> <?php endswitch; ?> </li> <?php endif; ?> <?php endforeach; ?>
                                                                                                                                </ul>
                                                                                                                                    <?php endif; ?>  <?php */?>
                                                                                                                            </div> <?php endforeach; ?> </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td class="text-16" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">

                                                                                                                            <div class="common-summary common-summary-additional" style="Margin:0px auto;max-width:600px;">
                                                                                                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                                                                                                                    <tbody>
                                                                                                                                    <tr>
                                                                                                                                        <td style="direction:ltr;font-size:0px;text-align:center;vertical-align:top;">
                                                                                                                                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                                                                                                                                <tr><td class="item-outlook coupon-outlook" style="vertical-align:top;width:200px;" >
                                                                                                                                            <![endif]--><div class="mj-column-per-33 outlook-group-fix item coupon" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tr><td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                                                                                                                                            <div  style="font-size: 20px ; line-height: 24px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; text-align: left ; min-width: auto ; padding-bottom: 10px">
                                                                                                                                                                <strong><?= $enc->html( $this->translate( 'client', 'Coupon codes' ), $enc::TRUST ); ?></strong>
                                                                                                                                                                <div class="content" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;"> <?php if( !( $coupons = $this->summaryBasket->getCoupons() )->isEmpty() ) : ?>
                                                                                                                                                                    <ul class="attr-list"> <?php foreach( $coupons as $code => $products ) : ?>
                                                                                                                                                                        <li class="attr-item"><?= $enc->html( $code ); ?></li> <?php endforeach; ?> </ul> <?php endif; ?> </div></div></td></tr></table></div><!--[if mso | IE]></td>
                                                                                                                                            <?php /*?><td class="item-outlook customerref-outlook" style="vertical-align:top;width:200px;" ><![endif]-->
                                                                                                                                            <div class="mj-column-per-33 outlook-group-fix item customerref" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                                                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                                                                                                                    <tr>
                                                                                                                                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                                                                                                                                            <div style="font-size: 20px ; line-height: 24px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; text-align: left ; min-width: auto ; padding-bottom: 10px">
                                                                                                                                                                <strong><?= $enc->html( $this->translate( 'client', 'Your reference' ), $enc::TRUST ); ?></strong>
                                                                                                                                                                <div class="content" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;">
                                                                                                                                                                    <?= $enc->attr( $this->summaryBasket->getCustomerReference() ); ?>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </td>
                                                                                                                                                    </tr>
                                                                                                                                                </table>
                                                                                                                                            </div><!--[if mso | IE]>
                                                                                                                                            </td><?php */?>
                                                                                                                                            <td class="item-outlook comment-outlook" style="vertical-align:top;width:200px;" ><![endif]-->
                                                                                                                                            <div class="mj-column-per-33 outlook-group-fix item comment" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                                                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                                                                                                                    <tr><td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                                                                                                                                            <div style="font-size: 20px ; line-height: 24px ; color: #282828 ; font-family:'PT Sans', Arial, sans-serif; text-align: left ; min-width: auto ; padding-bottom: 10px">
                                                                                                                                                                <strong><?= $enc->html( $this->translate( 'client', 'Your comment' ), $enc::TRUST ); ?></strong>
                                                                                                                                                                <div class="content" style="font-size:16px; line-height:20px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important;"> <?= $enc->html( $this->summaryBasket->getComment() ); ?> </div></div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div>


                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                            <th class="column-top mpb-15" valign="top" width="30" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;"></th>
                                                                                                            <th class="column-top" valign="top" width="230" style="width: 300px;font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                                    <tr>
                                                                                                                        <td align="right" class="pb-15" style="padding-bottom: 15px;">
                                                                                                                            <table border="0" cellspacing="0" cellpadding="0" class="mw-100p">
                                                                                                                                <tr>


                                                                                                                                <?php if( $this->summaryBasket->getPrice()->getTaxFlag() === false ) : ?>
                                                                                                                                <tr class="footer total"><td class="status"></td>
                                                                                                                                    <td class="label"><?= $enc->html( $this->translate( 'client', 'Total' ) ); ?></td>
                                                                                                                                    <td class="quantity"><?= $enc->html( $totalQty ); ?></td>
                                                                                                                                    <td class="price">
                                                                                                                                        <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts() + $this->summaryBasket->getPrice()->getTaxValue(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                <?php endif; ?>
                                                                                                                                <?php if( $this->summaryBasket->getPrice()->getRebate() > 0 ) : ?>
                                                                                                                                <tr class="footer rebate"><td class="status"></td>
                                                                                                                                    <td class="label"><?= $enc->html( $this->translate( 'client', 'Included rebates' ) ); ?></td>
                                                                                                                                    <td class="quantity"></td><td class="price"><?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $this->summaryBasket->getPrice()->getRebate(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                <?php endif; ?>
                                                                                                                                <td class="title-20 lh-30 a-right mt-left mw-auto" width="100" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
                                                                                                                                    <?php foreach( $this->summaryBasket->getService( 'delivery' ) as $service ) : ?>
                                                                                                                                    <?php if( $service->getPrice()->getValue() > 0 ) : $priceItem = $service->getPrice(); ?>
                                                                                                                                    <tr class="body delivery"><td class="status"></td>
                                                                                                                                        <td class="label">
                                                                                                                                            <?= $enc->html( $service->getName() ); ?></td>
                                                                                                                                        <td class="quantity">1</td>
                                                                                                                                        <td class="price">
                                                                                                                                            <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $this->translate( 'currency', $priceItem->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                    <?php foreach( $this->summaryBasket->getService( 'payment' ) as $service ) : ?>
                                                                                                                                    <?php if( $service->getPrice()->getValue() > 0 ) : $priceItem = $service->getPrice(); ?>
                                                                                                                                    <tr class="body payment"><td class="status"></td><td class="label"><?= $enc->html( $service->getName() ); ?></td>
                                                                                                                                        <td class="quantity">1</td>
                                                                                                                                        <td class="price"><?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $this->translate( 'currency', $priceItem->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php endforeach; ?>
                                                                                                                                    <?php if( $this->summaryBasket->getPrice()->getCosts() > 0 ) : ?>
                                                                                                                                    <tr class="footer subtotal">
                                                                                                                                        <td class="label" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
                                                                                                                                            <?= $enc->html( $this->translate( 'client', 'Sub-total' ) ); ?></td>
                                                                                                                                        <td class="quantity"></td>
                                                                                                                                        <td class="price" style="font-size:19px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;"><?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $this->summaryBasket->getPrice()->getValue(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php if( ( $costs = $this->get( 'summaryCostsDelivery', 0 ) ) > 0 ) : ?>
                                                                                                                                    <tr class="footer delivery">
                                                                                                                                        <td class="label" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
                                                                                                                                            <?= $enc->html( $this->translate( 'client', '+ Shipping' ) ); ?></td>
                                                                                                                                        <td class="quantity"></td><td class="price" style="font-size:19px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
                                                                                                                                            <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $costs, $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php if( ( $costs = $this->get( 'summaryCostsPayment', 0 ) ) > 0 ) : ?>
                                                                                                                                    <tr class="footer payment"><td class="status"></td>
                                                                                                                                        <td class="label">
                                                                                                                                            <?= $enc->html( $this->translate( 'client', '+ Payment costs' ) ); ?></td>
                                                                                                                                        <td class="quantity"></td>
                                                                                                                                        <td class="price">
                                                                                                                                            <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $costs, $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?></td></tr>
                                                                                                                                    <?php endif; ?>
                                                                                                                                    <?php if( $this->summaryBasket->getPrice()->getTaxFlag() === true ) : ?>
                                                                                                                                    <tr class="footer total">
                                                                                                                                        <td class="title-20 lh-30 a-right mt-left" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
                                                                                                                                            <strong><?= $enc->html( $this->translate( 'client', 'Total' ) ); ?></strong>
                                                                                                                                        </td>
                                                                                                                                        <td class="img mw-15" width="20" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                                                                                        <td class="title-20 lh-30 mt-right" style="font-size:19px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
                                                                                                                                            <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?>
                                                                                                                                        </td>
                                                                                                                                    </tr>



                                                                                                                                    <?php endif; ?>
                                                                                                                                </td>

                                                                                                                                <!--<tr>
                                                                                                                                    <td class="title-20 lh-30 a-right mt-left" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
                                                                                                                                        <strong>Shipping:</strong>
                                                                                                                                    </td>
                                                                                                                                    <td class="img mw-15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                                                                                    <td class="title-20 lh-30 mt-right" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
                                                                                                                                        $0.00
                                                                                                                                    </td>
                                                                                                                                </tr>-->
                                                                                                                                <tr>
                                                                                                                                <?php foreach( $this->get( 'summaryNamedTaxes', [] ) as $taxName => $map ) : ?>
                                                                                                                                <?php foreach( $map as $taxRate => $priceItem ) : ?>
                                                                                                                                <?php if( ( $taxValue = $priceItem->getTaxValue() ) > 0 ) : ?>
                                                                                                                                <tr class="footer tax">
                                                                                                                                    <td class="title-20 lh-30 a-right mt-left" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 30px; text-align:right;">
                                                                                                                                        <strong><?= $enc->html( $this->translate( 'client', 'tax' ), $enc::TRUST ); ?></strong>
                                                                                                                                    </td>

                                                                                                                                    <td class="img mw-15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                                                                                    <td class="title-20 lh-30 mt-right" style="font-size:20px; color:#282828; font-family:'PT Sans', Arial, sans-serif; text-align:left; min-width:auto !important; line-height: 30px;">
                                                                                                                                        <?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $taxValue, $priceItem->getPrecision() ), $this->translate( 'currency', $priceItem->getCurrencyId() ) ) ); ?>
                                                                                                                                    </td>


                                                                                                                                </tr>
                                                                                                                                <?php endif; ?>
                                                                                                                                <?php endforeach; ?>
                                                                                                                                <?php endforeach; ?>


                                                                                                                                </tr>
                                                                                                                            </table>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                    <tr>
                                                                                                                        <td align="right">
                                                                                                                            <!-- Button -->
                                                                                                                            <table border="0" cellspacing="0" cellpadding="0" class="mw-100p" style="min-width: 200px;">
                                                                                                                                <tr>
                                                                                                                                    <td class="btn-20 btn-secondary c-white l-white" bgcolor="#f3189e" style="font-size:20px; line-height:30px; mso-padding-alt:15px 35px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; min-width:auto !important; border-radius:20px; background:linear-gradient(to right, #9028df 0%,#f3189e 100%); color:#ffffff;">
                                                                                                                                        <a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
                                                                                                                                            <span class="link c-white" style="   font-size: medium;text-decoration:none; color:#ffffff;"><?= $enc->html( $this->translate( 'client', 'TOTAL:' ), $enc::TRUST ); ?><?= $enc->html( sprintf( $this->get( 'priceFormat' ), $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ); ?>
                                                                                                                                            </span>
                                                                                                                                        </a>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </table>
                                                                                                                            <!-- END Button -->
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pb-30" style="padding-bottom: 30px;">
                                                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                        <tr>
                                                                                                            <td class="img" height="1" bgcolor="#ebebeb" style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-16 lh-26 a-center pb-25" style="font-size:16px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 26px; text-align:center; padding-bottom: 25px;">
                                                                                                    <div style="font-size: 16px ; color: #6e6e6e ; font-family:'PT Sans', Arial, sans-serif;  min-width: auto ; line-height: 26px ; text-align: center ; padding-bottom: 10px">
                                                                                                        <?= $enc->html( nl2br( $this->translate( 'client', 'If you have any questions, please reply to this e-mail' ) ), $enc::TRUST ); ?> </div>
                                                                                                    <div style="font-size: 16px ; color: #6e6e6e ; font-family:'PT Sans', Arial, sans-serif;  min-width: auto ; line-height: 26px ; text-align: center ; padding-bottom: 25px">
                                                                                                        <?= nl2br( $enc->html( $this->translate( 'client', 'All orders are subject to our terms and conditions.' ), $enc::TRUST ) ); ?> </div>


                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center">
                                                                                                    <!-- Button -->
                                                                                                    <table border="0" cellspacing="0" cellpadding="0" style="min-width: 200px;">
                                                                                                        <tr>
                                                                                                            <td class="btn-16 c-white l-white" bgcolor="#f3189e" style="font-size:16px; line-height:40px; mso-padding-alt:15px 35px;     padding: 5px; font-family:'PT Sans', Arial, sans-serif; text-align:center; font-weight:bold; text-transform:uppercase; border-radius:25px; min-width:auto !important; color:#ffffff;">
                                                                                                                <a href="#" target="_blank" class="link c-white" style="display: block; padding: 15px 35px; text-decoration:none; color:#ffffff;">
                                                                                                                    <span class="link c-white" style="text-decoration:none; color:#ffffff;"> <?= nl2br( $enc->html( $this->translate( 'client', 'VIEW MY ORDER' ), $enc::TRUST ) ); ?> </span>
                                                                                                                </a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                    <!-- END Button -->
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <!-- END Section - Order Details -->
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Main -->
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Container -->

                                        <!-- Footer -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="p-50 mpx-15" bgcolor="#949196" style="border-radius: 0 0 10px 10px; padding: 50px;">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" class="pb-20" style="padding-bottom: 20px;">
                                                        
                                                            <!-- Socials
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_facebook.png" width="34" height="34" border="0" alt="" /></a>
                                                                        </td>
                                                                        <td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                        <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_instagram.png" width="34" height="34" border="0" alt="" /></a>
                                                                        </td>
                                                                        <td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                        <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_twitter.png" width="34" height="34" border="0" alt="" /></a>
                                                                        </td>
                                                                        <td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                        <td class="img" width="34" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/ico_pinterest.png" width="34" height="34" border="0" alt="" /></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>-->
                                                                <!-- END Socials -->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-14 lh-24 a-center c-white l-white pb-20" style="font-size:14px; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 24px; text-align:center; color:#ffffff; padding-bottom: 20px;">
                                                                Address name St. 12, City Name, State, Country Name
                                                                <br />
                                                                <a href="tel:+17384796719" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">(738) 479-6719</span></a> - <a href="tel:+13697181973" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">(369) 718-1973</span></a>
                                                                <br />
                                                                <a href="mailto:info@website.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">info@website.com</span></a> - <a href="www.website.com" target="_blank" class="link c-white" style="text-decoration:none; color:#ffffff;"><span class="link c-white" style="text-decoration:none; color:#ffffff;">www.website.com</span></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <!-- Download App -->
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td class="img" width="117" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/btn_appstore.png" width="117" height="40" border="0" alt="" /></a>
                                                                        </td>
                                                                        <td class="img" width="15" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
                                                                        <td class="img" width="117" style="font-size:0pt; line-height:0pt; text-align:left;">
                                                                            <a href="#" target="_blank"><img src="https://www.psd2newsletters.com/templates/purple/images/btn_gplay.png" width="117" height="40" border="0" alt="" /></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Download App -->
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>											<!-- END Footer -->

                                        <!-- Bottom -->
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="text-12 lh-22 a-center c-grey- l-grey py-20" style="font-size:12px; color:#6e6e6e; font-family:'PT Sans', Arial, sans-serif; min-width:auto !important; line-height: 22px; text-align:center; padding-top: 20px; padding-bottom: 20px;">
                                                    <a href="#" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">UNSUBSCRIBE</span></a> &nbsp;|&nbsp; <a href="#" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">WEB VERSION</span></a> &nbsp;|&nbsp; <a href="#" target="_blank" class="link c-grey" style="text-decoration:none; color:#6e6e6e;"><span class="link c-grey" style="white-space: nowrap; text-decoration:none; color:#6e6e6e;">SEND TO A FRIEND</span></a>
                                                </td>
                                            </tr>
                                        </table>											<!-- END Bottom -->
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>

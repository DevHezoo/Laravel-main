<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>


<title>#Invoice By {{ $infos['seo']['seo_meta_title'] }}</title>

 <!-- meta character set -->
    <meta charset="utf-8">
     <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ (!empty($seo->meta_icon)) ? asset('frontend/upload/website/'.$seo->meta_icon) : asset('frontend/upload/no_image.jpg') }}">
    <!-- Author Meta -->
    <meta name="author" content="{{ $infos['seo']['seo_meta_author'] }}">
    <!-- Meta Description -->
    <meta name="description" content="{{ $infos['seo']['seo_meta_description'] }}">
    <!-- Meta Keyword -->
    <meta name="keywords" content="{{ $infos['seo']['seo_meta_keyword'] }}">
    <meta name="csrf-token" charset="utf-8" content="{{ csrf_token() }}">


  <link rel="stylesheet" href="{{ asset('frontend/assets/css/extra/style.css') }}">

	</head>
	<body>
	<div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1 tm_type1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_top_head tm_mb15 tm_align_center">
            <div class="tm_invoice_left">
              <div class="tm_logo"><h2>{{ $infos['seo']['seo_meta_title'] }}</h2></div>
            </div>
            <div class="tm_invoice_right tm_text_right tm_mobile_hide">
              <div class="tm_f50 tm_text_uppercase tm_white_color">Invoice #{{ $infos['order']['id'] }}</div>

            </div>
            <div class="tm_shape_bg tm_accent_bg tm_mobile_hide"></div>
          </div>
          <div class="tm_invoice_info tm_mb25">
            <div class="tm_card_note tm_mobile_hide"><b class="tm_primary_color">Invoice No<br></b>{{ $infos['order']['Property_Invoice_ID'] }}</div>
            <div class="tm_invoice_info_list tm_white_color">
              <p class="tm_invoice_number tm_m0">Payment: <b>{{ $infos['property']['property_payment'] }}</b></p>
              <p class="tm_invoice_date tm_m0">Date: <b>{{ $infos['order']['created_at'] }}</b></p>
            </div>
            <div class="tm_invoice_seperator tm_accent_bg"></div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice Info</b></p>
              <p>
                {{ $infos['seo']['seo_meta_author'] }}<br>
                {{ $infos['seo']['seo_meta_address'] }}<br>
                {{ $infos['seo']['seo_meta_email'] }}
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To</b></p>
              <p>
                {{ $infos['user']['user_name'] }}<br>
                {{ $infos['user']['user_email'] }}<br>
                {{ $infos['order']['Check_In'] }} / {{ $infos['order']['Check_Out'] }}
				<br>
        {{ $infos['order']['Identity_Number'] }}<br>
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1">
            <div class="">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr class="tm_accent_bg">
                      <th class="tm_width_3 tm_semi_bold tm_white_color">Name</th>
                      <th class="tm_width_1 tm_semi_bold tm_white_color">ID</th>
                      <th class="tm_width_3 tm_semi_bold tm_white_color">Description</th>
                      <th class="tm_width_1 tm_semi_bold tm_white_color">Price</th>
                      <th class="tm_width_1 tm_semi_bold tm_white_color">Qty</th>
                      <th class="tm_width_2 tm_semi_bold tm_white_color tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
				  
                    <tr>
                      <td class="tm_width_3">1. {{ $infos['property']['property_slug'] }}</td>
					  <td class="tm_width_1">{{ $infos['property']['property_id'] }}</td>
                      
                      <td class="tm_width_4">{{ $infos['property']['property_short_desc'] }}</td>
                      <td class="tm_width_2">${{ $infos['property']['property_price'] }}</td>
                      <td class="tm_width_1">1</td>
                      <td class="tm_width_2 tm_text_right">${{ $infos['property']['property_price'] }}</td>
                    </tr>
             
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_border_top tm_mb15 tm_m0_md">
              <div class="tm_left_footer">
                <p class="tm_mb2"><b class="tm_primary_color">Payment info:</b></p>
                <p class="tm_m0">Security Token : {{ $infos['order']['Invoice_Code'] }}<br>Amount: ${{ $infos['property']['property_price'] }}</p>
              </div>
              <div class="tm_right_footer">
                <table class="tm_mb15">
                  <tbody>
                    <tr class="tm_gray_bg ">
                      <td class="tm_width_3 tm_primary_color tm_bold">Subtoal</td>
                      <td class="tm_width_3 tm_primary_color tm_bold tm_text_right">${{ $infos['property']['property_price'] }}</td>
                    </tr>
                    <tr class="tm_gray_bg">
                      <td class="tm_width_3 tm_primary_color">Tax <span class="tm_ternary_color">(0%)</span></td>
                      <td class="tm_width_3 tm_primary_color tm_text_right">+$0</td>
                    </tr>
                    <tr class="tm_accent_bg">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color">Grand Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_white_color tm_text_right">${{ $infos['property']['property_price'] }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tm_invoice_footer tm_type1">
              <div class="tm_left_footer"></div>
              <div class="tm_right_footer">
                <div class="tm_sign tm_text_center">
                  <img src="{{ asset('frontend/assets/images/sign.svg') }}" alt="Sign">
                  <p class="tm_m0 tm_ternary_color">{{ $infos['seo']['seo_meta_author'] }}</p>
                  <p class="tm_m0 tm_f16 tm_primary_color">Manager</p>
                </div>
              </div>
            </div>
          </div>
          <div class="tm_note tm_text_center tm_font_style_normal">
            <hr class="tm_mb15">
            <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <p class="tm_m0">Copyright © 2023 <a href="{{ url($infos['seo']['seo_meta_website']) }}" target="_blank">{{ $infos['seo']['seo_meta_title'] }}</a>. All rights reserved.</p>
			
          </div><!-- .tm_note -->
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
      </div>
    </div>
  </div>
  
  <script src="{{ asset('frontend/assets/js/extra/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/extra/jspdf.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/js/extra/html2canvas.min.js') }}"></script>
  
   </body>
</html>

<script>
  $('#tm_download_btn').on('click', function () {
    var downloadSection = $('.tm_container');

    html2canvas(downloadSection[0], { useCORS: false, allowTaint: true }).then(function (canvas) {
      // Set the desired quality (0.0 to 1.0) to reduce file size
      var quality = 0.7;

      // Calculate dimensions
      var cWidth = downloadSection.width();
      var cHeight = downloadSection.height();
      var topLeftMargin = 0;
      var pdfWidth = cWidth + topLeftMargin * 2;
      var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
      var canvasImageWidth = cWidth;
      var canvasImageHeight = cHeight;
      var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;

      // Convert canvas to data URL with reduced quality
      var imgData = canvas.toDataURL('image/png', quality);

      // Create PDF instance
      var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);

      // Add first page
      pdf.addImage(
        imgData,
        'PNG',
        topLeftMargin,
        topLeftMargin,
        canvasImageWidth,
        canvasImageHeight
      );

      // Add remaining pages
      for (var i = 1; i <= totalPDFPages; i++) {
        pdf.addPage(pdfWidth, pdfHeight);
        pdf.addImage(
          imgData,
          'PNG',
          topLeftMargin,
          -(pdfHeight * i) + topLeftMargin * 0,
          canvasImageWidth,
          canvasImageHeight
        );
      }

      // Save the PDF with a specified name
      pdf.save('download.pdf');
    });
  });
</script>

	</body>
</html>

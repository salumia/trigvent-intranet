<!DOCTYPE html>
<html>
<head>
    <title>silowise</title>
    <meta charset="utf-8">		
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="background-image:url(assets/images/bg.png);" width="100%">
<table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale" >
    <tr>
        <td height="30" style="font-size: 1px">&nbsp;</td>
    </tr>
</table>
<!-- Intro -->
<table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale-90"
                style=" width="620">
                <tr>
                    <td height="50" style="font-size: 1px">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale" width="780">
                            <tr>
                                <td align="center" style="font-family: helvetica;font-style: normal;font-weight: bold;font-size: 36px;line-height: 48px;color: #111F43;">
                                    Request For Leave</td>
                            </tr>
                            <tr>
                               <td height="5" style="font-size: 1px">&nbsp;</td>
                            </tr>
                            
                            <tr>
                               <td height="5" style="font-size: 1px">&nbsp;</td>
                            </tr>
                           
                            <!-- <tr>
                                <td height="60" style="font-size: 1px">&nbsp;</td>
                            </tr> -->
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20" style="font-size: 1px">&nbsp;</td>
    </tr>
</table>
<!-- Header -->
<table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale" style="" width="100%">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0"  class="w3l-scale-90" width="600"style="background: #FFFFFF;border: 1px dashed #D5D5D5;border-radius: 10px;">
                <tr>
                    <td align="center">
                        <table align="center" border="0" cellpadding="10" cellspacing="10" class="w3l-scale" width="560" >
                            <tr>
                                <td height="5" style="font-size: 1px">&nbsp;</td>
                            </tr>
                            <tr style="background: #F5F5F5;border: 1px solid #DCDCDC;border-radius: 10px;">
                                <td  height="50" width="170" style="font-style: normal;font-weight:bold;font-size: 24px;line-height: 32px;color: #1B55EA;border-right: 1px solid #DCDCDC;">Employee name</td>
                                <td  height="50" style="font-style: normal;font-weight: normal;font-size: 24px;line-height: 32px;color: #111f43;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} &nbsp; ({{ Auth::user()->official_email_address }})</td>
                            </tr>
                            <tr>
                                <td height="10" style="font-size: 1px">&nbsp;</td>
                            </tr>
                            <tr style="background: #F5F5F5;border: 1px solid #DCDCDC;border-radius: 10px;">
                                <td  height="50" width="170" style="font-style: normal;font-weight:bold;font-size: 24px;line-height: 32px;color: #1B55EA;border-right: 1px solid #DCDCDC;">Department</td>
                                <td  height="50" style="font-style: normal;font-weight: normal;font-size: 24px;line-height: 32px;color: #111f43;">{{$department->department_name}}</td>
                            </tr>
                            <tr>
                                <td height="10" style="font-size: 1px">&nbsp;</td>
                            </tr>
                            <tr style="background: #F5F5F5;border: 1px solid #DCDCDC;border-radius: 10px;">
                                <td  height="50" width="170" style="font-style: normal;font-weight:bold;font-size: 24px;line-height: 32px;color: #1B55EA;border-right: 1px solid #DCDCDC;">Leave date</td>
                                <td  height="50" style="font-style: normal;font-weight: normal;font-size: 24px;line-height: 32px;color: #111f43;">From:{{ $from}} &nbsp; to:{{$todate}} ({{$no_of_days}})days</td>
                            </tr>
                            <tr>
                                <td height="10" style="font-size: 1px">&nbsp;</td>
                            </tr>
                            <tr style="background: #F5F5F5;border: 1px solid #DCDCDC;border-radius: 10px;">
                                <td  height="50" width="170" style="font-style: normal;font-weight:bold;font-size: 24px;line-height: 32px;color: #1B55EA;border-right: 1px solid #DCDCDC;">Reason</td>
                                <td  height="50" style="font-style: normal;font-weight: normal;font-size: 24px;line-height: 32px;color: #111f43;">{{ $reason }}</td>
                            </tr>
                             <tr>
                                <td height="4" style="font-size: 1px">&nbsp;</td>
                            </tr>
                
                             <tr>
                                <td height="1" style="font-size: 1px">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale-90"
                style=" width="620">
                <tr>
                    <td height="50" style="font-size: 1px">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="w3l-scale" width="780">
                            <tr>
                                <td align="center" style="font-family: helvetica;font-style: normal;font-weight: bold;font-size: 36px;line-height: 48px;color: #111F43;">
                                  <p><a href="https://intranet.trigvent.com/">click Here</a> for Approve/Reject requested mail</p> 
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: helvetica;font-style: normal;font-weight: bold;font-size: 36px;line-height: 48px;color: #111F43;">
                                  <p>Trigvent Solutions</p> 
                                </td>
                            </tr>
                            <tr>
                               <td height="5" style="font-size: 1px">&nbsp;</td>
                            </tr>
                            
                            <tr>
                               <td height="5" style="font-size: 1px">&nbsp;</td>
                            </tr>
                           
                            <!-- <tr>
                                <td height="60" style="font-size: 1px">&nbsp;</td>
                            </tr> -->
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20" style="font-size: 1px">&nbsp;</td>
    </tr>
</table>
{{-- <table align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
        <td width="100%" valign="top" align="center">
            <table class="email-container email-wrap-bottom" role="presentation" style="margin:0px auto;" width="1230px" cellspacing="0" cellpadding="0" border="0" align="center">
                <!--start grid -->
                <tbody><tr>
                    <td class="bg_dark email-w3l-section" valign="middle">

                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                <td class="copy-gd" style="text-align:center;" width="100%" valign="center">
                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                        <tr>
                                         <td height="150" style="font-size: 1px">&nbsp;</td>
                                    </tr>
                                        {{-- <tr>
                                            <td style="text-align:cneter;">
                                                <p style="font-style: normal;font-weight: normal;font-size: 24px;line-height: 40px;text-align: center;color: #111F43;width:80%;margin:0 auto;">Copyright © 2021 Intranet. By using this site or any part of SiloWise, you’re agreeing to our <a href="#" style="color: #1B55EA;text-decoration:none;">Terms of Service</a> and <a href="#" style="color: #1B55EA;text-decoration:none;">Privacy Policy </a></p>
                                                  
                                            </td>
                                        </tr> --}}
                                        {{-- <tr>
                                         <td height="5" style="font-size: 1px">&nbsp;</td>
                                        </tr>

                                    </tbody></table>

                                </td>

                            </tr>

                        </tbody></table>

                       
                </td></tr>
            </tbody></table>

        </td>
    </tr>
</tbody></table> --}} 

    
     <script src="assets/js/jquery-3.4.1.min.js"></script> 
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
      <script src="assets/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/jquery.js"></script>
    <script src="assets/dist/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>	
</body>
</html>  
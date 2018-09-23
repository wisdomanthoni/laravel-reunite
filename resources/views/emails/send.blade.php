<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
</head>
<body style="background-color: #eee">
    <style>
        
        *{
            font-family: 'Open Sans';
            color: #000;
        }
    </style>
    <div style="padding: 43px 53px; background-color: white; width:632px; margin:auto">
        <img src="https://firebasestorage.googleapis.com/v0/b/trend-76131.appspot.com/o/images%2Flogo.png?alt=media&token=f117f29b-1b56-4f6a-abd6-3deb0e4d7b64" alt="" style="width:115px; height: 115px;">
        <h2 style="line-height:29px; font-size: 18px; color: black !important;">
            Dear {{$firstname}}
        </h2>
        <p style="max-width: 418px; line-height:23px; font-size: 12px; color: #000;">
            This your ticket confirmation for GDG Devfest
            South-South Nigeria 2018
        </p>
        <h3 style="line-height:23px; font-size: 15px; color: #000;">
            Your Ticket
        </h3>
        <p style="line-height:23px; font-size: 12px; color: #000;">
            1 x {{$type}}
        </p>

        <div style="background-color: #F5F5F5; padding: 50px 35px; margin:auto;">
            <h4 style="font-size: 12px;">
                Order Information
            </h4>
            <p style="line-height:23px; font-size: 12px;">Order Id: {{$id}}</p>
            <table style="width:500px;" cellspacing="0">
                <tbody>
                    <tr>
                        <th style="text-align:left; border-bottom: solid #52555A 1px" >Type:</th>
                        <th style="text-align:right; border-bottom: solid #52555A 1px">Cost:</th>
                    </tr>
                    <tr>
                        <td style="text-align:left; padding-top:10px">{{$type}}</td>
                        <td style="text-align:right; padding-top:10px">N{{$amount}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <center>
            <p style="width: 430px; font-size: 10px; color: #52555A;">
               If you are not happy with your order you can cancel your ticket, send a mail to hello@devfesss.tech with reasons.
            </p>
        </center>
        <!-- <button style="background-color: #F76F67; border: none; line-height: 29px; font-weight: bold; font-size:25px; color: white; width:100%; height:57px;">
            CANCEL TICKET
        </button> -->
        <!-- <center>
            <p style="width:430px; color: #1481C5; font-size: 10px">Note: The deadline to request refunds is November 1st, 2018.
                After this date,
                all sales are final.
            </p>
        </center> -->
        <div style="margin-bottom: -20px; color: #000;">
            <p style="font-size: 12px">Best Regards</p>
            <h3 style="line-height:23px; font-size: 18px;">Devfest South-South Team</h3>
        </div>
    </div>
    
</body>
</html>
<!DOCTYPE html>
<html>

<body style='background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: "Helvetica Neue", "Segoe UI", Helvetica, Arial, sans-serif;'>
    <div style="max-width: 600px; margin: 10px auto 20px; font-size: 12px; color: #a5a5a5; text-align: center;">
        If you are unable to see this message, <a href="#" style="color: #a5a5a5; text-decoration: underline;">click here to view in browser</a>
    </div>
    <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0, 0, 0, 0.05);">
        <table style="width: 100%;">
            <tr>
                <td style="background-color: #fff;"><img alt="" src="img/logo.png" style="width: 70px; padding: 20px;" /></td>
                <!-- <td style="padding-left: 50px; text-align: right; padding-right: 20px;">
                    <a href="#" style="color: #261d1d; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">Sign In</a>
                    <a href="#" style="color: #7c2121; text-decoration: underline; font-size: 14px; margin-left: 20px; letter-spacing: 1px;">Forgot Password</a>
                </td> -->
            </tr>
        </table>
        <img alt="" src="img/email-header-img.jpg" style="max-width: 100%; height: auto;" />
        <div style="padding: 60px 70px;">
            <h2 style="margin-top: 0px;">Thanks for your order, {{ $data['name'] }}!</h2>
            <div style="color: #636363; font-size: 14px;">
                <!-- {{ $data['message'] }} -->
                Dear {{ $data['name'] }}, <br> Thank you for using book counterfeit! 
                Your order <strong> {{ $data['order'] }} </strong> has been successfully confirmed. 
                Your order should be processed and ready to be shipped within 24-48 hours. 
                Below is your order confirmation.
                Please keep a copy for your records.
            </div>
            <a href="http://localhost:8000/order/list/{{ $data['from'] }}" target="_blank" style="padding: 5px 15px; background-color: #4b72fa; color: #fff; font-weight: bolder; font-size: 14px; display: inline-block; margin: 20px 0px; margin-right: 20px; text-decoration: none;">View Order Details</a>
            <table style="margin-top: 30px; width: 100%;">
                <tr>
                    <td style="padding-right: 30px;">
                        <div style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; font-weight: bold; color: #b8b8b8; margin-bottom: 5px;">Order {{ $data['order'] }}</div>
                        <div style="font-size: 12px; color: #111; font-weight: bold; margin-bottom: 20px;">{{ $data['createdAt'] }}</div>
                        <div style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; font-weight: bold; color: #b8b8b8; margin-bottom: 5px;">Shipping To:</div>
                        <div style="font-size: 12px; color: #111; font-weight: bold;">
                            {{ $data['destinationAddress'] }}
                        </div>
                    </td>
                    <td style="max-width: 150px;">
                        <div style="background-color: #fffae9; padding: 20px; font-size: 12px;">
                            <h4 style="margin: 0px 0px 10px;">Any Questions?</h4>
                            <div style="color: #aaa;">You can contact us through <a href="#" style="text-decoration: underline; color: #4b72fa;">info@bc.com</a></div>
                        </div>
                    </td>
                </tr>
            </table>
            <table style="margin-top: 40px; width: 100%;">
                <tr>
                    <td style="text-transform: uppercase; letter-spacing: 1px; color: #b8b8b8; font-size: 10px; font-weight: bold;">Item</td>
                    <td style="text-transform: uppercase; letter-spacing: 1px; color: #b8b8b8; font-size: 10px; font-weight: bold; text-align: right;">Amount</td>
                </tr>
                <tr>
                    <td style="padding: 15px 0px; border-bottom: 1px solid rgba(0, 0, 0, 0.05);">
                        <div style="color: #111; font-size: 14px; font-weight: bold;">Number of Books Ordered</div>
                        <div style="color: #b8b8b8; font-size: 12px;">Extended license included</div>
                    </td>
                    <td style="padding: 15px 0px; text-align: right; font-size: 14px; font-weight: bold; color: #111; border-bottom: 1px solid rgba(0, 0, 0, 0.05);">{{ $data['quantity'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 15px 0px;">
                        <div style="color: #111; font-size: 14px; font-weight: bold;">Unit Price of the ordered book</div>
                        <div style="color: #b8b8b8; font-size: 12px;">Complete set with ebook version</div>
                    </td>
                    <td style="padding: 15px 0px; text-align: right; font-size: 14px; font-weight: bold; color: #111;">{{ $data['unitPrice'] }}</td>
                </tr>
            </table>
            <table style="margin-left: auto; margin-top: 0px; border-top: 3px solid #eee; padding-top: 10px; margin-bottom: 20px;">
                <tr>
                    <td style="color: #b8b8b8; font-size: 12px; padding: 5px 0px;">Total:</td>
                    <td style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">Ksh. {{ $data['total'] }}</td>
                </tr>
                <!-- <tr>
                    <td style="color: #b8b8b8; font-size: 12px; padding: 5px 0px;">Tax:</td>
                    <td style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">$12.83</td>
                </tr>
                <tr>
                    <td style="color: #b8b8b8; font-size: 12px; padding: 5px 0px;">Shipping</td>
                    <td style="color: #111; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">$0.00</td>
                </tr>
                <tr>
                    <td style="color: #b8b8b8; font-size: 12px; padding: 5px 0px;">Discount</td>
                    <td style="color: #45bb4c; text-align: right; font-weight: bold; padding: 5px 0px 5px 40px; font-size: 12px;">- $14.99</td>
                </tr> -->
                <tr>
                    <td style="color: #111; letter-spacing: 1px; font-size: 20px; padding: 10px 0px; text-transform: uppercase; font-weight: bold;">Total</td>
                    <td style="color: #4b72fa; text-align: right; font-weight: bold; padding: 10px 0px 5px 40px; font-size: 20px;">Ksh. {{ $data['total'] }}</td>
                </tr>
            </table>
            <div style="color: #636363; font-size: 14px; padding-top: 20px; border-top: 1px solid rgba(0, 0, 0, 0.05); margin-bottom: 50px;">
                Thank you again for ordering with us. We appreciate your business and look forward to serving you in the near future.
            </div>
            <h4 style="margin-bottom: 10px;">Need Help?</h4>
            <div style="color: #a5a5a5; font-size: 12px;">
                <p>If you have any questions you can simply reply to this email or find our contact information below. Also contact us at <a href="#" style="text-decoration: underline; color: #4b72fa;">info@bc.com</a></p>
            </div>
        </div>
        <div style="background-color: #f5f5f5; padding: 40px; text-align: center;">
            <div style="margin-bottom: 20px;">
                <a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/twitter.png" style="width: 28px;" /></a>
                <a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/facebook.png" style="width: 28px;" /></a>
                <a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/linkedin.png" style="width: 28px;" /></a>
                <a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/social-icons/instagram.png" style="width: 28px;" /></a>
            </div>
            <div style="margin-bottom: 20px;">
                <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261d1d;">Contact Us</a>
                <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261d1d;">Privacy Policy</a>
                <a href="#" style="text-decoration: underline; font-size: 14px; letter-spacing: 1px; margin: 0px 15px; color: #261d1d;">Unsubscribe</a>
            </div>
            <div style="color: #a5a5a5; font-size: 12px; margin-bottom: 20px; padding: 0px 50px;">You are receiving this email because you signed up for Book Counterfeit. We use Book Counterfeit email system to send our emails</div>
            <div style="margin-bottom: 20px;">
                <a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/market-google-play.png" style="height: 33px;" /></a>
                <a href="#" style="display: inline-block; margin: 0px 10px;"><img alt="" src="img/market-ios.png" style="height: 33px;" /></a>
            </div>
            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0, 0, 0, 0.05);">
                <div style="color: #a5a5a5; font-size: 10px; margin-bottom: 5px;">Barclays Plaza Flr 12, Loita Street, Nairobi, Kenya</div>
                <div style="color: #a5a5a5; font-size: 10px;">Copyright <script type="text/javascript"> document.write(new Date().getFullYear())</script> &copy; Book Counterfeit | All rights reserved.</div>
            </div>
        </div>
    </div>
</body>

</html>
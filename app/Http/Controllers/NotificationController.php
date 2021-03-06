<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\GeneralSendMail;
use Illuminate\Http\Response;
use AfricasTalking\SDK\AfricasTalking;
use App\Util;

class NotificationController extends Controller
{
    function index()
    {
        return view('mail.send_email');
    }

    /**
     * 
     */
    function sendEmail(Request $request)
    {
        // $name = $request->input('name');

        $from = "customer@gmail.com";
        $subject = "Order";
        $order = "#" . "CON_001";

        $time = $request->createdAt;
        $createdAtParse = explode("GMT", $time);
        $createdAtParseClean = trim($createdAtParse[0]);
        // $createdAtParsed = \Carbon\Carbon::parse($request->createdAt, 'GMT')->setTimezone('Africa/Nairobi')->isoFormat('lll');
        // $createdAtParsed = \Carbon\Carbon::parse($request->createdAt, 'GMT')->setTimezone('Africa/Nairobi')->isoFormat('MMMM Do YYYY, h:mm:ss a');

        $createdAtParsed = \Carbon\Carbon::parse($createdAtParseClean)->isoFormat('MMMM Do YYYY, h:mm:ss a');

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'from'   =>   $request->from,
            'subject'   =>   $request->subject,
            'order'   =>   "#" . $request->order,
            'quantity' => $request->quantity,
            'unitPrice' => $request->unitPrice,
            'total' => $request->total,
            'destinationAddress' => $request->destinationAddress,
            'createdAt' => $createdAtParsed
        );

        // dd($data);

        try {
            Mail::to($request->to)->send(new SendMail($data));

            return response()->json([
                'success' => true,
                'data'   => 'Mail Sent Successfully!'
            ]);
        } catch (\Exception $e) {
            // Error JSON
            return response()->json([
                'success' => false,
                'data'   => $e
            ]);
        }

        if (count(Mail::failures()) > 0) {

            foreach (Mail::failures() as $email_address) {
                echo "$email_address";
            }

            return response()->json([
                'success' => false,
                'data'   => $email_address
            ]);
        }

        return Response::json(array(
            'success' => true,
            'data'   => 'Mail Sent Successfully'
        ));
    }

    /**
     * 
     */
    function sendEmailGeneral(Request $request)
    {
        // var sendEmailURL = domainUrl + "/general/email/send/";
        // var jsonEmailData = {}
        // jsonEmailData = {
        //     'message': emailMsg,
        //     'to': buyer,
        //     'subject': subject,
        // };

        $from = "bcapp@bc.com";

        $data = array(
            'message'   =>   $request->message,
            'from'   =>   $from,
            'subject'   =>   $request->subject
        );

        // dd($data);

        try {
            Mail::to($request->to)->send(new GeneralSendMail($data));

            return response()->json([
                'success' => true,
                'data'   => 'Mail Sent Successfully!'
            ]);
        } catch (\Exception $e) {
            // Error JSON
            return response()->json([
                'success' => false,
                'data'   => $e
            ]);
        }

        if (count(Mail::failures()) > 0) {

            foreach (Mail::failures() as $email_address) {
                echo "$email_address";
            }

            return response()->json([
                'success' => false,
                'data'   => $email_address
            ]);
        }

        return Response::json(array(
            'success' => true,
            'data'   => 'Mail Sent Successfully'
        ));
    }

    /**
     * 
     */
    function sendEmailGeneralGet($message, $subject, $to)
    {
        // var sendEmailURL = domainUrl + "/general/email/send/";
        // var jsonEmailData = {}
        // jsonEmailData = {
        //     'message': emailMsg,
        //     'to': buyer,
        //     'subject': subject,
        // };

        $from = "bcapp@bc.com";

        $data = array(
            'message'   =>   $message,
            'from'   =>   $from,
            'subject'   =>   $subject
        );

        // dd($data);

        try {
            Mail::to($to)->send(new GeneralSendMail($data));

            return response()->json([
                'success' => true,
                'data'   => 'Mail Sent Successfully!'
            ]);
        } catch (\Exception $e) {
            // Error JSON
            return response()->json([
                'success' => false,
                'data'   => "Error =".$e
            ]);
        }

        if (count(Mail::failures()) > 0) {

            foreach (Mail::failures() as $email_address) {
                echo "$email_address";
            }

            return response()->json([
                'success' => false,
                'data'   => $email_address
            ]);
        }

        return Response::json(array(
            'success' => true,
            'data'   => 'Mail Sent Successfully'
        ));
    }

    /**
     * 
     */
    function sendSMS(Request $request)
    {
        // use 'sandbox' for development in the test environment
        $username = 'sandbox';
        
        // use your sandbox app API key for development in the test environment
        $apiKey   = Util::smsAPIKey();

        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        $message = 'Congratulations! You have a new Order #'.  $request->order .'!';

        // Use the service
        $result   = $sms->send([
            'to'      => Util::smsNumber(),
            'message' => $message
        ]);

        // dd($result['status']);
        // dd($result['data']);
        return response()->json([
            'success' => true,
            'data'   => $result
        ]);
    }

    /**
     * Dynamic Sending SMS
     */
    function sendGeneralSMS(Request $request)
    {
        // use 'sandbox' for development in the test environment
        $username = 'sandbox'; 
        
        // use your sandbox app API key for development in the test environment
        $apiKey   = Util::smsAPIKey();

        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // dd($request->message);

        // $message = 'Congratulations! You have a new Order #'.  $request->order .'!';

        // Use the service
        $result   = $sms->send([
            'to'      => Util::smsNumber(),
            'message' => $request->message
        ]);

        // dd($result['status']);
        // dd($result['data']);
        return response()->json([
            'success' => true,
            'data'   => $result
        ]);
    }

    /**
     * Dynamic Sending SMS
     */
    function sendGeneralSMSGet($message)
    {
        // use 'sandbox' for development in the test environment
        $username = 'sandbox'; 
        
        // use your sandbox app API key for development in the test environment
        $apiKey   = Util::smsAPIKey();

        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // dd($request->message);

        // $message = 'Congratulations! You have a new Order #'.  $request->order .'!';

        // Use the service
        $result   = $sms->send([
            'to'      => Util::smsNumber(),
            'message' => $message
        ]);

        // dd($result['status']);
        // dd($result['data']);
        return response()->json([
            'success' => true,
            'data'   => $result
        ]);
    }
}

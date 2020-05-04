<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController as BaseController;

use App\Util;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    public function index()
    {

    }

    /**
     * Display the specified resource.
     * Login
     * Profile
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Util::callAPI('GET', 'http://localhost:3001/api/Customer/'. $id ,false);

        $res = json_decode($customer);

        return $this->sendResponse(
            $res,'Retriving Customer Profile Successfully'
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();


        $qrcode->detail = $input['detail'];
        $qrcode->save();

        return $this->sendResponse($request, 'Qrcode updated successfully.');
    }

}
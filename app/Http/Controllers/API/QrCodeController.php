<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseApiController as BaseController;
use Validator;
use App\Qrcode;

class QrCodeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrcode = Qrcode::all();

        return $this->sendResponse(
            $qrcode->toArray(), 'QrCode retrieved successfully.'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $qrcode = Qrcode::create($input);

        return $this->sendResponse($qrcode->toArray(), 'QrCode created successfully.');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qrcode = Qrcode::find($id);

        if (is_null($qrcode)) {
            return $this->sendError('Qrcode not found.');
        }

        return $this->sendResponse($qrcode->toArray(), 'Qrcode retrieved successfully.');
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qrcode $qrcode)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $qrcode->detail = $input['detail'];
        $qrcode->save();

        return $this->sendResponse($qrcode->toArray(), 'Qrcode updated successfully.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qrcode $qrcode)
    {
        $qrcode->delete();

        return $this->sendResponse($qrcode->toArray(), 'Qrcode deleted successfully.');
    }
}

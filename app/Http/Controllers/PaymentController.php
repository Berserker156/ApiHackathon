<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request->validate([
            'page' => 'integer',
            'paginate' => 'integer',
            'from_date' => 'date',
            'to_date' => 'date',
        ]);

        $id = Auth()->user()->id;
        if($request->filled('from_date') && $request->filled('to_date')){
            $query = Payment::whereBetween(\DB::raw('DATE(created_at)'), array($request->input('from_date'),$request->input('to_date')))
                        ->orderByDesc('id');
        }else{
            $query = Payment::orderByDesc('id');
        }
        
        $paginate = $request->filled('paginate') ? $request->input('paginate') : 20;
        return PaymentResource::collection($query->paginate($paginate));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $requestData = $request->all();

            //TODO: Validate user permission role.
            $validatePayment = $this->validatePayment($requestData);
            if ($validatePayment->fails()) {
                return response()->json(
                    [
                        'response' => false,
                        'message' => "Datos inválidos en el registro",
                        'errors' => $validatePayment->messages(),
                        'data' => null
                    ], Response::HTTP_BAD_REQUEST
                );

            }
            $newPayment = Payment::create([
                'amount'=> $requestData['amount'],
                'user_payeer_id'=> $$requestData['user_payeer_id'],
                'ticket_id'=> $$requestData['ticket_id'],
                'description'=> $requestData['description'],
            ]); 
            
            return response()->json([
                'response' => true,
                'message' => 'Registro creado exitosamente',
                'data' => new PaymentResource($newPayment),
                'errors' => [],
            ], Response::HTTP_OK);

        }catch (Exception $e) {
            app('sentry')->captureException($e);
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Error al guardar el registro',
                    'errors' => [],
                    'data' => null
                ], Response::HTTP_NOT_FOUND
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $payment = Payment::find($payment);
        
        if(!$payment){
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Registro no encontrado',
                    'errors' => [],
                    'data' => null
                ], Response::HTTP_NOT_FOUND
            );
        }
        
        return new PaymentResource($payment);
    }

    /**
     * Show the form for editing the specified resource.
     */

     private function validatePayment($contest){
        return Validator::make($contest,[ 
            'amount'=> 'required|float',
            'user_payeer_id'=> 'required|bigInteger',
            'ticket_id'=> 'required|required|bigInteger|exists:App\Models\Payment,id',
            'description'=> 'required|text',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $Payment = payment::find($id);
        if ($Payment == null) {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Registro no encontrado',
                    'errors' => [],
                    'data' => null
                ], Response::HTTP_NOT_FOUND
            );
        }
        $requestData = $request->all();
        $valdatereg = $this->validatereg($requestData);
        if ($valdatereg->fails()) {
            return response()->json(
                [
                    'response' => false,
                    'message' => 'Datos inválidos en el nuevo registro',
                    'errors' => $valdatereg->messages(),
                    'data' => null
                ], Response::HTTP_BAD_REQUEST
            );
        }
        $Payment->amount = $requestData['amount'];
        $Payment->user_payeer_id = $requestData['user_payeer_id'];
        $Payment->ticket_id = $requestData['ticket_id'];
        $Payment->description = $requestData['description'];
        $Payment->save();
        return response()->json([
            'response' => true,
            'message' => 'Registro actualizado exitosamente',
            'data' => new PaymentResource($Payment),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        try{
            Payment::findOrFail($id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Registro eliminado exitosamente',
                'data' => null,
                'errors' => [],
            ], Response::HTTP_OK);
            
        }catch(Exception $ex){
           app('sentry')->captureException($ex);
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar el registro',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\Request as HttpRequest;

class ApiRequest extends HttpRequest{

  public $validated = null;
  public $_params = [];

  public static function validate( Request $request, array $params = [] )
  {
         try {
    $instance = new static;
    $instance->_params = $params;


      $data = ( new Controller() )->validate(
        $request,
        $instance->rules(),
        $instance->messages(),
        $instance->customAttributes()
      );
   } catch (\Illuminate\Validation\ValidationException $th) {
      $body = [];
      foreach( $th->validator->getMessageBag()->getMessages() as $field => $messages ){

        $body[ $field ] = $messages;
      }
      $response = response()->json( $body, $th->status );
      throw new ValidationException( $th->validator, $response ) ;
    }

    try {
      $keys = array_keys( $instance->rules() );
      foreach( $keys as $input ){
        try {
          if( $request->hasFile( $input ) ){
            $data[ $input ] = $request->file( $input );
          }
        } catch (\Throwable $th) { }
      }
    } catch (\Throwable $th) { }
    return $data;
  }

  public function messages(){
    return [];
  }

  public function rules(){
    return [];
  }

  public function customAttributes(){
    return [];
  }

}

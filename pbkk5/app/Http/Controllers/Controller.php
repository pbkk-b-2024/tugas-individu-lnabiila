<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *  title="APIs For School",
 *  version="1.0.0",
 * ),
 * @OA\SecurityScheme(
 *  securityScheme="bearerAuth",
 *  in="header",
 *  type="http",
 *  scheme="bearer",
 *  bearerFormat="JWT",
 * ),
 */

abstract class Controller
{
    //
}

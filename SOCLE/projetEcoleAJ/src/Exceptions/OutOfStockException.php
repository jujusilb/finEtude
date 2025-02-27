<?php
namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class OutOfStockException extends HttpException
{
    public function __construct($message = 'Stock épuisé', $code = 0, \Exception $previous = null)
    {
        parent::__construct(410, $message, $previous, [], $code);
    }
}
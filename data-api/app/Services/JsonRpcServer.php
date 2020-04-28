<?php


namespace App\Services;


use App\Exceptions\JsonRpcException;
use App\Http\Controllers\DataController;
use App\Http\Response\JsonRpcResponse;
use Illuminate\Http\Request;

class JsonRpcServer
{
    const JSON_RPC_VERSION = '2.0';

    protected $controller;

    public function __construct()
    {
        $this->controller = resolve(DataController::class);
    }

    public function handle(Request $request)
    {
        try {
            $content = json_decode($request->getContent(), true);

            if (empty($content)) {
                throw new JsonRpcException('Parse error', JsonRpcException::PARSE_ERROR);
            }

            $result = $this->controller->{$content['method']}(...[$content['params']]);

            return JsonRpcResponse::success($result, $content['id']);

        } catch (\Exception $e) {
            return JsonRpcResponse::error($e->getMessage());
        }
    }
}
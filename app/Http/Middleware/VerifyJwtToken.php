<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;
class VerifyJwtToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Không tìm thấy Token'], 401);
        }

        try {
            $secret = env('JWT_SECRET');
            // Giải mã Token với cùng Secret Key của Bài 2
            $decoded = JWT::decode($token, new Key($secret, 'HS256'));
            // Có thể gán thông tin user vào request nếu cần
            $request->attributes->add(['user' => $decoded]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Token không hợp lệ hoặc đã hết hạn'], 401);
        }

        return $next($request);
    }
}
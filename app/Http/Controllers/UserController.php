<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Auth\AuthInput;
use App\Domain\UseCases\CreateUser\CreateUserInput;
use App\Factories\UseCases\AuthUseCaseFactory;
use App\Factories\UseCases\CreateUserUseCaseFactory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => [ 'required' ],
                'email' => [ 'email', 'required' ],
                'password' => [ 'required' ]
            ]);
            $output = CreateUserUseCaseFactory::make()->execute(new CreateUserInput(
                $validated['name'],
                $validated['email'],
                $validated['password'],
            ));
            return response()->json([
                'body' => $output->getUser()->getId()
            ]);
        }
        catch (Throwable $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function auth(Request $request)
    {
        try {
            $output = AuthUseCaseFactory::make()->execute(new AuthInput(
                $request->get('email'),
                $request->get('password')
            ));
            return response()->json([
                'body' => $output->getToken()
            ]);
        }
        catch (Throwable $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreatePoll\CreatePollInput;
use App\Domain\UseCases\ListPolls\ListPollsInput;
use App\Factories\UseCases\CreatePollUseCaseFactory;
use App\Factories\UseCases\ListPollsUseCaseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PollController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function all()
    {
        try {
            $polls = ListPollsUseCaseFactory::make()->execute(new ListPollsInput())->getPolls();
            return response()->json([
                'body' => $polls
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
    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'description' => [ 'required' ],
                'options' => [ 'array' ]
            ]);
            $output = CreatePollUseCaseFactory::make()->execute(new CreatePollInput(
                $validated['description'], Auth::id(), $validated['options']
            ));
            return response()->json([
                'body' => $output->getPoll()
            ]);
        }
        catch (Throwable $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }
}

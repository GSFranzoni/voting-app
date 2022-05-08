<?php

namespace Domain\UseCases\FinishPoll;

use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\UseCases\FinishPoll\FinishPollInput;
use App\Domain\UseCases\FinishPoll\FinishPollUseCase;
use App\Exceptions\PollDoesNotBelongToTheUserException;
use App\Exceptions\PollFinishedException;
use App\Exceptions\PollNotFoundException;
use App\Factories\Entities\PollFactory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class FinishPollUseCaseTest extends TestCase
{
    public function testPollNotFound()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollRepositoryMock->method('getById')->willReturn(null);
        $finishPollUseCase = new FinishPollUseCase($pollRepositoryMock);
        $useCaseInput = new FinishPollInput(Str::uuid()->toString(), Str::uuid()->toString());
        $this->expectException(PollNotFoundException::class);
        $finishPollUseCase->execute($useCaseInput);
    }

    public function testUserFinishingPollThatDoesNotBelongToHim()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $poll = PollFactory::make([
            'id' => Str::uuid()->toString(),
            'description' => 'Poll Test',
            'finished' => false,
            'userId' => Str::uuid()->toString(),
            'options' => [
                'Option 1',
                'Option 2',
                'Option 3'
            ]
        ]);
        $pollRepositoryMock->method('getById')->willReturn($poll);
        $finishPollUseCase = new FinishPollUseCase($pollRepositoryMock);
        $useCaseInput = new FinishPollInput($poll->getId(), Str::uuid()->toString());
        $this->expectException(PollDoesNotBelongToTheUserException::class);
        $finishPollUseCase->execute($useCaseInput);
    }

    public function testPollAlreadyFinished()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $poll = PollFactory::make([
            'id' => Str::uuid()->toString(),
            'description' => 'Poll Test',
            'finished' => true,
            'userId' => Str::uuid()->toString(),
            'options' => [
                'Option 1',
                'Option 2',
                'Option 3'
            ]
        ]);
        $pollRepositoryMock->method('getById')->willReturn($poll);
        $finishPollUseCase = new FinishPollUseCase($pollRepositoryMock);
        $useCaseInput = new FinishPollInput($poll->getId(), $poll->getUserId());
        $this->expectException(PollFinishedException::class);
        $finishPollUseCase->execute($useCaseInput);
    }

    public function testPollFinishedSucessfully()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $poll = PollFactory::make([
            'id' => Str::uuid()->toString(),
            'description' => 'Poll Test',
            'finished' => false,
            'userId' => Str::uuid()->toString(),
            'options' => [
                'Option 1',
                'Option 2',
                'Option 3'
            ]
        ]);
        $pollRepositoryMock->method('getById')->willReturn($poll);
        $finishPollUseCase = new FinishPollUseCase($pollRepositoryMock);
        $useCaseInput = new FinishPollInput($poll->getId(), $poll->getUserId());
        $useCaseOutput = $finishPollUseCase->execute($useCaseInput);
        $this->assertTrue($poll->isFinished());
        $this->assertNotNull($poll->getFinishedAt());
        $this->assertTrue($useCaseOutput->getFinishedAt() instanceof Carbon);
    }
}

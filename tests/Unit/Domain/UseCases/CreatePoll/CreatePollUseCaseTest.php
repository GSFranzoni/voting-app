<?php

namespace Domain\UseCases\CreatePoll;

use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\Poll;
use App\Domain\UseCases\CreatePoll\CreatePollInput;
use App\Domain\UseCases\CreatePoll\CreatePollUseCase;
use App\Exceptions\PollOptionsLimitException;
use App\Exceptions\UserHasUnfinishedPollException;
use App\Exceptions\UserNotFoundException;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class CreatePollUseCaseTest extends TestCase
{
    public function testUserHasUnfinishedPoll()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $userRepositoryMock->method('userHasUnfinishedPoll')->willReturn(true);
        $createPollUseCase = new CreatePollUseCase($pollRepositoryMock, $userRepositoryMock);
        $useCaseInput = new CreatePollInput('Poll Test', Str::uuid()->toString(), []);
        $this->expectException(UserHasUnfinishedPollException::class);
        $createPollUseCase->execute($useCaseInput);
    }

    public function testUserNotFound()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('userHasUnfinishedPoll')->willReturn(false);
        $userRepositoryMock->method('exists')->willReturn(false);
        $createPollUseCase = new CreatePollUseCase($pollRepositoryMock, $userRepositoryMock);
        $useCaseInput = new CreatePollInput('Poll Test', Str::uuid()->toString(), []);
        $this->expectException(UserNotFoundException::class);
        $createPollUseCase->execute($useCaseInput);
    }

    public function testPollOptionsNumberLimits()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $userRepositoryMock->method('userHasUnfinishedPoll')->willReturn(false);
        $createPollUseCase = new CreatePollUseCase($pollRepositoryMock, $userRepositoryMock);
        $pollOptions = array_fill(0, Poll::MAX_POLL_OPTIONS + 1, 'Poll Option');
        $useCaseInput = new CreatePollInput('Poll Test', Str::uuid()->toString(), $pollOptions);
        $this->expectException(PollOptionsLimitException::class);
        $createPollUseCase->execute($useCaseInput);
    }

    public function testPollCreated()
    {
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $userRepositoryMock->method('userHasUnfinishedPoll')->willReturn(false);
        $createPollUseCase = new CreatePollUseCase($pollRepositoryMock, $userRepositoryMock);
        $pollOptions = array_fill(0, Poll::MIN_POLL_OPTIONS, 'Poll Option');
        $useCaseInput = new CreatePollInput('Poll Test', Str::uuid()->toString(), $pollOptions);
        $useCaseOutput = $createPollUseCase->execute($useCaseInput);
        $poll = $useCaseOutput->getPoll();
        $this->assertEquals(false, $poll->isFinished());
        $this->assertEquals(null, $poll->getFinishedAt());
    }
}

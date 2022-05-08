<?php

namespace Domain\UseCases\CreateVote;

use App\Domain\Contracts\Repositories\PollOptionRepositoryInterface;
use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Repositories\VoteRepositoryInterface;
use App\Domain\UseCases\CreateVote\CreateVoteInput;
use App\Domain\UseCases\CreateVote\CreateVoteUseCase;
use App\Exceptions\PollFinishedException;
use App\Exceptions\PollNotFoundException;
use App\Exceptions\PollOptionNotFoundException;
use App\Exceptions\UserAlreadyVotedException;
use App\Exceptions\UserNotFoundException;
use App\Factories\Entities\PollFactory;
use App\Factories\Entities\PollOptionFactory;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class CreateVoteUseCaseTest extends TestCase
{
    public function testUserAlreadyVoted()
    {
        $voteRepositoryMock = $this->createMock(VoteRepositoryInterface::class);
        $voteRepositoryMock->method('exists')->willReturn(true);
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollOptionRepositoryMock = $this->createMock(PollOptionRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $useCase = new CreateVoteUseCase(
            $voteRepositoryMock,
            $pollRepositoryMock,
            $pollOptionRepositoryMock,
            $userRepositoryMock
        );
        $this->expectException(UserAlreadyVotedException::class);
        $useCase->execute(new CreateVoteInput('userId', 'pollOptionId'));
    }

    public function testUserNotFound()
    {
        $voteRepositoryMock = $this->createMock(VoteRepositoryInterface::class);
        $voteRepositoryMock->method('exists')->willReturn(false);
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollOptionRepositoryMock = $this->createMock(PollOptionRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(false);
        $useCase = new CreateVoteUseCase(
            $voteRepositoryMock,
            $pollRepositoryMock,
            $pollOptionRepositoryMock,
            $userRepositoryMock
        );
        $this->expectException(UserNotFoundException::class);
        $useCase->execute(new CreateVoteInput('userId', 'pollOptionId'));
    }

    public function testPollOptionNotFound()
    {
        $voteRepositoryMock = $this->createMock(VoteRepositoryInterface::class);
        $voteRepositoryMock->method('exists')->willReturn(false);
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollOptionRepositoryMock = $this->createMock(PollOptionRepositoryInterface::class);
        $pollOptionRepositoryMock->method('getById')->willReturn(null);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $useCase = new CreateVoteUseCase(
            $voteRepositoryMock,
            $pollRepositoryMock,
            $pollOptionRepositoryMock,
            $userRepositoryMock
        );
        $this->expectException(PollOptionNotFoundException::class);
        $useCase->execute(new CreateVoteInput('userId', 'pollOptionId'));
    }

    public function testPollNotFound()
    {
        $voteRepositoryMock = $this->createMock(VoteRepositoryInterface::class);
        $voteRepositoryMock->method('exists')->willReturn(false);
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollRepositoryMock->method('getById')->willReturn(null);
        $pollOptionRepositoryMock = $this->createMock(PollOptionRepositoryInterface::class);
        $pollOptionRepositoryMock->method('getById')->willReturn(PollOptionFactory::make([
            'pollId' => Str::uuid()->toString(),
            'description' => 'Poll Option Test'
        ]));
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $useCase = new CreateVoteUseCase(
            $voteRepositoryMock,
            $pollRepositoryMock,
            $pollOptionRepositoryMock,
            $userRepositoryMock
        );
        $this->expectException(PollNotFoundException::class);
        $useCase->execute(new CreateVoteInput('userId', 'pollOptionId'));
    }

    public function testPollFinished()
    {
        $voteRepositoryMock = $this->createMock(VoteRepositoryInterface::class);
        $voteRepositoryMock->method('exists')->willReturn(false);
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollRepositoryMock->method('getById')->willReturn(PollFactory::make([
            'description' => 'Poll Test',
            'finished' => true
        ]));
        $pollOptionRepositoryMock = $this->createMock(PollOptionRepositoryInterface::class);
        $pollOptionRepositoryMock->method('getById')->willReturn(PollOptionFactory::make([
            'pollId' => 'pollOptionId',
            'description' => 'Poll Option Test'
        ]));
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $useCase = new CreateVoteUseCase(
            $voteRepositoryMock,
            $pollRepositoryMock,
            $pollOptionRepositoryMock,
            $userRepositoryMock
        );
        $this->expectException(PollFinishedException::class);
        $useCase->execute(new CreateVoteInput('userId', 'pollOptionId'));
    }


    public function testCreateVoteSuccessfully()
    {
        $voteRepositoryMock = $this->createMock(VoteRepositoryInterface::class);
        $voteRepositoryMock->method('exists')->willReturn(false);
        $pollRepositoryMock = $this->createMock(PollRepositoryInterface::class);
        $pollRepositoryMock->method('getById')->willReturn(PollFactory::make([
            'description' => 'Poll Test',
            'finished' => false
        ]));
        $pollOptionRepositoryMock = $this->createMock(PollOptionRepositoryInterface::class);
        $pollOptionRepositoryMock->method('getById')->willReturn(PollOptionFactory::make([
            'pollId' => 'pollOptionId',
            'description' => 'Poll Option Test'
        ]));
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('exists')->willReturn(true);
        $useCase = new CreateVoteUseCase(
            $voteRepositoryMock,
            $pollRepositoryMock,
            $pollOptionRepositoryMock,
            $userRepositoryMock
        );
        $output = $useCase->execute(new CreateVoteInput('userId', 'pollOptionId'));
        $this->assertIsString($output->getVoteId());
    }
}

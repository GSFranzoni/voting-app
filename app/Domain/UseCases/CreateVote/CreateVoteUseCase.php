<?php

namespace App\Domain\UseCases\CreateVote;

use App\Domain\Contracts\Repositories\PollOptionRepositoryInterface;
use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Repositories\VoteRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;
use App\Exceptions\PollFinishedException;
use App\Exceptions\PollNotFoundException;
use App\Exceptions\PollOptionNotFoundException;
use App\Exceptions\UserAlreadyVotedException;
use App\Exceptions\UserNotFoundException;
use App\Factories\Entities\VoteFactory;

class CreateVoteUseCase implements UseCaseInterface
{
    public function __construct(
        private VoteRepositoryInterface $voteRepository,
        private PollRepositoryInterface $pollRepository,
        private PollOptionRepositoryInterface $pollOptionRepository,
        private UserRepositoryInterface $userRepository
    ){}

    /**
     * @param CreateVoteInput $input
     * @return CreateVoteOutput
     */
    public function execute(UseCaseInputInterface $input): CreateVoteOutput
    {
        $vote = VoteFactory::make($input->toArray());
        if ($this->voteRepository->exists($vote)) {
            throw new UserAlreadyVotedException();
        }
        if (!$this->userRepository->exists($vote->getUserId())) {
            throw new UserNotFoundException();
        }
        $pollOption = $this->pollOptionRepository->getById($vote->getPollOptionId());
        if (is_null($pollOption)) {
            throw new PollOptionNotFoundException();
        }
        $poll = $this->pollRepository->getById($pollOption->getPollId());
        if (is_null($poll)) {
            throw new PollNotFoundException();
        }
        if ($poll->isFinished()) {
            throw new PollFinishedException();
        }
        $this->voteRepository->create($vote);
        return new CreateVoteOutput($vote->getId());
    }
}

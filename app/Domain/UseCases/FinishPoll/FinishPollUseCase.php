<?php

namespace App\Domain\UseCases\FinishPoll;

use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;
use App\Exceptions\PollDoesNotBelongToTheUserException;
use App\Exceptions\PollFinishedException;
use App\Exceptions\PollNotFoundException;

class FinishPollUseCase implements UseCaseInterface
{
    public function __construct(private PollRepositoryInterface $repository){}

    /**
     * @param FinishPollInput $input
     * @return FinishPollOutput
     */
    public function execute(UseCaseInputInterface $input): FinishPollOutput
    {
        $poll = $this->repository->getById($input->getPollId());
        if (is_null($poll)) {
            throw new PollNotFoundException();
        }
        if ($poll->getUserId() !== $input->getUserId()) {
            throw new PollDoesNotBelongToTheUserException();
        }
        if ($poll->isFinished()) {
            throw new PollFinishedException();
        }
        $poll->finish();
        $this->repository->update($poll);
        return new FinishPollOutput($poll->getFinishedAt());
    }
}

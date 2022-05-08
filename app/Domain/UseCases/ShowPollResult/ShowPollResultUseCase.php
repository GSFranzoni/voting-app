<?php

namespace App\Domain\UseCases\ShowPollResult;

use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\Repositories\VoteRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;
use App\Exceptions\PollNotFinishedException;
use App\Exceptions\PollNotFoundException;

class ShowPollResultUseCase implements UseCaseInterface
{
    public function __construct(
        private PollRepositoryInterface $pollRepository,
        private VoteRepositoryInterface $voteRepository
    ){}

    /**
     * @param ShowPollResultInput $input
     * @return ShowPollResultOutput
     */
    public function execute(UseCaseInputInterface $input): ShowPollResultOutput
    {
        $poll = $this->pollRepository->getById($input->getPollId());
        if (is_null($poll)) {
            throw new PollNotFoundException();
        }
        if (!$poll->isFinished()) {
            throw new PollNotFinishedException();
        }
        $pollOptions = $this->pollRepository->getPollOptions($poll->getId());
        $output = new ShowPollResultOutput();
        foreach ($pollOptions as $pollOption) {
            $votesCount = $this->voteRepository->countByPollOptionId($pollOption->getId());
            $output->setRollOption($pollOption->getDescription(), $votesCount);
        }
        return $output;
    }
}

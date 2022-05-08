<?php

namespace App\Domain\UseCases\ListPolls;

use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;

class ListPollsUseCase implements UseCaseInterface
{
    public function __construct(
        private PollRepositoryInterface $repository
    ){}

    /**
     * @param ListPollsInput $input
     * @return ListPollsOutput
     */
    public function execute(UseCaseInputInterface $input): ListPollsOutput
    {
        $polls = $this->repository->getAll();
        return new ListPollsOutput($polls);
    }
}

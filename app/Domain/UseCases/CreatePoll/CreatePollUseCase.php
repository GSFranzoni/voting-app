<?php

namespace App\Domain\UseCases\CreatePoll;

use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\UseCases\UseCaseInputInterface;
use App\Domain\Contracts\UseCases\UseCaseInterface;
use App\Domain\Entities\Poll;
use App\Exceptions\PollOptionsLimitException;
use App\Exceptions\UserHasUnfinishedPollException;
use App\Exceptions\UserNotFoundException;
use App\Factories\Entities\PollFactory;
use App\Factories\Entities\PollOptionFactory;

class CreatePollUseCase implements UseCaseInterface
{
    public function __construct(
        private PollRepositoryInterface $pollRepository,
        private UserRepositoryInterface $userRepository
    ){}

    /**
     * @param CreatePollInput $input
     * @return CreatePollOutput
     */
    public function execute(UseCaseInputInterface $input): CreatePollOutput
    {
        $poll = PollFactory::make($input->toArray());
        foreach ($input->getOptions() as $optionDescription) {
            $poll->addOption(PollOptionFactory::make([
                'description' => $optionDescription,
                'pollId' => $poll->getId()
            ]));
        }
        if (!$this->userRepository->exists($input->getUserId())) {
            throw new UserNotFoundException();
        }
        if ($this->userRepository->userHasUnfinishedPoll($poll->getUserId())) {
            throw new UserHasUnfinishedPollException();
        }
        if (!in_array($poll->getOptionsCount(), range(Poll::MIN_POLL_OPTIONS, Poll::MAX_POLL_OPTIONS))) {
            throw new PollOptionsLimitException();
        }
        $this->pollRepository->create($poll);
        return new CreatePollOutput($poll);
    }
}

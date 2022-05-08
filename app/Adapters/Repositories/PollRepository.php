<?php

namespace App\Adapters\Repositories;

use App\Adapters\Mappers\PollMapper;
use App\Adapters\Mappers\PollOptionMapper;
use App\Domain\Contracts\Repositories\PollRepositoryInterface;
use App\Domain\Entities\Poll;
use App\Models\Contracts\BaseModel;
use App\Models\Poll as PollModel;
use Illuminate\Support\Facades\DB;

class PollRepository implements PollRepositoryInterface
{
    /**
     * @param Poll $poll
     * @return void
     */
    public function create(Poll $poll): void
    {
        PollMapper::fromEntity($poll)->save();
        foreach ($poll->getOptions() as $pollOption) {
            PollOptionMapper::fromEntity($pollOption)->save();
        }
    }

    /**
     * @param Poll $poll
     * @return void
     */
    public function update(Poll $poll): void
    {
        DB::table('polls')
            ->where('id', $poll->getId())
            ->update(PollMapper::fromEntity($poll)->getAttributes());
    }

    /**
     * @param string $pollId
     * @return Poll|null
     */
    public function getById(string $pollId): Poll|null
    {
        $poll = PollModel::find($pollId);
        if (is_null($poll)) {
            return null;
        }
        return PollMapper::fromModel($poll);
    }

    /**
     * @return Poll[]
     */
    public function getAll(): array
    {
        $polls = [];
        /** @var PollModel[] $rows */
        $rows = PollModel::all();
        foreach ($rows as $record) {
            $poll = PollMapper::fromModel($record);
            foreach ($record->options()->get() as $option) {
                $poll->addOption(PollOptionMapper::fromModel($option));
            }
            $polls[] = $poll;
        }
        return $polls;
    }

    /**
     * @param string $pollId
     * @return array
     */
    public function getPollOptions(string $pollId): array
    {
        $pollOptions = [];
        $rows = DB::table('poll_options')
            ->where('poll_id', $pollId)
            ->get();
        foreach ($rows as $record) {
            $pollOptions[] = PollOptionMapper::fromModel($record);
        }
        return $pollOptions;
    }
}
